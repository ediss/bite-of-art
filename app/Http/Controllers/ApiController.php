<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Artist;
use App\Models\Artwork;
use Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ApiController extends Controller
{
    public function getEvents(Request $request) {

        if($request->nfc) {
            $response = Event::where('nfc_tag','=', $request->nfc)->get();
            if($response->count()==0) {
                $response="No events data with '$request->nfc' tag";
            }
        }elseif($request->event_closed){

            $now = Carbon::now();     

            $response = (DB::select("select * from events where event_closed >= '$now' order by event_open "));

            if(!$response) {
                $response="No events data where event closed: '$request->event_closed'";
            }
        }else {
            $response = Event::all();
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
}
