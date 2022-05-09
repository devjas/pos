<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Item;
use App\Models\ItemsCategory;
use App\Models\Category;
use Illuminate\Support\Arr;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return View::make('pos.pages.item.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categores = Category::select('id', 'pos_category')->get();
        return View::make('pos.pages.item.create', ['categores' => $categores]);
    }

    /**
     * Validates item form
     */
    public function item_rules() {
        return [
            'item_category.not_in' => 'Choose category for this item',
            'item_category.required' => 'Choose category for this item',
            'item_name.required' => 'Item Name is required',
            'item_name.max' => 'Only 30 characters is allowed',
            'item_description.required' => 'Item Description is required',
            'item_price.required' => 'Enter Item Price',
            'item_per.required' => 'Required',
            'item_per.not_in' => 'Required',
            'item_tax.not_in' => 'Choose State Tax for this item',
            'is_visible.required' => 'Choose visibility of this item'
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'item_category' => 'required|not_in:0',
            'item_name' => 'required|max:30',
            'item_description' => 'required',
            'item_price' => 'required', 
            'item_per' => 'required|not_in:0',
            'item_tax' => 'not_in:0',
            'is_visible' => 'required'
        ], $this->item_rules());

        if($validator->fails()) {

            Session::flash('error', 'Please fix required fields.');
            return redirect()->back()->withErrors($validator)->withInput();

        }

        $item = new Item;
        $item->item_name = $request->item_name;
        $item->item_description = $request->item_description;
        $item->item_price = $request->item_price;
        $item->item_per = $request->item_per;
        $item->item_tax = $request->item_tax;
        $item->is_special_item = $request->special_item;
        $item->is_visible = $request->is_visible;

        $item->save();

        $selected_category = collect($request->item_category);
        foreach($selected_category as $categories) {
            ItemsCategory::insert([
                'item_id' => $item->id,
                'category_id' => $categories
            ]);
        }

        Session::flash('success', 'Item added successfully!');
        return redirect()->route('item.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::select('id', 'pos_category')->get();
        return View::make('pos.pages.item.edit', ['categories' => $categories, 'item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'item_category' => 'required|not_in:0',
            'item_name' => 'required|max:30',
            'item_description' => 'required',
            'item_price' => 'required', 
            'item_per' => 'required|not_in:0',
            'item_tax' => 'not_in:0',
            'is_visible' => 'required'
        ], $this->item_rules());

        if($validator->fails()) {

            Session::flash('error', 'Please fix required fields.');
            return redirect()->back()->withErrors($validator)->withInput();

        }

        $item = Item::find($id);

        $item->update([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'item_price' => $request->item_price, 
            'item_per' => $request->item_per,
            'item_tax' => $request->item_tax,
            'is_special_item' => $request->special_item,
            'is_visible' => $request->is_visible
        ]);

        $item_categories = ItemsCategory::where("item_id", $id)->pluck('category_id');

        foreach($request->item_category as $categories) {

            if(!$item_categories->contains($categories)) {
                ItemsCategory::insert([
                    'item_id' => $id,
                    'category_id' => $categories
                ]);
            }

        }

        ItemsCategory::where('item_id', $id)->whereNotIn('category_id', $request->item_category)->delete();

        Session::flash('success', 'Item added successfully!');
        return redirect()->route('item.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}