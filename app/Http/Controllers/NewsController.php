<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
     public function index() {

        //return only approved
         return view ('news', ['news' => News::all()]);
     }
}
