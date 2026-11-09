<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'klima_uredaj_id',
        'time_till_sale',
        'discount',
    ];

    public function klimaUredaj()
    {
        return $this->belongsTo(KlimaUredaj::class);
    }
}
