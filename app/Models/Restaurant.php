<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'P_Iva',
        'user_id',
    ];

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);
    }
    
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categories::class, 'category_restaurant', 'restaurant_id', 'category_id');
    }
    
    public function plates(): HasMany
    {
        return $this->hasMany(Plates::class);
    }
}
