<?php

namespace App\Http\Controllers;

use App\Categories;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        $subcategories = SubCategory::paginate(7);
        return view('subcategory.index' , compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }
        $categories = Categories::all();
        return view('subcategory.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'categories_id' =>'required',
        ]);

        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        $subcategory = new SubCategory();
        $subcategory->categories_id = $request->categories_id;
        $subcategory->data = $request->data;
        $subcategory->title = $request->title;
        $subcategory->save();
        flash('New Subcategory add successfully!')->success();
        return redirect('/subcategories/create');
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
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }
        $subcategory = SubCategory::find($id);
        $categories = Categories::all();
        return view('subcategory/edit', compact('subcategory', 'categories'));
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
        $this->validate($request, [
            'title' => 'required',
            'categories_id' =>'required',
        ]);
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }
        $subcategory = SubCategory::where('id', $id)->first();
        $subcategory->categories_id = $request->categories_id;
        $subcategory->data = $request->data;
        $subcategory->title = $request->title;
        $subcategory->save();


        flash('Category successfully edited')->success();

        return redirect('/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        flash('SubCategory successfully Delete')->success();

        return redirect('/subcategories');
    }
}
