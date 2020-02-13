<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Artist;
use App\Models\Artwork;
use Response;


class ApiController extends Controller
{
    public function getEvents() {
        $data = Event::all();

        // return response()->json($data);
        return Response::json($data, 200, [], JSON_PRETTY_PRINT);
    }

    public function getArtists() {
        $data = Artist::all();

        return response()->json($data);
    }

    public function getArtworks() {
        $data = Artwork::all();

        return response()->json($data);
    }
}
