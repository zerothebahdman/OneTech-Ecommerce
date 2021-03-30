<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Coupon extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'coupon', 'discount', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'coupon'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}