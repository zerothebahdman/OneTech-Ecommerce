<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 */
class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable  = [
        'category_name', 'slug'
    ];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'category_name'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    // /**
    //  * Get all of the sub_category for the Category
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    public function sub_category(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
         return $this->hasMany(Product::class);
    }
}
