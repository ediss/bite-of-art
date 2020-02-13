<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Artist;
use App\Models\Artwork;

use Response;
use View;

class EventController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }
    
    public function index() {

        $event = new Event();

        $events = $event::all();

        return view('index', [
            'events' => $events
        ]);
    }

    public function ajaxLoadEventData(Request $request) {

        $id     = $request->input('id');
        $slides = $request->input('slides');



        $event = new Event();

        $event_data = $event->where('id', $id)->first();

        $all = $event::where('id', '>=', $id)->get();

        $next = $event::where('id', '>', $id)->first();

        $html = View::make('inc.partial.event-opened',[
            'data'  => $event_data,
            'next'   => $next
        ])->render();

        return Response::json(["html" => $html]);

    }


    public function submitEvent(Request $request) {
        
        // dd($request->all());
        
        $event_name         = $request->input('event_name');
        $event_date         = explode(" - ", $request->input('daterange'));

        // dd($event_date);
        $event_cover        = $request->input('event_cover');
        $event_cover_desc   = $request->input('event_cover_description');
        $event_image_1      = $request->input('event_image_1');
        $event_image_2      = $request->input('event_image_2');
        $event_image_3      = $request->input('event_image_3');
        $event_image_1_desc = $request->input('event_image_1_desc');
        $event_image_2_desc = $request->input('event_image_2_desc');
        $event_image_3_desc = $request->input('event_image_3_desc');
        $event_media        = $request->input('event_media');
        $event_media_desc   = $request->input('event_media_description');
        $event_note         = $request->input('event_note');

        $gallerist_id       = 1; // id gallerist from auth


        //@todo find better solution, method is too big
        $eventObj = new Event;

        //uplouding event photos
        if ($request->hasFile('event_cover')) {
            $event_cover        = $request->file('event_cover');
            $event_cover_name   = 'cover_'.time().'.'.$event_cover->getClientOriginalExtension();
            $event_cover_path   = $event_cover ? $event_cover->move('images/galleries/', $event_cover_name) : null;

        }

        if ($request->hasFile('event_image_1')) {
            $event_image_1        = $request->file('event_image_1');
            $event_image_1_name   = 'image_1_'.time().'.'.$event_image_1->getClientOriginalExtension();
            $event_image_1_path   = $event_image_1 ? $event_image_1->move('images/galleries/', $event_image_1_name) : null;

        }
        if ($request->hasFile('event_image_2')) {
            $event_image_2        = $request->file('event_image_2');
            $event_image_2_name   = 'image_2_'.time().'.'.$event_image_2->getClientOriginalExtension();
            $event_image_2_path   = $event_image_2 ? $event_image_2->move('images/galleries/', $event_image_2_name) : null;

        }

        if ($request->hasFile('event_image_3')) {
            $event_image_3        = $request->file('event_image_3');
            $event_image_3_name   = 'image_3_'.time().'.'.$event_image_3->getClientOriginalExtension();
            $event_image_3_path   = $event_image_3 ? $event_image_3->move('images/galleries/', $event_image_3_name) : null;

        }

        //Inserting in DB
        $eventObj->event_name           = $event_name;
        $eventObj->event_open           = $event_date[0];
        $eventObj->event_closed         = $event_date[1];
        $eventObj->event_cover          = $event_cover_path;

        //get from gallery
        $eventObj->event_place          = "DORCOL!";

        $eventObj->event_description    = $event_cover_desc;
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
        $eventObj->nfc_tag              = 'null'; //GaleryName(prva tri slova)+GaleryId+EventName(prva tri slova)+EventID



        if($eventObj->save()) {
            $eventLastId = $eventObj->id;

            $nfc_tag = substr($eventObj->event_name, 0, 3).$eventLastId;
            

            Event::where('id', $eventLastId)->update(array('nfc_tag' => $nfc_tag));

        }

        

        $html = View::make('inc.partial.event-form.add-artist-form',[
            'event_id'  => $eventLastId,
            
        ])->render();

        return Response::json(["html" => $html]);
    }

    public function submitArtist(Request $request) {

        // dd($request->all());
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

        $gallerist_id        = 1; // id gallerist from auth
        $event_id            = $request->input('event_id');

        if ($request->hasFile('artist_cover')) {
            $artist_cover        = $request->file('artist_cover');
            $artist_cover_name   = time().'.'.$artist_cover->getClientOriginalExtension();
            $artist_cover_path   = $artist_cover ? $artist_cover->move('images/artists/', $artist_cover_name) : null;

        }

        if ($request->hasFile('artist_image_1')) {
            $artist_image_1        = $request->file('artist_image_1');
            $artist_image_1_name   = time().'.'.$artist_image_1->getClientOriginalExtension();
            $artist_image_1_path   = $artist_image_1 ? $artist_image_1->move('images/artists/', $artist_image_1_name) : null;

        }
        if ($request->hasFile('artist_image_2')) {
            $artist_image_2        = $request->file('artist_image_2');
            $artist_image_2_name   = time().'.'.$artist_image_2->getClientOriginalExtension();
            $artist_image_2_path   = $artist_image_2 ? $artist_image_2->move('images/artists/', $artist_image_2_name) : null;

        }

        if ($request->hasFile('artist_image_3')) {
            $artist_image_3        = $request->file('artist_image_3');
            $artist_image_3_name   = time().'.'.$artist_image_3->getClientOriginalExtension();
            $artist_image_3_path   = $artist_image_3 ? $artist_image_3->move('images/artists/', $artist_image_3_name) : null;

        }

        //insert artist into db
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



        $artistObj->save();
        $artistLastId = $artistObj->id;
        

        $html = View::make('inc.partial.event-form.add-artwork-form',[
            'artist_id'  => $artistLastId,
            
        ])->render();

        return Response::json(["html" => $html]);
    }

    public function submitArtwork(Request $request) {

        // dd($request->all());
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

        $gallerist_id        = 1; // id gallerist from auth
        $event_id            = $request->input('event_id');
        $artist_id           = $request->input('artist_id');

        


        if ($request->hasFile('artwork_cover')) {
            $artwork_cover        = $request->file('artwork_cover');
            $artwork_cover_name   = time().'.'.$artwork_cover->getClientOriginalExtension();
            $artwork_cover_path   = $artwork_cover ? $artwork_cover->move('images/artworks/', $artwork_cover_name) : null;

        }

        if ($request->hasFile('artwork_image_1')) {
            $artwork_image_1        = $request->file('artwork_image_1');
            $artwork_image_1_name   = time().'.'.$artwork_image_1->getClientOriginalExtension();
            $artwork_image_1_path   = $artwork_image_1 ? $artwork_image_1->move('images/artworks/', $artwork_image_1_name) : null;

        }
        if ($request->hasFile('artwork_image_2')) {
            $artwork_image_2        = $request->file('artwork_image_2');
            $artwork_image_2_name   = time().'.'.$artwork_image_2->getClientOriginalExtension();
            $artwork_image_2_path   = $artwork_image_2 ? $artwork_image_2->move('images/artworks/', $artwork_image_2_name) : null;

        }

        if ($request->hasFile('artwork_image_3')) {
            $artwork_image_3        = $request->file('artwork_image_3');
            $artwork_image_3_name   = time().'.'.$artwork_image_3->getClientOriginalExtension();
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
        $artworkObj->nfc_tag                = 'nfc_tag';



        $artworkObj->save();
        // $artworkLastId = $artworkObj->id;
        

        // $html = View::make('inc.partial.event-form.add-artwork-form',[
        //     'artist_id'  => $artworkLastId,
            
        // ])->render();

        return Response::json(["html" => $artist_id]);

    }

    public function ajaxTest(Request $request) {
        // $artists = json_decode($request->input('artists'));
         $artists = $request->input('artists');

        // dd($request->all());
        dd($artists);
        // dd($artists['artist_name']);
        // dd($artists['artwork']);


        //event data
        $event_name         = $request->input('event_name');
        $event_date         = explode(" - ", $request->input('daterange'));
        $event_cover        = $request->input('event_cover');
        $event_cover_desc   = $request->input('event_cover_description');
        $event_image_1      = $request->input('event_image_1');
        $event_image_2      = $request->input('event_image_2');
        $event_image_3      = $request->input('event_image_3');
        $event_image_1_desc = $request->input('event_image_1_desc');
        $event_image_2_desc = $request->input('event_image_2_desc');
        $event_image_3_desc = $request->input('event_image_3_desc');
        $event_media        = $request->input('event_media');
        $event_media_desc   = $request->input('event_media_desc');
        $event_note         = $request->input('event_note');

        $gallerist_id       = 1; // id gallerist from auth
        $nfc_tag            = "tag"; //GaleryName(prva tri slova)+GaleryId+EventName(prva tri slova)+EventID


        //@todo find better solution, method is too big
        $eventObj = new Event;

        //uplouding event photos
        if ($request->hasFile('event_cover')) {
            $event_cover        = $request->file('event_cover');
            $event_cover_name   = time().'.'.$event_cover->getClientOriginalExtension();
            $event_cover_path   = $event_cover ? $event_cover->move('images/galleries/', $event_cover_name) : null;

        }

        if ($request->hasFile('event_image_1')) {
            $event_image_1        = $request->file('event_image_1');
            $event_image_1_name   = time().'.'.$event_image_1->getClientOriginalExtension();
            $event_image_1_path   = $event_image_1 ? $event_image_1->move('images/galleries/', $event_image_1_name) : null;

        }
        if ($request->hasFile('event_image_2')) {
            $event_image_2        = $request->file('event_image_2');
            $event_image_2_name   = time().'.'.$event_image_2->getClientOriginalExtension();
            $event_image_2_path   = $event_image_2 ? $event_image_2->move('images/galleries/', $event_image_2_name) : null;

        }

        if ($request->hasFile('event_image_3')) {
            $event_image_3        = $request->file('event_image_3');
            $event_image_3_name   = time().'.'.$event_image_3->getClientOriginalExtension();
            $event_image_3_path   = $event_image_3 ? $event_image_3->move('images/galleries/', $event_image_3_name) : null;

        }

        //Inserting in DB
        $eventObj->event_name           = $event_name;
        $eventObj->event_open           = $event_date[0];
        $eventObj->event_closed         = $event_date[1];
        $eventObj->event_cover          = $event_cover_path;

        //get from gallery
        $eventObj->event_place          = "DORCOL!";

        $eventObj->event_description    = $event_cover_desc;
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
        $eventObj->nfc_tag              = $nfc_tag;



        $eventObj->save();
        $eventLastId = $eventObj->id;



        //artist data
        if(!empty($artists)) {
            foreach($artists as $artist) {
                //dd($artist);
                $artist_name         = $artist->artist_name;
                // $artist_cover        = $artist->artist_cover;
                $artist_about        = $artist->artist_about;
                $artist_image_1      = $artist->artist_image_1;
                $artist_image_2      = $artist->artist_image_2;
                $artist_image_3      = $artist->artist_image_3;
                $artist_image_1_desc = $artist->artist_image_1_desc;
                $artist_image_2_desc = $artist->artist_image_2_desc;
                $artist_image_3_desc = $artist->artist_image_3_desc;
                $artist_media        = $artist->artist_media;
                $artist_media_desc   = $artist->artist_media_desc;
                $artist_note         = $artist->artist_note;

                $event_id            = $eventLastId;
                $nfc_tag             = "artist_tag";

                //uplouding artist photos
                if ($request->hasFile('artist_cover')) {
                    $artist_cover        = $request->file('artist_cover');
                    $artist_cover_name   = time().'.'.$artist_cover->getClientOriginalExtension();
                    $artist_cover_path   = $artist_cover ? $artist_cover->move('images/artists/', $artist_cover_name) : null;

                }

                if ($request->hasFile('artist_image_1')) {
                    $artist_image_1        = $request->file('artist_image_1');
                    $artist_image_1_name   = time().'.'.$artist_image_1->getClientOriginalExtension();
                    $artist_image_1_path   = $artist_image_1 ? $artist_image_1->move('images/artists/', $artist_image_1_name) : null;

                }
                if ($request->hasFile('artist_image_2')) {
                    $artist_image_2        = $request->file('artist_image_2');
                    $artist_image_2_name   = time().'.'.$artist_image_2->getClientOriginalExtension();
                    $artist_image_2_path   = $artist_image_2 ? $artist_image_2->move('images/artists/', $artist_image_2_name) : null;

                }

                if ($request->hasFile('artist_image_3')) {
                    $artist_image_3        = $request->file('artist_image_3');
                    $artist_image_3_name   = time().'.'.$artist_image_3->getClientOriginalExtension();
                    $artist_image_3_path   = $artist_image_3 ? $artist_image_3->move('images/artists/', $artist_image_3_name) : null;

                }

                //insert artist into db
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
                $artistObj->nfc_tag               = $nfc_tag;



                $artistObj->save();
                $artistLastId = $artistObj->id;


                
                // //getting artworks data
                // if(!empty($artist->arworls)) {
                //     foreach($artist->artwork as $artwork) {

                //         $artwork_name         = $artwork->artwork_name;
                //         $artwork_cover        = $artwork->artwork_cover;
                //         //dd($artwork_cover);

                //         $artwork_cover_desc   = $artwork->artwork_cover_desc;
                //         $artwork_image_1      = $artwork->artwork_image_1;
                //         $artwork_image_2      = $artwork->artwork_image_2;
                //         $artwork_image_3      = $artwork->artwork_image_3;
                //         $artwork_image_1_desc = $artwork->artwork_image_1_desc;
                //         $artwork_image_2_desc = $artwork->artwork_image_2_desc;
                //         $artwork_image_3_desc = $artwork->artwork_image_3_desc;
                //         $artwork_media        = $artwork->artwork_media;
                //         $artwork_media_desc   = $artwork->artwork_media_desc;
                //         $artwork_note         = $artwork->artwork_note;
                //         $artist_id            = $artistLastId;
                //         $event_id             = $event_id;
                //         $nfc_tag              = "tag"; //event_nfc_tag+artwork(prva tri slova)+artworkID
    
                //     //uplouding artworks photos
                //     if ($request->hasFile('artwork_cover')) {
    
                //         dd('ima');
                //         $artwork_cover        = $request->file('artwork_cover');
                //         $artwork_cover_name   = time().'.'.$artwork_cover->getClientOriginalExtension();
                //         $artwork_cover_path   = $artwork_cover ? $artwork_cover->move('images/artworks/', $artwork_cover_name) : null;
    
                //     }else {
                //         dd('nema');
                //     }
    
                //     if ($request->hasFile('artwork_image_1')) {
                //         $artwork_image_1        = $request->file('artwork_image_1');
                //         $artwork_image_1_name   = time().'.'.$artwork_image_1->getClientOriginalExtension();
                //         $artwork_image_1_path   = $artwork_image_1 ? $artwork_image_1->move('images/artworks/', $artwork_image_1_name) : null;
    
                //     }
                //     if ($request->hasFile('artwork_image_2')) {
                //         $artwork_image_2        = $request->file('artwork_image_2');
                //         $artwork_image_2_name   = time().'.'.$artwork_image_2->getClientOriginalExtension();
                //         $artwork_image_2_path   = $artwork_image_2 ? $artwork_image_2->move('images/artworks/', $artwork_image_2_name) : null;
    
                //     }
    
                //     if ($request->hasFile('artwork_image_3')) {
                //         $artwork_image_3        = $request->file('artwork_image_3');
                //         $artwork_image_3_name   = time().'.'.$artwork_image_3->getClientOriginalExtension();
                //         $artwork_image_3_path   = $artwork_image_3 ? $artwork_image_3->move('images/artworks/', $artwork_image_3_name) : null;
    
                //     }
    
                //      //insert artist into db
                //      $artworkObj = new Artwork;
    
                //      $artworkObj->artwork_name           = $artwork_name;
                //      $artworkObj->artwork_cover          = $artwork_cover_path;
     
                //      $artworkObj->artwork_about          = $artwork_about;
                //      $artworkObj->artwork_img_1          = (isset($artwork_image_1_path)) ? $artwork_image_1_path : null;
                //      $artworkObj->artwork_img_2          = (isset($artwork_image_2_path)) ? $artwork_image_2_path : null;
                //      $artworkObj->artwork_img_3          = (isset($artwork_image_3_path)) ? $artwork_image_3_path : null;
                //      $artworkObj->artwork_img_1_desc     = $artwork_image_1_desc;
                //      $artworkObj->artwork_img_2_desc     = $artwork_image_2_desc;
                //      $artworkObj->artwork_img_3_desc     = $artwork_image_3_desc;
                //      $artworkObj->artwork_media          = $artwork_media;
                //      $artworkObj->artwork_media_desc     = $artwork_media_desc;
                //      $artworkObj->artwork_note           = $artist_note;
                //      $artworkObj->event_id               = $event_id;
                //      $artworkObj->artist_id              = $artist_id;
                //      $artworkObj->nfc_tag                = $nfc_tag;
     
     
     
                //      $artworkObj->save();
    
    
                //     }
                // }
           

            }
        }
    }
}