<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosOrderingController extends Controller
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

        // return session()->flush();
        $cart = session()->get('cart', []);

        if(isset($cart[$request->item_id])) {

            $cart[$request->item_id]['qty']++;

        } else {

            $cart[$request->item_id] = [

                'id' => $request->item_id,
                'category_id' => $request->category_id,
                'price' => $request->item_price,
                'item_name' => $request->item_name,
                'qty' => 1,

            ];


        }

        session()->put('cart', $cart);

        return redirect()->route('addons.extras', $request->item_id);
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

        if($id) {

            $cart = session()->get('cart');
            if(isset($cart[$id])) {

                unset($cart[$id]);

            }

        }
        
        session()->put('cart', $cart);
        return redirect('/');
        
    }
}
