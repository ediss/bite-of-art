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
}
