<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Item;
use App\Models\ItemsAddon;
use App\Models\Addon;

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
        
        $p = ItemsAddon::where('item_id',$request->item_id)->pluck('addon_id');

        if($request->is_enabled) {

            $addons = [
                'addon_id' => $request->is_enabled, 
                'addon_price' => $request->addon_price
            ];

             // dd($addons);

            foreach($addons as $key => $addon) {

                $item_addon = new ItemsAddon;

                if(!$p->contains($addon)) {

                    $item_addon->item_id = $request->item_id;
                    $item_addon->addon_id = $addon['addon_id'];
                    $item_addon->addon_price = $addon['addon_price'];


                    $item_addon->addon_price = $p;

                    $item_addon->save(); 

                } else {
                  
                    $item_addon->where('item_id', $request->item_id)->update([
                        'addon_price' => 5,
                        'is_included' => 2
                    ]);

                }

            }
        
            ItemsAddon::where('item_id', $request->item_id)->whereNotIn('addon_id', $request->is_enabled)->delete();

        }
        
            
     

       

        return redirect()->back();
       
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
        return View::make('pos.pages.item-addons.item-addons', ['item' => $item, 'addons' => $addons]);
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
