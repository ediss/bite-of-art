<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use Validator;
use Response;
use View;

class CustomRegisterController extends Controller
{
    public function register(Request $request) {

        $validator = null;

        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                "gallery_name"              => "required",
                "about_gallery"             => "required",
                "curator_name"              => "required",
                "email"                     => "required|unique:users",
                "city_country"              => "required",
                "cover_letter"              => "required",
                "password"                  => "required",

            ],
            [
                "gallery_name.required"     => "Field 'Gallery Name' can't be empty",
                "about_gallery.required"    => "Field 'About Gallery' can't be empty",
                "curator_name.required"     => "Field 'Curator Name' can't be empty",
                "email.required"            => "Field 'E-mail' can't be empty",
                "email.unique"              => $request->input('email')." already exist ",
                "city_country.required"     => "Field 'City/Country' can't be empty",
                "cover_letter.required"     => "Field 'Cover Letter' can't be empty",
                "password.required"         => "Field 'Password' can't be empty",
            ]);
            

            if ($validator->passes()){


                if ($request->hasFile('gallery_cover')) {
                    $gallery_cover        = $request->file('gallery_cover');
                    $gallery_cover_name   = 'cover_'.time().'.'.$gallery_cover->getClientOriginalExtension();
                    $gallery_cover_path   = $gallery_cover ? $gallery_cover->move('images/galleries/', $gallery_cover_name) : null;

                }

                $gallerist = new User;

                $gallerist->name            = $request->input('curator_name');
                $gallerist->email           = $request->input('email');
                $gallerist->password        = Hash::make($request->input('password'));
                $gallerist->role_id         = 2;
                $gallerist->gallery_name    = $request->input('gallery_name');
                $gallerist->city_country    = $request->input('city_country');
                $gallerist->gallery_cover   = (isset($gallery_cover_path)) ? $gallery_cover_path : null;
                $gallerist->about_gallery   = $request->input('about_gallery');
                $gallerist->website         = $request->input('website');
                $gallerist->cover_letter    = $request->input('cover_letter');
                $gallerist->approved        = 0;

                if($gallerist->save()) {
                    //send mail to moderator
                    // print success message

                    return true;

                }

            }


        }

        return view('auth.register',[
            'validator' => $validator
        ]);

    }
}
