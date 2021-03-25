<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use Cviebrock\EloquentSluggable\Sluggable;

class SubCategory extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'category_id',
        'sub_category_name',
        'slug'
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


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}