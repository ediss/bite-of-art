<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as Gallerist;
use Auth;
use Mail;
use Validator;
use Response;
use View;
use Redirect;
use Hash;


class GalleristController extends Controller
{
    public function index(Request $request) {
        $validator = null;
        return view('gallerist.dashboard',[
            'validator' => $validator
        ]);
    }

    public function updateGallerist(Request $request) {

        if(!isset($request->id)) {
            $gallerist = Gallerist::find(Auth::user()->id);
        }else {
            $gallerist = Gallerist::find($request->id);
        }


        $validator = Validator::make(
            $request->all(),
            [
                "gallery_name"   => "required",
                "curator_name"   => "required",
                "city_country"   => "required",
                "about_gallery"  => "required",
                'passwordConfirm'           => 'required_with:password|same:password',
            ],
            [
                "gallery_name.required"     => "Field 'Gallery Name' can't be empty",
                "about_gallery.required"    => "Field 'About Gallery' can't be empty",
                "curator_name.required"     => "Field 'Curator Name' can't be empty",
                "city_country.required"     => "Field 'City/Country' can't be empty",
                "passwordConfirm.required_with"     => "Confirm password need to be same as new password",
            ]

        );


        if ($validator->passes()) {
            // dd("pass");
            if ($request->hasFile('gallery_cover')) {
                $gallery_cover        = $request->file('gallery_cover');
                $gallery_cover_name   = 'cover_'.time().'.'.$gallery_cover->getClientOriginalExtension();
                $gallery_cover_path   = $gallery_cover ? $gallery_cover->move('images/galleries/', $gallery_cover_name) : null;
            }



            $new_password               = $request->input('password');
            //dd($new_password);
            $gallerist->name            = $request->input('curator_name');
            $gallerist->gallery_name    = $request->input('gallery_name');
            $gallerist->city_country    = $request->input('city_country');
            $gallerist->gallery_cover   = (isset($gallery_cover_path)) ? $gallery_cover_path : null;
            $gallerist->about_gallery   = $request->input('about_gallery');
            $gallerist->password        = (isset($new_password) && $new_password != '') ? Hash::make($new_password) : $gallerist->password;

            if($gallerist->save()) {
                //send mail to moderator
                $data = [
                    'subject' => 'Gallery is updated',
                    'user'    => $gallerist->gallery_name
                ];
                Mail::send(['text'=>'mails.gallery-updated'], $data, function($message) use ($data) {
                    $message->to('biteofart.dev@gmail.com', 'BiteOfArt2')->subject ($data['subject']);
                    $message->from('biteofart.dev@gmail.com', 'Gallerist '.$data['user']. ' made some changes' );

                });
                $message = ["success", $gallerist->gallery_name . " is updated"];
                if(isset($new_password) && $new_password != '' && !isset($request->id)) {

                    $message = "password-update";

                    Auth::logout();
                    return Response::json(['success' => true, 'message' => $message]);
                }



                return Response::json(['success' => true, 'message' => $message]);


                }else {

                    $message = ["error", "OOps! Something went wrong!"];
                    return Response::json(["message" => $message]);
                }

        }else {

            if(!isset($request->id)) {
                $html = View::make('gallerist.dashboard-form', [
                    'validator'=>$validator
                ])->render();

                $response = Response::json(["html" => $html, 'success' => false]);
            }else {
                $html = View::make('moderator.modals.update-gallerist', [
                    'validator' => $validator,
                    'gallerist' => $gallerist
                ])->render();


                return Response::json(["html" => $html, 'success' => false]);
            }
        }






        //return $response;


    }

}
