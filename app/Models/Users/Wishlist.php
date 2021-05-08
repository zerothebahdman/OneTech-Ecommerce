<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
