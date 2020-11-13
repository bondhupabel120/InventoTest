<?php

namespace App\Http\Controllers\Api;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyCollection;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /*Return All Company*/
    public function getAllCompany(){
        $companies = Company::where('status', 1)->orderBy('id', 'desc')->get();
        return new CompanyCollection($companies);
    }
}
