<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Artist;
use App\Models\Artwork;
use App\Models\News;
use App\Models\ArticleAdditionals;
use Mail;
use Validator;
use Response;
use View;
use Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function test() {
        return view('test', ['validator'=>false]);
    }

    public function index() {

        $event = new Event();

        $today = date('Y-m-d');

        $event_in_past = $event::where('approved', '=', 1)
        ->where('event_open', '<', $today)->orderBy('event_open', 'desc')->first();

        $events_in_past = $event::where('approved', '=', 1)
        ->where('event_open', '<', $today)->orderBy('event_open', 'desc')->get();

        $feature_events = $event::where('approved', '=', 1)
        ->where('event_open', '>=', $today)->orderBy('event_open', 'asc')->get();

        
        $news = News::where('approved', '=', 1)->orderBy('article_open', 'desc')->get();


        return view('index', [
            'event_in_past'  => $event_in_past,
            'events_in_past' => $events_in_past,
            'feature_events' => $feature_events,
            'news'           => $news
        ]);
    }

    public function allEvents() {
        $event = new Event();

        $today = date('Y-m-d H:m:s');

        $event_in_past = $event::where('approved', '=', 1)
        ->where('event_open', '<', $today)->orderBy('event_open', 'desc')->first();

        $events_in_past = $event::where('approved', '=', 1)
        ->where('event_open', '<', $today)->orderBy('event_open', 'desc')->get();

        $feature_events = $event::where('approved', '=', 1)
        ->where('event_open', '>=', $today)->orderBy('event_open', 'desc')->get();

        return view('all-events', [
            'event_in_past'  => $event_in_past,
            'events_in_past' => $events_in_past,
            'feature_events' => $feature_events,
        ]);

    }

    public function getArticle(Request $request) {

        $articles = new News();
        $id = $request->id;
        $articles_additionals = new ArticleAdditionals();
        $article = $articles->where('id', '=', $id)->first();



        $article_additionals = $articles_additionals->where('article_id', '=', $request->id)->get();
        return view ('news.article', [
            'article'       => $article,
            'additionals'   => $article_additionals,
            'url_id'        => $id
            ]);


    }


    public function ajaxLoadEventData(Request $request) {

        $id    = $request->id;
        
        $event = Event::find($id);

        $event_open = $event->event_open;

        //$event_data = $event->where('id', $id)->first();

        $next = $event::where('event_open', '>', $event_open)->where('approved', '=', 1)->first();

        return view('event-opened',[
            'data'=> $event,
            'next' => $next,
            'url_id' => $id
        ]);

        

        // $html = View::make('inc.partial.event-opened',[
        //     'data'  => $event_data,
        //     'next'   => $next
        // ])->render();

        // return Response::json(["html" => $html]);

    }


    public function submitEvent(Request $request) {

        //@todo find better solution, method is too big

        $validator = null;
        if ($request->isMethod('post')) {
            
            //dd($request->all());

            //dd(explode(" ", $request->input('daterange')));
            $validator = Validator::make($request->all(), [
                "event_name"                => "required",
                "event_cover"               => "required",
                "daterange"                 => "required",
                "desc"                      => "required",
            ],
            [
                "event_name.required"               => "Field 'Event Name ' can't be empty",
                "daterange.required"                => "Please choose date",
                "desc.required"                     => "Field 'About Event ' can't be empty",
                "event_cover.required"              => "Choose photo",



            ]);

            if ($validator->passes()){
                $event_name         = $request->input('event_name');
                $event_date         = explode(" - ", $request->input('daterange'));
                $event_cover        = $request->input('event_cover');
                //tynimce
                $event_cover_desc   = $request->desc;
                $event_image_1      = $request->input('event_image_1');
                $event_image_2      = $request->input('event_image_2');
                $event_image_3      = $request->input('event_image_3');
                $event_image_1_desc = $request->input('event_image_1_desc');
                $event_image_2_desc = $request->input('event_image_2_desc');
                $event_image_3_desc = $request->input('event_image_3_desc');
                $event_media        = $request->input('event_media');
                $event_media_desc   = $request->input('event_media_description');
                $event_note         = $request->input('event_note');

                $gallerist_id       = Auth::user()->id;

                $eventObj = new Event;


                //uplouding event photos
                if ($request->hasFile('event_cover')) {
                    $event_cover        = $request->file('event_cover');
                    $event_cover_name   = 'cover_'.time().'.'.$event_cover->getClientOriginalExtension();
                    $event_cover_path   = $event_cover ? $event_cover->move('images/events/', $event_cover_name) : null;

                }

                if ($request->hasFile('event_image_1')) {
                    $event_image_1        = $request->file('event_image_1');
                    $event_image_1_name   = 'image_1_'.time().'.'.$event_image_1->getClientOriginalExtension();
                    $event_image_1_path   = $event_image_1 ? $event_image_1->move('images/events/', $event_image_1_name) : null;

                }
                if ($request->hasFile('event_image_2')) {
                    $event_image_2        = $request->file('event_image_2');
                    $event_image_2_name   = 'image_2_'.time().'.'.$event_image_2->getClientOriginalExtension();
                    $event_image_2_path   = $event_image_2 ? $event_image_2->move('images/events/', $event_image_2_name) : null;

                }

                if ($request->hasFile('event_image_3')) {
                    $event_image_3        = $request->file('event_image_3');
                    $event_image_3_name   = 'image_3_'.time().'.'.$event_image_3->getClientOriginalExtension();
                    $event_image_3_path   = $event_image_3 ? $event_image_3->move('images/events/', $event_image_3_name) : null;

                }

                //Inserting in DB
                $eventObj->event_name           = $event_name;
                $eventObj->event_open           = $event_date[0];
                $eventObj->event_closed         = $event_date[1];
                $eventObj->event_cover          = $event_cover_path;

                //get from gallery
                $eventObj->event_place          = Auth::user()->city_country;

                $eventObj->event_description_en    = $event_cover_desc.'~';
                $eventObj->event_img_1          = (isset($event_image_1_path)) ? $event_image_1_path : null;
                $eventObj->event_img_2          = (isset($event_image_2_path)) ? $event_image_2_path : null;
                $eventObj->event_img_3          = (isset($event_image_3_path)) ? $event_image_3_path : null;
                $eventObj->event_img_1_desc     = $event_image_1_desc;
                $eventObj->event_img_2_desc     = $event_image_2_desc;
                $eventObj->event_img_3_desc     = $event_image_3_desc;
                $eventObj->event_media          = $event_media;
                $eventObj->event_media_desc     = $event_media_desc;
                $eventObj->event_note           = $event_note;
                $eventObj->gallerist_id         = $gallerist_id;
                $eventObj->nfc_tag              = 'null';



                if($eventObj->save()) {
                    $message = ["success", $event_name. " is saved"];
                    $eventLastId = $eventObj->id;

                    $data = [
                        'subject' => 'New Event Opened!',
                        'user' => Auth::user()->name,
                        'event_name' => $eventObj->event_name
                    ];
                    Mail::send(['text'=>'mails.event-opened'], $data, function($mail) use ($data) {
                        $mail->to('biteofart.dev@gmail.com', 'BiteOfArt2')->subject ($data['subject']);
                        $mail->from('biteofart.dev@gmail.com', 'Gallerist '.$data['user']. ' opened a event' );
                    });

                    $nfc_tag = substr(Auth::user()->gallery_name, 0, 3).Auth::user()->id.substr($eventObj->event_name, 0, 3).$eventLastId;


                    Event::where('id', $eventLastId)->update(array('nfc_tag' => $nfc_tag));

                    $html = View::make('inc.partial.event-form.add-artist-form',[
                        'event_id'  => $eventLastId,
                        'validator' => $validator

                    ])->render();

                    return Response::json(["html" => $html, 'success' => true, 'message' => $message]);

                }else {
                    $message = ["error", "OOps! Something went wrong!"];
                    return Response::json(["message" => $message]);
                }

            }
            $html = View::make('inc.partial.event-form.add-event-form', [
                'validator'=>$validator
            ])->render();

            return Response::json(["html" => $html, 'success' => false]);
        }

        return view('gallerist.add-new-event', ['validator' => $validator]);


    }




    public function submitArtist(Request $request) {

        $validator = null;
        $event_id  = $request->input('event_id');
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                "artist_name"   => "required",
                "artist_cover"  => "required",
                "artist_about"  => "required",
            ],
            [
                "artist_name.required"  => "Field 'Artist Name ' can't be empty",
                "artist_about.required" => "Field 'About artist ' can't be empty",
                "artist_cover.required" => "Choose photo",
            ]);

            if ($validator->passes()){
                $artist_name         = $request->input('artist_name');
                $artist_cover        = $request->input('artist_cover');
                $artist_about        = $request->input('artist_about');
                $artist_image_1      = $request->input('artist_image_1');
                $artist_image_2      = $request->input('artist_image_2');
                $artist_image_3      = $request->input('artist_image_3');
                $artist_image_1_desc = $request->input('artist_image_1_desc');
                $artist_image_2_desc = $request->input('artist_image_2_desc');
                $artist_image_3_desc = $request->input('artist_image_3_desc');
                $artist_media        = $request->input('artist_media');
                $artist_media_desc   = $request->input('artist_media_desc');
                $artist_note         = $request->input('artist_note');

                if ($request->hasFile('artist_cover')) {
                    $artist_cover        = $request->file('artist_cover');
                    $artist_cover_name   = 'cover_'.time().'.'.$artist_cover->getClientOriginalExtension();
                    $artist_cover_path   = $artist_cover ? $artist_cover->move('images/artists/', $artist_cover_name) : null;

                }

                if ($request->hasFile('artist_image_1')) {
                    $artist_image_1        = $request->file('artist_image_1');
                    $artist_image_1_name   = 'artist_1_'.time().'.'.$artist_image_1->getClientOriginalExtension();
                    $artist_image_1_path   = $artist_image_1 ? $artist_image_1->move('images/artists/', $artist_image_1_name) : null;

                }
                if ($request->hasFile('artist_image_2')) {
                    $artist_image_2        = $request->file('artist_image_2');
                    $artist_image_2_name   = 'artist_2_'.time().'.'.$artist_image_2->getClientOriginalExtension();
                    $artist_image_2_path   = $artist_image_2 ? $artist_image_2->move('images/artists/', $artist_image_2_name) : null;

                }

                if ($request->hasFile('artist_image_3')) {
                    $artist_image_3        = $request->file('artist_image_3');
                    $artist_image_3_name   = 'artist_3_'.time().'.'.$artist_image_3->getClientOriginalExtension();
                    $artist_image_3_path   = $artist_image_3 ? $artist_image_3->move('images/artists/', $artist_image_3_name) : null;

                }

                $artistObj = new Artist;

                $artistObj->artist_name           = $artist_name;
                $artistObj->artist_cover          = $artist_cover_path;

                $artistObj->artist_about          = $artist_about;
                $artistObj->artist_img_1          = (isset($artist_image_1_path)) ? $artist_image_1_path : null;
                $artistObj->artist_img_2          = (isset($artist_image_2_path)) ? $artist_image_2_path : null;
                $artistObj->artist_img_3          = (isset($artist_image_3_path)) ? $artist_image_3_path : null;
                $artistObj->artist_img_1_desc     = $artist_image_1_desc;
                $artistObj->artist_img_2_desc     = $artist_image_2_desc;
                $artistObj->artist_img_3_desc     = $artist_image_3_desc;
                $artistObj->artist_media          = $artist_media;
                $artistObj->artist_media_desc     = $artist_media_desc;
                $artistObj->artist_note           = $artist_note;
                $artistObj->event_id              = $event_id;
                $artistObj->nfc_tag               = 'nfc_tag';
                $artistObj->gallerist_id          = Auth::user()->id;



                if($artistObj->save()) {
                    $artistLastId = $artistObj->id;


                    $html = View::make('inc.partial.event-form.add-artwork-form',[
                        'artist_id'  => $artistLastId,
                        'event_id'   => $event_id,
                        'validator'  => $validator

                    ])->render();
                    $message = ["success", $artist_name. " is saved"];

                    return Response::json(["html" => $html, 'success' => true, 'message' => $message]);
                }else {
                    $message = ["error", "OOps! Something went wrong!"];
                    return Response::json(["message" => $message]);
                }


            }
            $html = View::make('inc.partial.event-form.add-artist-form', [
                'validator'=>$validator,
                'event_id'   => $event_id,
            ])->render();

            return Response::json(["html" => $html, 'success' => false]);
        }

    }

    public function submitArtwork(Request $request) {
        $event_id            = $request->input('event_artwork_id');
        $artist_id           = $request->input('artist_id');
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                "artwork_name"               => "required",
                "artwork_cover"              => "required",
                "artwork_cover_description"  => "required",
            ],
            [
                "artwork_name.required"              => "Field 'Artwork Name ' can't be empty",
                "artwork_cover.required"              => "Choose photo",
                "artwork_cover_description.required" => "Field 'About Artwork ' can't be empty",
            ]);

            if ($validator->passes()){
                $artwork_name         = $request->input('artwork_name');
                $artwork_cover        = $request->input('artwork_cover');
                $artwork_about        = $request->input('artwork_cover_description');
                $artwork_image_1      = $request->input('artwork_image_1');
                $artwork_image_2      = $request->input('artwork_image_2');
                $artwork_image_3      = $request->input('artwork_image_3');
                $artwork_image_1_desc = $request->input('artwork_image_1_desc');
                $artwork_image_2_desc = $request->input('artwork_image_2_desc');
                $artwork_image_3_desc = $request->input('artwork_image_3_desc');
                $artwork_media        = $request->input('artwork_media');
                $artwork_media_desc   = $request->input('artwork_media_desc');
                $artwork_note         = $request->input('artwork_note');


                if ($request->hasFile('artwork_cover')) {
                    $artwork_cover        = $request->file('artwork_cover');
                    $artwork_cover_name   = 'cover_'.time().'.'.$artwork_cover->getClientOriginalExtension();
                    $artwork_cover_path   = $artwork_cover ? $artwork_cover->move('images/artworks/', $artwork_cover_name) : null;

                }

                if ($request->hasFile('artwork_image_1')) {
                    $artwork_image_1        = $request->file('artwork_image_1');
                    $artwork_image_1_name   = 'artwork_1_'.time().'.'.$artwork_image_1->getClientOriginalExtension();
                    $artwork_image_1_path   = $artwork_image_1 ? $artwork_image_1->move('images/artworks/', $artwork_image_1_name) : null;

                }
                if ($request->hasFile('artwork_image_2')) {
                    $artwork_image_2        = $request->file('artwork_image_2');
                    $artwork_image_2_name   = 'artwork_2_'.time().'.'.$artwork_image_2->getClientOriginalExtension();
                    $artwork_image_2_path   = $artwork_image_2 ? $artwork_image_2->move('images/artworks/', $artwork_image_2_name) : null;

                }

                if ($request->hasFile('artwork_image_3')) {
                    $artwork_image_3        = $request->file('artwork_image_3');
                    $artwork_image_3_name   = 'artwork_3_'.time().'.'.$artwork_image_3->getClientOriginalExtension();
                    $artwork_image_3_path   = $artwork_image_3 ? $artwork_image_3->move('images/artworks/', $artwork_image_3_name) : null;

                }

                 //insert artwork into db
                $artworkObj = new Artwork;

                $artworkObj->artwork_name           = $artwork_name;
                $artworkObj->artwork_cover          = $artwork_cover_path;

                $artworkObj->artwork_about          = $artwork_about;
                $artworkObj->artwork_img_1          = (isset($artwork_image_1_path)) ? $artwork_image_1_path : null;
                $artworkObj->artwork_img_2          = (isset($artwork_image_2_path)) ? $artwork_image_2_path : null;
                $artworkObj->artwork_img_3          = (isset($artwork_image_3_path)) ? $artwork_image_3_path : null;
                $artworkObj->artwork_img_1_desc     = $artwork_image_1_desc;
                $artworkObj->artwork_img_2_desc     = $artwork_image_2_desc;
                $artworkObj->artwork_img_3_desc     = $artwork_image_3_desc;
                $artworkObj->artwork_media          = $artwork_media;
                $artworkObj->artwork_media_desc     = $artwork_media_desc;
                $artworkObj->artwork_note           = $artwork_note;
                $artworkObj->event_id               = $event_id;
                $artworkObj->artist_id              = $artist_id;
                $artworkObj->nfc_tag                = 'nfc_tag';//event_nfc_tag+artwork(prva tri slova)+artworkID

                if($artworkObj->save()) {

                    $event_tag = Event::find($event_id);

                    $artwork_nfc_tag = $event_tag->nfc_tag.substr($artwork_name, 0, 3).$artworkObj->id;


                    Artwork::where('id', $artworkObj->id)->update(array('nfc_tag' => $artwork_nfc_tag));

                    $message = ["success", $artwork_name. " is saved"];
                    return Response::json(["result" => $artist_id, 'success' => true, 'message' => $message]);
                }
                else {
                    $message = ["error", "OOps! Something went wrong!"];
                    return Response::json(["message" => $message]);

                }

            }

            $html = View::make('inc.partial.event-form.add-artwork-form', [
                'validator'  =>$validator,
                'event_id'   => $event_id,
                'artist_id'  => $artist_id,
            ])->render();

            return Response::json(["html" => $html, 'success' => false]);
        }

    }

}
