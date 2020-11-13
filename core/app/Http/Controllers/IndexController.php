<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /*Show All Company*/
    public function index(){
        $companies = Company::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.company.company', compact('companies'));
    }
    /*Company Profile page*/
    public function companyDetails($id){
        $company = Company::find($id);
        return view('frontend.company.company-details', compact('company'));
    }
}
