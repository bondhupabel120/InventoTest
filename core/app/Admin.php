<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Image;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*Edit Admin Profile*/
    public static function updateAdminProfileData($request){
        $profile = Admin::find($request->id);
        if ($request->hasFile('image')){
            @unlink('assets/backend/images/admin/'.$profile->image);
            $image = $request->file('image');
            $imageName = $image->hashName();
            $location = 'assets/backend/images/admin/'.$imageName;
            Image::make($image)->save($location);
            $profile->image = $imageName;
        }
        $profile->name = $request->name;
        $profile->user_name = $request->user_name;
        $profile->email = $request->email;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->save();
    }
}
