<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\User;
use App\Categories;
use Illuminate\Http\Request;
use Mail;
use App\Mail\RequestService as rsMail;

class CategoryController extends Controller
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

        $categories = Categories::latest()->paginate(7);
        return view('category.index' , compact('categories'));
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
          return view('category.create');
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
            'name' => 'required|max:30',
            'type' => 'required',
            'image' => 'required|max:3000|image',
            'call_to_action' => 'required|max:30',
        ]);
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }
        
        $category = new Categories();
        $category->name = $request->name;
        $category->type = $request->type;
        $category->image = $this->uploadImage($request->image);
        $category->call_to_action = $request->call_to_action;
        $category->save();
        flash('New category add successfully!')->success();
        return redirect('/categories/create');
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
        $category = Categories::find($id);
        return view('category/edit', compact('category'));
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
            'name' => 'required|max:30',
            'type' => 'required',
            'image' => 'max:3000|image',
            'call_to_action' => 'required|max:30',
        ]);
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }
        $category = Categories::where('id', $id)->first();
        if ($request->hasFile('image')) {
            $category->image = $this->updateImage($request->image, $category->image);
        }
        $category->name = $request->name;
        $category->type = $request->type;
        $category->call_to_action = $request->call_to_action;
        $category->save();


        flash('Category successfully edited')->success();

        return redirect('/categories');

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
        $category = Categories::find($id);

        $subcats = $category->subCategories;

        foreach ($subcats as $subcat){
            $subcat->delete();
        }

        $category->delete();
        flash('Category successfully Delete')->success();

        return redirect('/categories');
    }

    public function production()
    {
        $categories = Categories::where('type', 'Service')->get();

        return view('category.production', compact('categories') );
    }

    public function service()
    {
        $categories = Categories::where('type', 'Production')->get();
        return view('category.service', compact('categories') );
    }

    public function requestservice(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);
        Mail::to(env("MAIL_USERNAME"))->queue(new rsMail(auth()->user(), $subcategory));

        flash('An email has been sent to the admin regaring your request.')->success();
        return back();
    }
}
