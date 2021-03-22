<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_name'
    ];
}