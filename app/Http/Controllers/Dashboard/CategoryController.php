<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate(Category::rules());
        // store in category model
        $category = Category::create($request->all());
        // return redirect to index page with success message
        return redirect()->route('categories.index')
            ->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the category by id
        try{
            $category = Category::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('categories.index')
                ->with('error','Category not found');
        }
        //return view with governorate
        return view('dashboard.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // check the id parameter is in model
        try{
            $category = Category::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('categories.index')->with('error','category not found');
        }
        //return view with the edit form by id parameter
        return view('dashboard.categories.edit',compact('category'));
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
        // validation for update
        $request->validate(Category::rules());
        // find governorate
        $category = Category::findOrFail($id);
        //update governorate model
        $category->update($request->all());
        //return redirect to index page with success message
        return redirect()->route('categories.index')
            ->with('success','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        //return redirect to index page with success message
        return redirect()->route('categories.index')
            ->with('success','Category deleted successfully.');
    }
}
