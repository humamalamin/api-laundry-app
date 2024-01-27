<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'claim_code',
        'shop_id',
        'user_id',
        'weight',
        'with_pickup',
        'with_delivery',
        'pickup_address',
        'delivery_address',
        'total',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
