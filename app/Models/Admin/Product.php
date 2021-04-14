<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'category_id', 'sub_category_id', 'slug', 'brand_id', 'product_name', 'product_color', 'product_details', 'product_quantity', 'product_size', 'first_image', 'second_image', 'third_image', 'main_slider', 'mid_slider', 'hot_new', 'hot_deals', 'best_rated', 'trending', 'video_link', 'product_code', 'selling_price', 'discount_price', 'status'
    ];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(){
         return $this->belongsTo(Category::class);
    }

    public function subCategory() {
         return $this->belongsTo(SubCategory::class);
    }
}
