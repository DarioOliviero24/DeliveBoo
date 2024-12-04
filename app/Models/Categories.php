<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipologia'
    ];
    public function restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class, 'category_restaurant', 'category_id', 'restaurant_id');
    }
}
