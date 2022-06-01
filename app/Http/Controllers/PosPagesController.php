<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\ItemsCategory;
use App\Models\Item;
use App\Models\ItemsAddon;
use App\Models\Addon;

class PosPagesController extends Controller
{
    public function getCategories() {
        $categories = Category::select('id', 'pos_category')
        ->where('is_visible', 1)
        ->orderBy('pos_category', 'ASC')
        ->get();
        return View::make('pos.pages.categories', ['categories' => $categories]);
    }

    public function getItems($category_id) {
        $category = Category::find($category_id);
        $items = $category->items()->where(['category_id' => $category_id, 'is_visible' => 1])->get();
        return View::make('pos.pages.items', ['items' => $items]);
    }

    public function getAddonsExtras(Request $request, $item_id) {
        $item = Item::find($item_id);
        $null_price_count = ItemsAddon::where(['item_id' => $item_id, 'addon_price' => null])
        ->whereIn('addon_id', Addon::where('id','>',0)->pluck('id'))
        ->count();
        $with_price_count = ItemsAddon::where('item_id', $item_id)
        ->where('addon_price', '!=', null)
        ->whereIn('addon_id', Addon::where('id','>',0)->pluck('id'))
        ->count();
        return View::make('pos.pages.item-addons-extras', 
        [
            'item' => $item, 
            'null_price_count' => $null_price_count, 
            'with_price_count' => $with_price_count
        ]);
    }
}