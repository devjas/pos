<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class PosPagesController extends Controller
{
    public function getCategories() {
        $categories = Category::select('pos_category')
        ->where('is_visible', '>', 0)
        ->orderBy('pos_category', 'ASC')
        ->get();
        return View::make('pos.pages.categories', ['categories' => $categories]);
    }

    public function getItems() {
        return View::make('pos.pages.items');
    }

    public function getAddonsExtras(Request $request) {
        return View::make('pos.pages.item-addons-extras');
    }
}
