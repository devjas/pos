<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PosPagesController extends Controller
{
    public function getCategories() {
        return View::make('pos.pages.categories');
    }

    public function getItems() {
        return View::make('pos.pages.items');
    }

    public function getAddonsExtras() {
        return View::make('pos.pages.item-addons-extras');
    }
}
