<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Categories;

class Restaurant extends Model
{
    use HasFactory;

    public function user(): HasOne {

        return $this->hasOne(Categories::class);
    }
}
