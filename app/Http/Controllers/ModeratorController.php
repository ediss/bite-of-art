<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ArticleAdditionals;
use App\Models\Artwork;
use App\Models\Artist;
use App\Models\Event;
use App\Models\News;
use App\User;
use Validator;
use Response;
use Redirect;
use Session;
use View;



class ModeratorController extends Controller
{
    //@todo make middleware for moderator
    public $count_news;
    public $count_events;
    public $count_gallerists;
    public function __construct()
    {
        $this->middleware('moderator');

        $this->count_news       = count(News::all());
        $this->count_events     = count(Event::all());
        $this->count_gallerists = count(User::where('role_id', '!=', '1')->get());

        View::share([
            'count_news' => $this->count_news,
            'count_events' => $this->count_events,
            'count_gallerists' => $this->count_gallerists,

        ]);
    }
    public function index() {

        return view('layout.dashboard');
    }

    public function getGallerists()
    {
        $gallerists = new User();

        $data = $gallerists->where('role_id', '2')->get();

        $html = View::make('inc.partial.dashboard.tables.gallerists-table', [
            'gallerists'  => $data,
        ])->render();

        return Response::json(["html" => $html]);
    }



    public function approveGallerist(Request $request, $id, $lang) {

        $gallerist = User::find($request->id);

        if ($request->approved == "true") {
            $gallerist->approved = 1;

            if ($gallerist->save()) {
                $message = ["success", $gallerist->name . " is approved"];
                return Response::json(["message" => $message]);
            } else {
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
        } elseif ($request->approved == "false") {
            $gallerist->approved = 0;
            if ($gallerist->save()) {
                $message = ["success", $gallerist->name . " is unapproved"];
                return Response::json(["message" => $message]);
            } else {
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
        }
    }

    public function updateGallerist(Request $request) {
        $gallerist = User::find($request->id);
        $validator = null;
        $html = View::make('moderator.modals.update-gallerist', [
            "gallerist" => $gallerist,
            'validator' => $validator
        ])->render();

        return Response::json(["html" => $html, "success" => "true"]);
    }

    public function getEvents()
    {
        $events = new Event;

        $data = $events->all();

        $html = View::make('inc.partial.dashboard.tables.events-table', [
            'events'  => $data,
        ])->render();

        return Response::json(["html" => $html]);
    }

    //launch modal with event note & event media description
    public function eventMediaDesc(Request $request) {
        $event = Event::find($request->id);

        $event_media_desc = $event->event_media_desc;
        $event_note = $event->event_note;

        $html = View::make('moderator.modals.event-additional-data', [
            'event_media_desc' => $event_media_desc,
            'event_note'       => $event_note
            ])->render();

        return Response::json(["html" => $html, "success" => "true"]);
    }

    public function approveEvent(Request $request,  $id, $lang)
    {
        $event = Event::find($request->id);

        if ($request->approved == "true") {
            $event->approved = 1;

            if ($event->save()) {
                $message = ["success", $event->event_name . " is approved"];
                return Response::json(["message" => $message]);
            } else {
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
        } elseif ($request->approved == "false") {
            $event->approved = 0;
            if ($event->save()) {
                $message = ["success", $event->event_name . " is unapproved"];
                return Response::json(["message" => $message]);
            } else {
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
        }
    }

    public function updateEvent(Request $request)
    {
        $success = null;
        $validator = null;
        $event_id = $request->id;

        $event = Event::find($event_id);



        $validator = null;
        if ($request->isMethod('post')) {

            $validator = Validator::make(
                $request->all(),
                [
                    "new_event_description"   => "required",
                    "new_event_name"          => "required",
                ],
                [
                    "new_event_description.required"  => "Field 'Event Description ' can't be empty",
                    "new_event_name.required"         => "Field 'Name ' can't be empty",
                ]
            );

            // dd($request->all());

            if ($validator->passes()) {
                $vr_tour            = $request->input('virtual_tour');
                $img_360            = $request->input('img_360');
                $event_name         = $request->input('new_event_name');
                $event_date         = explode(" - ", $request->input('new_daterange'));
                $event_cover        = $request->input('new_event_cover');
                $event_desc         = $request->input('new_event_description');
                $event_desc_srb     = $request->input('new_event_description_srb');
                $event_desc_esp     = $request->input('new_event_description_esp');
                $event_desc_slo     = $request->input('new_event_description_slo');

                $event_image_1      = $request->input('event_new_image_1');
                $event_image_2      = $request->input('event_new_image_2');
                $event_image_3      = $request->input('event_new_image_3');
                $event_image_1_desc = $request->input('new_event_image_1_desc');
                $event_image_2_desc = $request->input('new_event_image_2_desc');
                $event_image_3_desc = $request->input('new_event_image_3_desc');
                $event_media        = $request->input('new_event_media');
                $event_media_desc   = $request->input('new_media_description');
                $event_note         = $request->input('new_event_note');




                //uplouding event photos
                if ($request->hasFile('new_event_cover')) {
                    $event_cover        = $request->file('new_event_cover');
                    $event_cover_name   = 'cover_' . time() . '.' . $event_cover->getClientOriginalExtension();
                    $event_cover_path   = $event_cover ? $event_cover->move('images/events/', $event_cover_name) : null;
                }

                if ($request->hasFile('event_new_image_1')) {
                    $event_image_1        = $request->file('event_new_image_1');
                    $event_image_1_name   = 'image_1_' . time() . '.' . $event_image_1->getClientOriginalExtension();
                    $event_image_1_path   = $event_image_1 ? $event_image_1->move('images/events/', $event_image_1_name) : null;
                }
                if ($request->hasFile('event_new_image_2')) {
                    $event_image_2        = $request->file('event_new_image_2');
                    $event_image_2_name   = 'image_2_' . time() . '.' . $event_image_2->getClientOriginalExtension();
                    $event_image_2_path   = $event_image_2 ? $event_image_2->move('images/events/', $event_image_2_name) : null;
                }

                if ($request->hasFile('event_new_image_3')) {
                    $event_image_3        = $request->file('event_new_image_3');
                    $event_image_3_name   = 'image_3_' . time() . '.' . $event_image_3->getClientOriginalExtension();
                    $event_image_3_path   = $event_image_3 ? $event_image_3->move('images/events/', $event_image_3_name) : null;
                }


                //Inserting in DB
                $event->event_name           = $event_name;
                $event->event_open           = $event_date[0];
                $event->event_closed         = $event_date[1];
                $event->event_cover          = (isset($event_cover_path)) ? $event_cover_path : $event->event_cover;



                $event->event_description_en     = $event_desc;
                $event->event_description_srb    = $event_desc_srb;
                $event->event_description_esp    = $event_desc_esp;
                $event->event_description_slo    = $event_desc_slo;
                $event->event_img_1              = (isset($event_image_1_path)) ? $event_image_1_path : $event->event_img_1;
                $event->event_img_2              = (isset($event_image_2_path)) ? $event_image_2_path : $event->event_img_2;
                $event->event_img_3              = (isset($event_image_3_path)) ? $event_image_3_path : $event->event_img_3;
                $event->event_img_1_desc         = $event_image_1_desc;
                $event->event_img_2_desc         = $event_image_2_desc;
                $event->event_img_3_desc         = $event_image_3_desc;
                $event->event_media              = $event_media;
                $event->event_media_desc         = $event_media_desc;
                $event->event_note               = $event_note;
                $event->vr_tour                  = $vr_tour;
                $event->img_360                  = $img_360;



                if ($event->save()) {
                    $message = ["success", $event->event_name . " is updated"];


                    //GaleryName(first 3 char)+GaleryId+EventName(first 3 char)+EventID
                    $nfc_tag = substr($event->user->gallery_name, 0, 3).$event->user->id.substr($event->event_name, 0, 3).$event->id;

                    $event->nfc_tag = $nfc_tag;
                    $event->save();

                    return redirect()->back()->with('message-success', $event->event_name . " is updated");
                }else {
                        return redirect()->back()->with('message-error', "OOps! Something went wrong!");
                }
            } else {

                return view('moderator.events.event-update', [
                    'event' => $event,
                    'validator' => $validator
                ]);

            }
        }

        return view('moderator.events.event-update', [

            'event' => $event,
            'validator' => $validator
        ]);

    }

    /* Updating artist which belong to Event*/
    public function updateEventArtistData(Request $request) {

        $success = null;
        $validator = null;
        $event_id = $request->id;
        $event_name = Event::where('id', '=', $event_id)->first()->event_name;


        $artists = Artist::where('event_id', '=', $event_id)->get();

        $validator = null;
        if ($request->isMethod('post')) {
            $validator = Validator::make(
                $request->all(),
                [
                    "new_artist_about"   => "required",
                    "new_artist_name"    => "required",
                ],
                [
                    "new_artist_about.required"  => "Field 'About Artist ' can't be empty",
                    "new_artist_name.required"   => "Field 'Artist Name ' can't be empty",
                ]
            );

            if ($validator->passes()) {
                $artist_name        = $request->input('new_artist_name');
                $artist_about       = $request->input('new_artist_about');
                $artist_cover       = $request->input('new_artist_cover');
                $artist_img_1       = $request->input('new_artist_img_1');
                $artist_img_2       = $request->input('new_artist_img_2');
                $artist_img_3       = $request->input('new_artist_img_3');
                $artist_img_desc    = $request->input('new_artist_img_1_desc');
                $artist_img_desc_2  = $request->input('new_artist_img_2_desc');
                $artist_img_desc_3  = $request->input('new_artist_img_3_desc');

                if ($request->hasFile('new_artist_cover')) {
                    $artist_cover        = $request->file('new_artist_cover');
                    $artist_cover_name   = 'cover_' . time() . '.' . $artist_cover->getClientOriginalExtension();
                    $artist_cover_path   = $artist_cover ? $artist_cover->move('images/artists/', $artist_cover_name) : null;
                }

                if ($request->hasFile('new_artist_img_1')) {
                    $artist_img_1        = $request->file('new_artist_img_1');
                    $artist_img_1_name   = 'artist_img_1_' . time() . '.' . $artist_img_1->getClientOriginalExtension();
                    $artist_img_1_path   = $artist_img_1 ? $artist_img_1->move('images/artists/', $artist_img_1_name) : null;
                }

                if ($request->hasFile('new_artist_img_2')) {
                    $artist_img_2        = $request->file('new_artist_img_2');
                    $artist_img_2_name   = 'artist_img_2_' . time() . '.' . $artist_img_2->getClientOriginalExtension();
                    $artist_img_2_path   = $artist_img_2 ? $artist_img_2->move('images/artists/', $artist_img_2_name) : null;
                }

                if ($request->hasFile('new_artist_img_3')) {
                    $artist_img_3        = $request->file('new_artist_img_3');
                    $artist_img_3_name   = 'artist_img_3_' . time() . '.' . $artist_img_3->getClientOriginalExtension();
                    $artist_img_3_path   = $artist_img_3 ? $artist_img_3->move('images/artists/', $artist_img_3_name) : null;
                }

                $artistObj = Artist::find($request->input('artist_id_hidden'));

                $artistObj->artist_name       = $artist_name;
                $artistObj->artist_about      = $artist_about;

                if(isset($artist_cover_path)){
                    $artistObj->artist_cover      = $artist_cover_path;
                }

                $artistObj->artist_img_1      = (isset($artist_img_1_path)) ? $artist_img_1_path : $artistObj->artist_img_1;
                $artistObj->artist_img_2      = (isset($artist_img_2_path)) ? $artist_img_2_path : $artistObj->artist_img_2;
                $artistObj->artist_img_3      = (isset($artist_img_3_path)) ? $artist_img_3_path : $artistObj->artist_img_3;
                $artistObj->artist_img_1_desc = $artist_img_desc;
                $artistObj->artist_img_2_desc = $artist_img_desc_2;
                $artistObj->artist_img_3_desc = $artist_img_desc_3;



                if ($artistObj->save()) {
                    $message = ["success", $artistObj->artist_name . " is updated"];
                    return Redirect::back()->with('success', $artistObj->artist_name . " is updated");


                    //GaleryName(first 3 char)+GaleryId+EventName(first 3 char)+EventID
                    //$nfc_tag = substr(Auth::user()->gallery_name, 0, 3).Auth::user()->id.substr($event->event_name, 0, 3).$eventLastId;

                    return Response::json(['success' => true, 'message' => $message]);
                } else {
                    $message = ["error", "OOps! Something went wrong!"];
                    return Response::json(["message" => $message]);
                }
            } else {

                return Redirect::back()->withErrors($validator);

            }


        }

        return view ('moderator.events.update-all-event-data', [

            'artists'    => $artists,
            'event_id'   =>  $event_id,
            'event_name' => $event_name,
            'validator'  => $validator
        ]);

        //return Response::json(["html" => $html, "success" => $success]);
    }


        /* Updating artwork which belong to Event*/
        public function updateEventArtworkData(Request $request) {

            $artwork = Artwork::find($request->id);

            $validator = null;
            if ($request->isMethod('post')) {


                $validator = Validator::make(
                    $request->all(),
                    [
                        "new_artwork_name"   => "required",
                        "new_artwork_about"    => "required",
                    ],
                    [
                        "new_artwork_name.required"   => "Field 'Artwork Name ' can't be empty",
                        "new_artwork_about.required"  => "Field 'About Artwork ' can't be empty",
                    ]
                );

                if ($validator->passes()) {
                    $artwork_name        = $request->input('new_artwork_name');
                    $artwork_about       = $request->input('new_artwork_about');
                    $artwork_cover       = $request->input('new_artwork_cover');
                    $artwork_media       = $request->input('new_artwork_media');
                    $artwork_img_1       = $request->input('new_artwork_img_1');
                    $artwork_img_2       = $request->input('new_artwork_img_2');
                    $artwork_img_3       = $request->input('new_artwork_img_3');
                    $artwork_img_desc    = $request->input('new_artwork_img_1_desc');
                    $artwork_img_desc_2  = $request->input('new_artwork_img_2_desc');
                    $artwork_img_desc_3  = $request->input('new_artwork_img_3_desc');
                    

                    if ($request->hasFile('new_artwork_cover')) {
                        $artwork_cover        = $request->file('new_artwork_cover');
                        $artwork_cover_name   = 'cover_' . time() . '.' . $artwork_cover->getClientOriginalExtension();
                        $artwork_cover_path   = $artwork_cover ? $artwork_cover->move('images/artworks/', $artwork_cover_name) : null;
                    }

                    if ($request->hasFile('new_artwork_img_1')) {
                        $artwork_img_1        = $request->file('new_artwork_img_1');
                        $artwork_img_1_name   = 'artwork_img_1_' . time() . '.' . $artwork_img_1->getClientOriginalExtension();
                        $artwork_img_1_path   = $artwork_img_1 ? $artwork_img_1->move('images/artworks/', $artwork_img_1_name) : null;
                    }

                    if ($request->hasFile('new_artwork_img_2')) {
                        $artwork_img_2        = $request->file('new_artwork_img_2');
                        $artwork_img_2_name   = 'artwork_img_2_' . time() . '.' . $artwork_img_2->getClientOriginalExtension();
                        $artwork_img_2_path   = $artwork_img_2 ? $artwork_img_2->move('images/artworks/', $artwork_img_2_name) : null;
                    }

                    if ($request->hasFile('new_artwork_img_3')) {
                        $artwork_img_3        = $request->file('new_artwork_img_3');
                        $artwork_img_3_name   = 'artwork_img_3_' . time() . '.' . $artwork_img_3->getClientOriginalExtension();
                        $artwork_img_3_path   = $artwork_img_3 ? $artwork_img_3->move('images/artworks/', $artwork_img_3_name) : null;
                    }



                    $artwork->artwork_name       = $artwork_name;
                    $artwork->artwork_about      = $artwork_about;

                    if(isset($artwork_cover_path)){
                        $artwork->artwork_cover      = $artwork_cover_path;
                    }

                    $artwork->artwork_media      = $artwork_media;
                    $artwork->artwork_img_1      = (isset($artwork_img_1_path)) ? $artwork_img_1_path : $artwork->artwork_img_1;
                    $artwork->artwork_img_2      = (isset($artwork_img_2_path)) ? $artwork_img_2_path : $artwork->artwork_img_2;
                    $artwork->artwork_img_3      = (isset($artwork_img_3_path)) ? $artwork_img_3_path : $artwork->artwork_img_3;
                    $artwork->artwork_img_1_desc = $artwork_img_desc;
                    $artwork->artwork_img_2_desc = $artwork_img_desc_2;
                    $artwork->artwork_img_3_desc = $artwork_img_desc_3;

                    if ($artwork->save()) {

                        $artwork_nfc_tag = $artwork->event->nfc_tag.substr($artwork_name, 0, 3).$artwork->id;
                        $artwork->nfc_tag = $artwork_nfc_tag;

                        $artwork->save();

                        return Redirect::back()->with('success', $artwork->artwork_name . " is updated");

                    } else {
                        $message = ["error", "OOps! Something went wrong! Update artwork error! Copy this message and call developer.."];
                        return Response::json(["message" => $message]);
                    }
                } else {

                    return Redirect::back()->withErrors($validator);

                }


            }
        }

    public function getNews()
    {

        //return only approved
        
        $data = News::orderBy('article_open', 'desc')->get();
        $html = View::make('inc.partial.dashboard.tables.news-table', [
            'news'  => $data,
        ])->render();

        return Response::json(["html" => $html]);
    }

    public function approveArticle(Request $request)
    {
        $article = News::find($request->id);


        if ($request->approved == "true") {
            $article->approved = 1;

            if ($article->save()) {
                $message = ["success", $article->article_name . " is approved"];
                return Response::json(["message" => $message]);
            } else {
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
        } elseif ($request->approved == "false") {
            $article->approved = 0;
            if ($article->save()) {
                $message = ["success", $article->article_name . " is unapproved"];
                return Response::json(["message" => $message]);
            } else {
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
        }
    }

    public function updateArticle(Request $request)
    {
        $success = null;
        $validator = null;
        $article_id = $request->id;

        $article = News::find($article_id);

        $article_additional = ArticleAdditionals::where("article_id", "=", $article_id)->get();


        if ($request->isMethod('post')) {

            $validator = Validator::make(
                $request->all(),
                [
                    "new_article_text"   => "required",
                    "new_article_name"   => "required",
                ],
                [
                    "new_article_name.required"  => "Field 'Name ' can't be empty",
                ]
            );

            if ($validator->passes()) {
                $article_name         = $request->input('new_article_name');
                $article_date         = $request->input('new_daterange');
                $article_cover        = $request->input('new_article_cover');
                $article_text         = $request->input('new_article_text');
                $article_text_srb     = $request->input('new_article_text_srb');
                $article_text_esp     = $request->input('new_article_text_esp');
                $article_text_slo     = $request->input('new_article_text_slo');
                //geting checkbox input value (image id) for resolving which img need to be changed
                $which_img = $request->input('which_img');


                //uplouding article photos
                if ($request->hasFile('new_article_cover')) {
                    $article_cover        = $request->file('new_article_cover');
                    $article_cover_name   = 'cover_' . time() . '.' . $article_cover->getClientOriginalExtension();
                    $article_cover_path   = $article_cover ? $article_cover->move('images/articles/', $article_cover_name) : null;
                }

                if(isset($which_img)) {
                    foreach($which_img as $img_chb) {
                        if ($request->hasFile('new_article_image_'.$img_chb)) {
                            $article_image = $request->file('new_article_image_'.$img_chb);

                            $article_image_name = Str::random(5)."-".date('his')."-".Str::random(3).".".$article_image->getClientOriginalExtension();
                            $article_image_path = $article_image ? $article_image->move('images/articles/', $article_image_name) : null;

                            $article_new_img = ArticleAdditionals::find($img_chb);

                            $article_new_img->article_img = (isset($article_image_path)) ? $article_image_path : $article_new_img->article_img;

                            $article_new_img->save();

                        }
                    }
                }

                //Inserting in DB (news table)
                $article->article_name              = $article_name;
                $article->article_open              = $article_date;
                $article->article_cover             = (isset($article_cover_path)) ? $article_cover_path : $article->article_cover;
                $article->article_description       = $article_text;
                $article->esp_article_description   = $article_text_esp;
                $article->srb_article_description   = $article_text_srb;
                $article->slo_article_description   = $article_text_slo;

                //Inserting in DB (article_additionals table)





//                $article_images = new ArticleAdditionals($article_id);




                if ($article->save()) {
                    return redirect()->back()->with('message-success', $article->article_name . " is updated");
                } else {
                    return redirect()->back()->with('message-error', "OOps! Something went wrong!");
                }
            } else {

               return view('moderator.news.update-article', [
                    'article' => $article,
                    'validator' => $validator
                ]);

                //return Response::json(["html" => $html, 'success' => false]);
            }
        }


        return view('moderator.news.update-article', [
            'article'            => $article,
            'validator'          => $validator,
            'article_additional' => $article_additional
        ]);
    }

    public function articleAdditional(Request $request) {

        $success = null;
        $article_id = $request->id;

        $article = News::find($article_id);


        if ($request->isMethod('post')) {
            $article_additional = new ArticleAdditionals();
            $video      = $request->input('video_url');
            $img_360    = $request->input('img_360');


            if ($request->hasFile('new_article_images')) {

                $article_images = $request->file('new_article_images');

                //dd($article_images);

                foreach($article_images as $article_image) {

                    $article_additional = new ArticleAdditionals();
                    $article_image_name = Str::random(5)."-".date('his')."-".Str::random(3).".".$article_image->getClientOriginalExtension();
                    $article_image_path = $article_image ? $article_image->move('images/articles/', $article_image_name) : null;


                    $article_additional->article_id = $article_id;

                    $article_additional->article_img = $article_image_path;

                    $article_additional->save();




                }

            }
            $article_additional->article_video  = $video;
            $article_additional->img_360        = $img_360;
            $article_additional->article_id     = $article_id;

            if ($article_additional->save()) {

                $message = ["success", " Succesfully added adtitionals data for article:" . $article->article_name];
                return Response::json(['success' => true, 'message' => $message]);
            }
        }

        $html = View::make('moderator.modals.article-additional', ['article_id' => $article_id])->render();

        return Response::json(["html" => $html, "success" => $success]);
    }


    public function deleteArticle(Request $request) {

        $article = News::findOrFail($request->id);
        $article->delete();
        return redirect()->back()->with('message-error', $article->article_name . " is deleted");


    }



    public function deleteEvent(Request $request) {

        $event = Event::findOrFail($request->id);
        $event->delete();
        return redirect()->back()->with('message-error', $event->event_name . " is deleted");


    }
}
