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

    public function addons() {
        return $this->belongsToMany(Addon::class, 'items_addons', 'item_id')
        ->withPivot('addon_price')
        ->withTimestamps();
    }

    protected $fillable = [
        'item_name',
        'item_description',
        'item_price',
        'item_per',
        'item_tax',
        'is_special_item',
        'is_visible'
    ];

}
