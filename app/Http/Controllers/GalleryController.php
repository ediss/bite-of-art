<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

use Response;
use View;

class GalleryController extends Controller
{


    // public function __construct() {
    //     $this->middleware('auth');
    // }
    public function getGalleries() {

        $gallery = new Gallery();

        $galleries = $gallery::all();

        return view('index', [
            'galleries' => $galleries
        ]);
    }



    public function test() {
        return view('test');
    }



}
