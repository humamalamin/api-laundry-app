<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'image',
        'name',
        'location',
        'city',
        'delivery',
        'pickup',
        'whatsapp',
        'description',
        'price',
        'rate'
    ];

    public function laundries()
    {
        return $this->hasMany(Laundry::class);
    }

    public function promos()
    {
        return $this->hasMany(Promo::class);
    }
}
