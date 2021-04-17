<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
         return $this->hasMany(Product::class);
    }
}
