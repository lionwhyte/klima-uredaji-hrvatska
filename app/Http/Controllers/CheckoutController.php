<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\BuyerOrderConfirmation;
use App\Mail\SellerOrderConfirmation;

class CheckoutController extends Controller
{
    public function __construct(protected OrderService $orderService) {}

    public function index()
    {
        return view('cart.checkout');
    }

    public function createOrder(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'metoda_placanja' => 'required|string|in:1,2,3',
            'billing_first_name' => 'required|string|max:50',
            'billing_last_name' => 'required|string|max:50',
            'billing_company' => 'nullable|string|max:50',
            'billing_address_1' => 'required|string|max:255',
            'billing_address_2' => 'nullable|string|max:255',
            'billing_city' => 'required|string|max:50',
            'billing_state' => 'required|string|max:50',
            'billing_postcode' => 'required|string|max:20',
            'billing_phone' => 'required|string|max:20',
            'billing_email' => 'required|string|email|max:255',
            'order_comments' => 'nullable|string|max:255',
            'terms' => 'accepted',
        ], [
            'metoda_placanja.required' => 'Molimo odaberite metodu plaćanja.',
            'metoda_placanja.in' => 'Metoda placanja je neispravna',
            'billing_first_name.required' => 'Ime je obavezno polje.',
            'billing_first_name.max' => 'Ime ne smije biti duže od :max znakova.',
            'billing_last_name.required' => 'Prezime je obavezno polje.',
            'billing_last_name.max' => 'Prezime ne smije biti duže od :max znakova.',
            'billing_company.max' => 'Naziv poduzeća ne smije biti duže od :max znakova.',
            'billing_address_1.required' => 'Ulica je obavezno polje.',
            'billing_address_1.max' => 'Ulica ne smije biti duža od :max znakova.',
            'billing_address_2.max' => 'Kat, broj stana ili sl. ne smije biti duže od :max znakova.',
            'billing_city.required' => 'Grad je obavezno polje.',
            'billing_city.max' => 'Grad ne smije biti duži od :max znakova.',
            'billing_state.required' => 'Županija je obavezno polje.',
            'billing_state.max' => 'Županija ne smije biti duža od :max znakova.',
            'billing_postcode.required' => 'Poštanski broj je obavezno polje.',
            'billing_postcode.max' => 'Poštanski broj ne smije biti duži od :max znakova.',
            'billing_phone.required' => 'Telefon je obavezno polje.',
            'billing_phone.max' => 'Telefon ne smije biti duži od :max znakova.',
            'billing_email.required' => 'Email je obavezno polje.',
            'billing_email.max' => 'Email ne smije biti duži od :max znakova.',
            'billing_email.email' => 'Email je neispravan.',
            'order_comments.max' => 'Napomena ne smije biti duža od :max znakova.',
            'terms' => 'Pročitajte i prihvatite uvjete korištenja i odredbe kako biste nastavili s narudžbom.'
        ]);

        if ($validator->fails()) {
            return redirect('/checkout')
            ->withErrors($validator)
            ->withInput();
        }
        
        // Access the validated data using the validated() method
        $validatedData = $validator->validated();

        $order = $this->orderService->createOrder($validatedData);

        $request->session()->regenerate();

        return redirect()->route('order.received', ['order_id' => $order->order_id]);
    }

    public function orderReceived($order_id)
    {
        $order = Order::where('order_id', $order_id)->with('items.product')->firstOrFail();
        return view('cart.order-received', compact('order'));
    }
}
