<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

/**
 * @method static where(string $string, $slug)
 * @method static create(array $array)
 */
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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
         return $this->belongsTo(Category::class);
    }

    public function subCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
         return $this->belongsTo(SubCategory::class);
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
         return $this->belongsTo(Brand::class);
    }

    public function getProductSellingPriceAttribute($value)
    {
        return number_format($this->selling_price, 3, ',', ',');
    }

    public function getProductDiscountPriceAttribute($value)
    {
        return number_format($this->discount_price, 3, ',', ',');
    }
}