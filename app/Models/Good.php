<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable =  [
        'name', 'price',
    ];

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($val) => $val / 100,
            set: fn ($val) => $val * 100,
        );
    }
}
