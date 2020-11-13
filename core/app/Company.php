<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Company extends Model
{
    protected $guarded = [];

    public function categoryName(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public static function saveCompanyData($request){
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->hashName();
            $location = 'assets/backend/images/company/'.$imageName;
            Image::make($image)->save($location);
        }
        Company::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'number_of_employee' => $request->number_of_employee,
            'website' => $request->website,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'image' => $request->hasFile('image') ? $imageName : null,
            'status' => $request->status,
        ]);
    }
    public static function updateCompanyData($request){
        $company = Company::find($request->id);
        if ($request->hasFile('image')){
            @unlink('assets/backend/images/company/'.$company->image);
            $image = $request->file('image');
            $imageName = $image->hashName();
            $location = 'assets/backend/images/company/'.$imageName;
            Image::make($image)->save($location);
            $company->image = $imageName;
        }
        $company->category_id = $request->category_id;
        $company->name = $request->name;
        $company->number_of_employee = $request->number_of_employee;
        $company->website = $request->website;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->status = $request->status;
        $company->save();
    }
    public static function deleteCompanyData($request){
        $company = Company::find($request->id);
        @unlink('assets/backend/images/company/'.$company->image);
        $company->delete();
    }
}
