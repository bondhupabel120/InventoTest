<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*Category*/
    public function addCategory(){
        return view('backend.category.add-category');
    }
    public function saveCategory(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        Category::saveCategoryData($request);
        return back()->with('message', 'Category Add Successfully');
    }
    public function manageCategory(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.category.manage-category', compact('categories'));
    }
    public function editCategory($id){
        $category = Category::find($id);
        return view('backend.category.edit-category', compact('category'));
    }
    public function updateCategory(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        Category::updateCategoryData($request);
        return redirect()->route('manage.category')->with('message', 'Category Update Successfully');
    }
    public function deleteCategory(Request $request){
        Category::deleteCategoryData($request);
        return redirect()->route('manage.category')->with('message', 'Category Delete Successfully');
    }
}
