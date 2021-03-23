<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['brand_name', 'brand_image'];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'brand_name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}