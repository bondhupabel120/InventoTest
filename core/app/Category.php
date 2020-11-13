<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public static function saveCategoryData($request){
        Category::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);
    }
    public static function updateCategoryData($request){
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
    }
    public static function deleteCategoryData($request){
        $category = Category::find($request->id);
        $category->delete();
    }
}
