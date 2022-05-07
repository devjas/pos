<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\ItemsCategory;
use App\Models\Item;

class PosPagesController extends Controller
{
    public function getCategories() {
        $categories = Category::select('id', 'pos_category')
        ->where('is_visible', 1)
        ->orderBy('pos_category', 'ASC')
        ->get();
        return View::make('pos.pages.categories', ['categories' => $categories]);
    }

    public function getItems($id) {
        $category = Category::find($id);
        $items = $category->items()->where(['category_id' => $id, 'is_visible' => 1])->get();
        return View::make('pos.pages.items', ['items' => $items]);
    }

    public function getAddonsExtras(Request $request) {
        return View::make('pos.pages.item-addons-extras');
    }
}
