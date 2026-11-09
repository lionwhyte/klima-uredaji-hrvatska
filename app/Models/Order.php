<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'payment_method_id',
        'buyer_name', 'buyer_lastname', 'buyer_company_name', 'buyer_country', 'buyer_address',
        'buyer_apartment_number_or_floor', 'buyer_city', 'buyer_county', 'buyer_postal_code',
        'buyer_phone_number', 'buyer_email', 'buyer_remarks', 'total_amount', 'email_sent'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
