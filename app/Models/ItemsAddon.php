<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsAddon extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'addon_id', 'addon_price', 'item_price'];
}
