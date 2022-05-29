<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Item;
use App\Models\ItemsAddon;
use App\Models\Addon;
use Illuminate\Support\Arr;

class ItemsAddonsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->addon_id) {
            
            $p = ItemsAddon::where('item_id', $request->item_id)->pluck('addon_id');

            $addons = [
                'addon_id' => $request->addon_id,
                'addon_price' => $request->addon_price,
            ];

            $values = [];
            foreach($addons as $key => $addon) {

                foreach($addon as $subkey => $subvalue) {

                    $values[$subkey][$key] = $subvalue;

                }
               
            }

            $values = collect($values)->filter(function($aid) { // Sames as array_filter()
                return isset($aid['addon_id']);
            })->toArray();

            foreach($values as $vkey => $value) {

                $item_addon = new ItemsAddon;

                if(!$p->contains($value['addon_id'])) {

                    $item_addon->item_id = $request->item_id;
                    $item_addon->addon_id =  $value['addon_id'];
                    $item_addon->addon_price = $value['addon_price'];
                 
                    $item_addon->save();

                } else {
                  
                    $item_addon->where(
                        [
                            'item_id' => $request->item_id,
                            'addon_id' => $value['addon_id'],
                        ]
                    )->update([
                        'addon_id' => $value['addon_id'],
                        'addon_price' => $value['addon_price'],
                    ]);

                }

                ItemsAddon::where('item_id', $request->item_id)->whereNotIn('addon_id', $addons['addon_id'])->delete();

            }

            Session::flash('success', 'Addons saved successfully.');

            return redirect()->route('item-addon.show', $request->item_id);
        }

        Session::flash('warning', 'Nothing has been saved. Choose options under Add/Remove.');

        return redirect()->route('item-addon.show', $request->item_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $item = Item::find($id); 
        $addons = Addon::all();     

        $a = $addons->where('id', '>', 0)->pluck('id');

        $ap = ItemsAddon::select('addon_id', 'addon_price')
        ->where('item_id', $id)
        // ->whereIn('addon_id', $a)
        ->get();

        return View::make('pos.pages.item-addons.item-addons', [
            'item' => $item,
            'addons' => $addons,
            'ap' => $ap,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
