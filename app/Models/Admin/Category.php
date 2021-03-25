<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\SubCategory;

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

    public function getRouteKeyName()
    {
        return 'slug';
    }
    // /**
    //  * Get all of the subCategory for the Category
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}