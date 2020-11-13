<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /*Edit Admin Profile*/
    public function editAdminProfile(){
        $profile = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('backend.admin.edit-profile', compact('profile'));
    }
    public function updateAdminProfile(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'user_name' => 'required',
            'email' => 'required',
        ]);
        Admin::updateAdminProfileData($request);
        return redirect()->route('admin.home')->with('message', 'Profile Update Successful');
    }
}
