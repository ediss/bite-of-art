<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as Gallerist;

use Validator;


class GalleristController extends Controller
{
    public function index() {
        $validator = null;
        return view('gallerist.dashboard',[
            'validator' => $validator
        ]);
    }

    public function addNews(Request $request) {

        //@todo find better solution, method is too big

        $validator = null;
        if ($request->isMethod('post')) {


            //dd(explode(" ", $request->input('daterange')));
            $validator = Validator::make($request->all(), [
                "article_name"              => "required",
                "article_cover"             => "required",
                "daterange"                 => "required",
                "article_cover_description" => "required",
            ],
            [
                "article_name.required"               => "Field 'article Name ' can't be empty",
                "daterange.required"                  => "Please choose date",
                "article_cover_description.required"  => "Field 'About article ' can't be empty",
                "article_cover.required"              => "Choose photo",



            ]);

            if ($validator->passes()){
                $article_name         = $request->input('article_name');
                $article_date         = explode(" - ", $request->input('daterange'));
                $article_cover        = $request->input('article_cover');
                $article_cover_desc   = $request->input('article_cover_description');
                $article_media        = $request->input('article_media');
                $article_media_desc   = $request->input('article_media_description');
                $article_note         = $request->input('article_note');

                $user_id       = Auth::user()->id; //@todo id gallerist from auth

                $articleObj = new News();

                //uplouding event photos
                if ($request->hasFile('article_cover')) {
                    $article_cover        = $request->file('article_cover');
                    $article_cover_name   = 'cover_'.time().'.'.$article_cover->getClientOriginalExtension();
                    $article_cover_path   = $article_cover ? $article_cover->move('images/articles/', $article_cover_name) : null;

                }

    
                //Inserting in DB
                $articleObj->article_name           = $article_name;
                $articleObj->article_open           = $article_date[0];
                $articleObj->article_closed         = $article_date[1];
                $articleObj->article_cover          = $article_cover_path;

                $articleObj->article_description    = $article_cover_desc.'~';
                
                $articleObj->article_media          = $article_media;
                $articleObj->article_media_desc     = $article_media_desc;
                $articleObj->article_note           = $article_note;
                $articleObj->user_id                = $user_id;



                if($articleObj->save()) {
                    $message = ["success", $article_name. " is saved"];
                    

                    

                    $html = View::make('gallerist.add-news',[
                        'validator' => $validator

                    ])->render();

                    return Response::json(["html" => $html, 'success' => true, 'message' => $message]);

                }else {
                    $message = ["error", "OOps! Something went wrong!"];
                    return Response::json(["message" => $message]);
                }

            }
            $html = View::make('gallerist.add-news', [
                'validator'=>$validator
            ])->render();

            return Response::json(["html" => $html, 'success' => false]);
        }

        return view('gallerist.add-news', ['validator' => $validator]);


    }
}
