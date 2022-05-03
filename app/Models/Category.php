<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function setPosCategoryAttribute($value) {
       return $this->attributes['pos_category'] = ucfirst($value);
    }

    protected $fillable = ['pos_category', 'is_visible'];
}
