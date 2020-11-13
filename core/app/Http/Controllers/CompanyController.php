<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /*Company*/
    public function addCompany(){
        $categories = Category::where('status', 1)->get();
        return view('backend.company.add-company', compact('categories'));
    }
    public function saveCompany(Request $request){
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'number_of_employee' => 'required',
            'website' => 'required',
            'phone' => 'required|max:11',
        ]);
        Company::saveCompanyData($request);
        return back()->with('message', 'Company Add Successfully');
    }
    public function manageCompany(){
        $companies = Company::orderBy('id', 'desc')->get();
        return view('backend.company.manage-company', compact('companies'));
    }
    public function editCompany($id){
        $categories = Category::where('status', 1)->get();
        $company = Company::find($id);
        return view('backend.company.edit-company', compact('categories', 'company'));
    }
    public function updateCompany(Request $request){
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'number_of_employee' => 'required',
            'website' => 'required',
            'phone' => 'required|max:11',
        ]);
        Company::updateCompanyData($request);
        return redirect()->route('manage.company')->with('message', 'Company Update Successfully');
    }
    public function deleteCompany(Request $request){
        Company::deleteCompanyData($request);
        return redirect()->route('manage.company')->with('message', 'Company Delete Successfully');
    }
}
