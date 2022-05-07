<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function categories() {
        return $this->belongsToMany(Category::class, 'items_categories', 'item_id');
    }

    public function getItemPerAttribute($value) {
        return ucfirst($value);
    }
}