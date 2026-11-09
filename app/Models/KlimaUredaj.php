<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Cartable;

class KlimaUredaj extends Model
{
    use HasFactory;
    protected $table = 'klima_uredaji';

    public function onSale()
    {
        return $this->hasOne(OnSale::class);
    }

    public function bestBuy()
    {
        return $this->hasOne(BestBuy::class);
    }
}
