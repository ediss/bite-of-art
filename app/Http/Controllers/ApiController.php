<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Artist;
use App\Models\Artwork;
use App\Models\News;
use App\User;
use Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ApiController extends Controller
{
    public function getEvents(Request $request) {

        if($request->id) {
            $response = Event::where('id','=', $request->id)
            ->where('approved', '=', 1)->get();

            if($response->count()==0) {
                $response="No events data with id: '$request->id'";
            }
        }elseif($request->nfc) {
            $response = Event::where('nfc_tag','=', $request->nfc)
                              ->where('approved', '=', 1)->get();
            if($response->count()==0) {
                $response="No events data with '$request->nfc' tag";
            }
        }elseif($request->event_closed){

            $now = Carbon::now();

            $response = (DB::select("select * from events where event_closed >= '$now' AND approved = '1' order by created_at DESC"));

            if(!$response) {
                $response="No events data where event closed: '$request->event_closed'";
            }
        }elseif($request->last){
            $response = Event::select('id', 'event_name', 'event_open', 'event_closed', 'event_cover', 'event_place', 'gallerist_id')
            ->where('approved', '=', 1)->orderBy('created_at', 'desc')->take($request->last)->get();
        }else {
            $response = Event::where('approved', '=', 1)->orderBy('created_at', 'desc')->get();
        }


        return Response::json($response, 200, [], JSON_PRETTY_PRINT);
    }

    public function getArtists(Request $request) {

        if($request->id) {
            $response = Artist::where('id', '=', $request->id)->get();

            if($response->count() == 0) {
                $response = "No artist with id: '$request->id'";
            }
        }elseif($request->event_id){
            $response = Artist::where('event_id', '=', $request->event_id)->get();

            if($response->count() == 0) {
                $response = "No artist belongs to Event: '$request->event_id'";
            }
        }else{
            $response = Artist::all();
        }


        return Response::json($response, 200, [], JSON_PRETTY_PRINT);

    }

    public function getArtworks(Request $request) {

        if($request->event_id) {
            $response = Artwork::where('event_id', '=', $request->event_id)->get();

            if($response->count() == 0) {
                $response = "No artwork(s) belongs to Event with id: '$request->event_id'";
            }
        }else{
            $response = Artwork::all();
        }


        return Response::json($response, 200, [], JSON_PRETTY_PRINT);
    }

    public function getGallerists(Request $request) {

        if($request->id) {
            $response = User::where('id', '=', $request->id)
                        ->where('role_id', '=', 2)->get();

            if($response->count() == 0) {
                $response = "No Gallerist exist with id: '$request->id'";
            }
        }else{
            $response = User::where('role_id', '=', 2)->get();
        }


        return Response::json($response, 200, [], JSON_PRETTY_PRINT);
    }


        public function getNews(Request $request) {

            if($request->id) {
                $response =  DB::table('news')
                                ->leftJoin('article_additionals as aa', 'news.id', '=', 'aa.article_id')
                                ->select('news.*', 'aa.article_video', 'aa.article_img','aa.img_360')
                                ->where('news.id', '=', $request->id)
                                ->where('news.approved', '=', 1)
                                ->get();

                $new_response = [];
                foreach($response as $elem){
                    if (!isset($new_response[$elem->id])){
                        $new_response[$elem->id] = [

                            'id'                        => $elem->id,
                            'article_name'              => $elem->article_name,
                            'article_name_srb'          => $elem->article_name_srb,
                            'article_name_esp'          => $elem->article_name_esp,
                            'article_name_slo'          => $elem->article_name_slo,
                            'article_open'              => $elem->article_open,
                            'article_closed'            => $elem->article_closed,
                            'article_cover'             => $elem->article_cover,
                            'article_description'       => $elem->article_description,
                            'srb_article_description'   => $elem->srb_article_description,
                            'esp_article_description'   => $elem->esp_article_description,
                            'slo_article_description'   => $elem->slo_article_description,
                            'article_media'             => $elem->article_media,
                            'article_media_desc'        => $elem->article_media_desc,
                            'article_note'              => $elem->article_note,
                            'user_id'                   => $elem->user_id,
                            'approved'                  => $elem->approved,
                            'created_at'                => $elem->created_at,
                            'updated_at'                => $elem->updated_at,


                            'article_additionals' =>[['article_video' => $elem->article_video, 'article_img' => $elem->article_img]]
                        ];
                    }
                    else{
                        $new_response[$elem->id]['article_additionals'][] =  ['article_video' => $elem->article_video, 'article_img' => $elem->article_img];
                    }
                }
                $response = collect($new_response);

                if($response->count() == 0) {
                    $response = "No article(s) belongs to News with id: '$request->id'";
                }
            }elseif($request->last) {
                $response = News::where('approved', '=', 1)
                            ->orderBy('article_open', 'desc')->take($request->last)->get();
            }else{
                $response = News::where('approved', '=', 1)
                            ->orderBy('article_open', 'desc')->get();
            }


        return Response::json($response, 200, [], JSON_PRETTY_PRINT);
    }
}
