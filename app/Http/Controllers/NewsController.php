<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;
use App\Models\ArticleAdditionals;
use Response;
use View;
use Validator;
use Auth;

class NewsController extends Controller
{
     public function index() {

        //return only approved
         return view ('news.news', ['news' => News::where('approved','=', 1)->orderBy('article_open', 'desc')->get()]);
     }


     public function addArticle(Request $request) {

          //@todo find better solution, method is too big

          $validator = null;
          if ($request->isMethod('post')) {

              $validator = Validator::make($request->all(), [
                  "article_name"    => "required",
                  "article_cover"   => "required",
                  "daterange"       => "required",
                  "desc"            => "required",
              ],
              [
                  "article_name.required"   => "Field 'article Name ' can't be empty",
                  "daterange.required"      => "Please choose date",
                  "desc.required"           => "Field 'About article ' can't be empty",
                  "article_cover.required"  => "Choose photo",



              ]);

              if ($validator->passes()){
                  $article_name         = $request->input('article_name');
                  $article_date         = $request->input('daterange');
                  $article_cover        = $request->input('article_cover');
                  $article_cover_desc   = $request->desc;
                  $article_media        = $request->input('article_media');
                  $article_media_desc   = $request->input('article_media_description');
                  $article_note         = $request->input('article_note');

                  $user_id       = Auth::user()->id; //@todo id gallerist from auth

                  $articleObj = new News();

                  //uplouding article photos
                  if ($request->hasFile('article_cover')) {
                      $article_cover        = $request->file('article_cover');
                      $article_cover_name   = 'cover_'.time().'.'.$article_cover->getClientOriginalExtension();
                      $article_cover_path   = $article_cover ? $article_cover->move('images/articles/', $article_cover_name) : null;

                  }

                  //Inserting in DB
                  $articleObj->article_name           = $article_name;
                  $articleObj->article_open           = $article_date;
                  $articleObj->article_cover          = $article_cover_path;

                  $articleObj->article_description    = $article_cover_desc.'~';

                  $articleObj->article_media          = $article_media;
                  $articleObj->article_media_desc     = $article_media_desc;
                  $articleObj->article_note           = $article_note;
                  $articleObj->user_id                = $user_id;



                  if($articleObj->save()) {

                    $articleLastId = $articleObj->id;

                    if ($request->hasFile('article_images')) {

                         $article_images = $request->file('article_images');


                         foreach($article_images as $article_image) {

                             $article_image_name  = Str::random(5)."-".date('his')."-".Str::random(3).".".$article_image->getClientOriginalExtension();
                             $article_image_path = $article_image ? $article_image->move('images/articles/', $article_image_name) : null;


                             $article_additional = new ArticleAdditionals();

                             $article_additional->article_id = $articleLastId;

                             $article_additional->article_img = $article_image_path;

                             $article_additional->save();


                         }

                     }
                      $message = ["success", $article_name. " is saved"];

                      $html = View::make('news.add-new-article',[
                          'validator' => $validator

                      ])->render();

                      return Response::json(["html" => $html, 'success' => true, 'message' => $message]);

                  }else {
                      $message = ["error", "OOps! Something went wrong!"];
                      return Response::json(["message" => $message]);
                  }

              }else {

               $html = View::make('inc.partial.news-form.add-article-form', [
                    'validator'=>$validator
                ])->render();

                return Response::json(["html" => $html, 'success' => false]);
              }

          }

          return view('news.add-new-article', ['validator' => $validator]);


      }
}
