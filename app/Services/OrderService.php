<?php
namespace App\Services;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart as CartModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\BuyerOrderConfirmation;
use App\Mail\SellerOrderConfirmation;

class OrderService
{
    public function createOrder(array $validatedData): Order
    {
        $cartItems = CartModel::with('product')->where('session_id', session()->getId())->get();

        $totalAmount = $cartItems->sum(function ($item) {
            if ($item->product->onSale) {
                $discountedPrice = $item->product->cijena - ($item->product->cijena * ($item->product->onSale->discount / 100));
                return $discountedPrice * $item->quantity;
            }
            return $item->product->cijena * $item->quantity;
        });

        $order = Order::create([
            'order_id' => uniqid(),
            'payment_method_id' => $validatedData['metoda_placanja'],
            'buyer_name' => $validatedData['billing_first_name'],
            'buyer_lastname' => $validatedData['billing_last_name'],
            'buyer_company_name' => $validatedData['billing_company'] ?? null,
            'buyer_country' => 'HR',
            'buyer_address' => $validatedData['billing_address_1'],
            'buyer_apartment_number_or_floor' => $validatedData['billing_address_2'] ?? null,
            'buyer_city' => $validatedData['billing_city'],
            'buyer_county' => $validatedData['billing_state'],
            'buyer_postal_code' => $validatedData['billing_postcode'],
            'buyer_phone_number' => $validatedData['billing_phone'],
            'buyer_email' => $validatedData['billing_email'],
            'buyer_remarks' => $validatedData['order_comments'] ?? null,
            'total_amount' => $totalAmount,
        ]);

        foreach ($cartItems as $cartItem) {
            $unitPrice = $cartItem->product->onSale 
                ? $cartItem->product->cijena - ($cartItem->product->cijena * ($cartItem->product->onSale->discount / 100))
                : $cartItem->product->cijena;

            $subtotal = $unitPrice * $cartItem->quantity;

            $orderItem = new OrderItem([
                'order_id' => $order->order_id,
                'product_id' => $cartItem['product_id'],
                'quantity' => $cartItem['quantity'],
                'unit_price' => (float)sprintf("%.2f", $unitPrice),
                'subtotal' => (float)sprintf("%.2f", $subtotal),
            ]);
            
            $order->items()->save($orderItem);
        }

        // Slanje mailova
        Mail::to($order->buyer_email)->send(new BuyerOrderConfirmation($order));
        Mail::to(config('mail.from.address', config('mail.from.address')))->send(new SellerOrderConfirmation($order));

        return $order;
    }
}