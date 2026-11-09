<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestBuy extends Model
{
    use HasFactory;
    protected $fillable = [
        'klima_uredaj_id',
    ];

    public function klimaUredaj()
    {
        return $this->belongsTo(KlimaUredaj::class);
    }
}
