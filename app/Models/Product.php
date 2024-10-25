<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function tables(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'tables_products')
                    ->withPivot('quantity','price')
                    ->withTimestamps();
    }
}
