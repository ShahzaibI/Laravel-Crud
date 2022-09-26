<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
    public function index()
    {
        // $caregories_data = Category::get();//Get data
        // Get data and paginate it
        $categories_data = Category::oldest()->paginate(3); // Also use the latest() on the place of oldest then first data go on another page
        return view('categories.list',['category_data' => $categories_data]); //return view of list file exist in categories folder
    }
    public function create()
    {
        return view('categories.new');
    }
    public function store(Request $request)
    {
        // dd($request->all());//see data in controller on web page
        // validation of data
        $request->validate([
            'title'=> 'required|unique:categories|max:200' //in which space not acceptable
        ]);
        // save data
        $category = new Category;// create object of Create modal
        $category->title = $request->title;// Store data in model
        $category->save();// save in database
        return redirect('/')->withSuccess('New category created.');
    }
    public function edit($id) //accept parameter from web.php
    {
        $category = Category::where('id',$id)->first(); // Fetch the first data against the id from model (Category) class
        // return view('categories.edit',['category'=>$category]);
        return view('categories.edit',compact('category')); // Same as above line but in which we pass the category variable as it and this variable access in edit file as its same name :)
    }
    public function update(Request $request, $id)
    {
         // validation of data
        $request->validate([
            'title'=> 'required|max:200' //in which space not acceptable
        ]);
        // save data
        $category = Category::where('id',$id)->first();

        $category->title = $request->title;

        $category->save();

        return redirect('/')->withSuccess('Category updated.');
    }
    public function delete($id)
    {
        // $category = Category::where('id', $id)->first();
        // same as above
        $category = Category::whereId($id)->first();
        $title = $category->title;
        $category->delete();

        return redirect('/')->withSuccess('Category ('. $title. ') Deleted.');
        // withSuccess method use for flash message notify
    }

}
