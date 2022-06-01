<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Addon;

class AddonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addons = Addon::all();
        return View::make('pos.pages.addon.index', ['addons' => $addons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('pos.pages.addon.create');
    }

    public function addonRules() {
        return [
            'addon_name.required' => 'Addon name is required',
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

        $validator = $request->validate([
            'addon_name' => 'required',
            // 'test_name' => 'exclude_if:addon_name,null|required'
        ]);


        if(Addon::where('addon_name', $request->addon_name)->exists()) {

            Session::flash('error', $request->addon_name . ' already exist.');
            return redirect()->back()->withInput();

        }

        Addon::create(['addon_name'=>$request->addon_name, 'test_name'=>$request->test_name]);

        Session::flash('success', $request->addon_name . ' addon created successfully.');
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
        $addon = Addon::find($id);
        return View::make('pos.pages.addon.edit', ['addon' => $addon]);
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
        $addon = Addon::find($id);
        $old_addon = $addon->getOriginal('addon_name');
        $new_addon = $request->addon_name;

        $validator = Validator::make($request->all(), [
            'addon_name' => 'required'
        ]);

        if($validator->fails()) {

            Session::flash('error', 'Something went wrong');
            return redirect()->back()->withErrors($validator)->withInput();

        }

        if(Addon::where('addon_name', $request->addon_name)->exists()) {

            Session::flash('warning', 'Nothing was updated.');
            return redirect()->route('addon.index');

        }

        $addon->update([
            'addon_name' => $new_addon,
        ]);

        Session::flash('success', $old_addon . ' addon has been changed to ' . $new_addon);
        return redirect()->route('addon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addon = Addon::find($id);
        $deleted_addon = $addon->getOriginal('addon_name');
        $addon->delete();
        Session::flash('success', $deleted_addon . ' deleted successfully.');
        return redirect()->route('addon.index');
    }
}
