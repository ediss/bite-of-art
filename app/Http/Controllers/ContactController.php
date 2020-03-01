<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request) {
            //if method is post get data and send mail

            return view('contact');
    } 
}
