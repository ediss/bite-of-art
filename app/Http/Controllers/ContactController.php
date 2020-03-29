<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

class ContactController extends Controller
{
    public function index(Request $request) {
            //if method is post get data and send mail
            if ($request->isMethod('post')) {

                $name           = $request->input('name');

                $email          = $request->input('email');
                $subject        = "naslov";
                $msg            = $request->input('message');


                    $data = [
                        'name'          => $name,
                        'email'         => $email,
                        'subject'       => $subject,
                        'msg'           => $msg
                    ];

                    Mail::send(['text'=>'mail'], $data, function($message) use ($data) {
                        $message->to('biteofart.dev@gmail.com', 'BiteOfArt')->subject ($data['subject'])->replyTo($data['email']);
                        $message->from($data['email'], $data['name'] );
                    });

                    Session::flash('success', "$name,  your message was successfully sent!");
                    return redirect()->back();


            }
            return view('contact');
    }
}
