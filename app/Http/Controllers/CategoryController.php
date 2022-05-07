<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id', 'pos_category', 'is_visible')->orderBy('pos_category', 'ASC')->get();
        return View::make('pos.pages.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('pos.pages.category.create');
    }

    public function category_rules() {
        return [
            'pos_category.required' => 'Category name is required',
            'pos_category.max' => 'Only 30 characters allowed',
            'is_visible.required' => 'Choose Visible or Invisible'
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
            'pos_category' => 'required|max:30',
            'is_visible' => 'required'
        ], $this->category_rules());
        
        if($validator->fails()) {

            Session::flash('error', 'Please fix the following errors.');
            return redirect()->back()->withErrors($validator)->withInput();

        } else if(Category::where('pos_category', $request->pos_category)->exists()) {

            Session::flash('error', ucfirst($request->pos_category) . ' category already exists');
            return redirect()->back()->withErrors($validator)->withInput();

        }
     
        Category::create($validator->validated());

        Session::flash('success', ucfirst($request->pos_category) . " category saved successfully.");
        return redirect()->intended(route('category.create'));

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
        $category = Category::find($id);
        return View::make('pos.pages.category.edit', ['category' => $category]);
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
            'pos_category' => 'required|max:30',
            'is_visible' => 'required'
        ], $this->category_rules());
        
        if($validator->fails()) {

            Session::flash('error', 'Please fix the following errors.');
            return redirect()->back()->withErrors($validator)->withInput();

        } 
        
        $category = Category::find($id);

        $category->pos_category = $request->pos_category;
        $category->is_visible = $request->is_visible;

        $old_category = $category->getOriginal('pos_category');
        $new_category = ucfirst($request->pos_category);
        $visibility = $request->is_visible == 1 ? 'visible' : 'Invisible'; 

        if(!$category->isDirty('pos_category')) {

            Session::flash('success', 'Category is ' . $visibility);

        } else if($category->where('pos_category', $new_category)->exists()) {

            Session::flash('error', $new_category . ' category already exists.');
            return redirect()->back()->withInput();

        } else {

            Session::flash('success', $old_category . ' category has been changed to ' . $new_category);

        }

        $category->save();
        
        return redirect()->intended(route('category.edit', $id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Need to program Item section before you can delete categories!
         * Categories are tied to Items and therefore they CAN NOT be deleted
         * if they are assigned to an Item. Items will need to be removed
         * from that category first.
         */
    }
}
