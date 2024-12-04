<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class CategoryRestaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'restaurant_id',
    ];
}
