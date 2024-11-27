<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plates extends Model
{
    use HasFactory;

    protected $table = 'plates';

    protected $fillable = ['name', 'ingredient', 'price', 'restaurants_id'];
}
