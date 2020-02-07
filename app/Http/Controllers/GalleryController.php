<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

use Response;
use View;

class GalleryController extends Controller
{
    public function getGalleries() {

        $gallery = new Gallery();

        $galleries = $gallery::all();

        return view('index', [
            'galleries' => $galleries
        ]);
    }

    public function ajax(Request $request) {

        $id     = $request->input('id');
        $slides = $request->input('slides');
        
        $gallery = new Gallery();

        $gallery_data = $gallery->where('id', $id)->first();

        $all = $gallery::where('id', '>=', $id)->get();

        $next = $gallery::where('id', '>', $id)->first();

        $html = View::make('inc.partial.gallery-opened',[
            'data'  => $gallery_data,
            'next'   => $next
        ])->render();

        return Response::json(["html" => $html]);

    }

    public function test() {
        return view('test');
    }


    public function ajaxTest(Request $request) {
        
        $event      = $request->input('event');
        $artists    = $request->input('artists');

        //event data
        $event_name         = $event['event_name'];
        $event_date         = $event['event_date'];
        $event_cover        = $event['event_cover'];
        $event_cover_desc   = $event['event_cover_desc'];
        $event_image_1      = $event['event_image_1'];
        $event_image_2      = $event['event_image_2'];
        $event_image_3      = $event['event_image_3'];
        $event_image_1_desc = $event['event_image_1_desc'];
        $event_image_2_desc = $event['event_image_2_desc'];
        $event_image_3_desc = $event['event_image_3_desc'];
        $event_media        = $event['event_media'];
        $event_media_desc   = $event['event_media_desc'];
        $event_note         = $event['event_note'];

        $gallerist_id       = 1; // id gallerist from auth
        $nfc_tag            = "tag"; //GaleryName(prva tri slova)+GaleryId+EventName(prva tri slova)+EventID

        //artist data
        foreach($artists as $artist) {
            $artist_name         = $artist['artist_name'];
            $artist_cover        = $artist['artist_cover'];
            $artist_cover_desc   = $artist['artist_cover_desc'];
            $artist_image_1      = $artist['artist_image_1'];
            $artist_image_2      = $artist['artist_image_2'];
            $artist_image_3      = $artist['artist_image_3'];
            $artist_image_1_desc = $artist['artist_image_1_desc'];
            $artist_image_2_desc = $artist['artist_image_2_desc'];
            $artist_image_3_desc = $artist['artist_image_3_desc'];
            $artist_media        = $artist['artist_media'];
            $artist_media_desc   = $artist['artist_media_desc'];
            $artist_note         = $artist['artist_note'];

            //insert into db
            //get artist id

            //dd($artist['artwork']);

            //getting artworks data
            foreach($artist['artwork'] as $artwork) {
                $artwork_name = $artwork['artwork_name'];
                $artwork_cover        = $artwork['artwork_cover'];
                $artwork_cover_desc   = $artwork['artwork_cover_desc'];
                $artwork_image_1      = $artwork['artwork_image_1'];
                $artwork_image_2      = $artwork['artwork_image_2'];
                $artwork_image_3      = $artwork['artwork_image_3'];
                $artwork_image_1_desc = $artwork['artwork_image_1_desc'];
                $artwork_image_2_desc = $artwork['artwork_image_2_desc'];
                $artwork_image_3_desc = $artwork['artwork_image_3_desc'];
                $artwork_media        = $artwork['artwork_media'];
                $artwork_media_desc   = $artwork['artwork_media_desc'];
                $artwork_note         = $artwork['artwork_note'];

                //$artist_id = $artist_id;(above)

                $gallerist_id       = 1; // id gallerist from auth
                $nfc_tag            = "tag"; //event_nfc_tag+artwork(prva tri slova)+artworkID
                
            }
    
        }
        
        
        

        

        
    }
}
