<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;

    public function items() {
        return $this->belongsToMany(Item::class, 'items_addons', 'addon_id', 'item_id');
    }

    protected $fillable = [ 'addon_name' ];
}
