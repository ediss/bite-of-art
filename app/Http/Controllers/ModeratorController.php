<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Event;
use Response;
use View;


class ModeratorController extends Controller
{
    //@todo make middleware for moderator
    public function __construct()
    {
        $this->middleware('moderator');
    }

    public function index() {
        return view('layout.dashboard');
    }

    public function getGallerists() {
        $gallerists = new User;

        $data = $gallerists->where('role_id', '2')->get();

        $html = View::make('inc.partial.dashboard.tables.gallerists-table',[
            'gallerists'  => $data,
        ])->render();

        return Response::json(["html" => $html]);
    }

    public function updateGallerist(Request $request) {

        $gallerist = User::find($request->id);

        if($request->approved == "true") {
            $gallerist->approved = 1;

            if($gallerist->save()) {
                $message = ["success", $gallerist->name. " is approved"];
                return Response::json(["message" => $message]);
            }else{
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
            
        }elseif($request->approved == "false") {
            $gallerist->approved = 0;
            if($gallerist->save()) {
                $message = ["success", $gallerist->name. " is unapproved"];
                return Response::json(["message" => $message]);
            }else {
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
        }

    }

    public function getEvents() {
        $events = new Event;

        $data = $events->all();

        $html = View::make('inc.partial.dashboard.tables.events-table',[
            'events'  => $data,
        ])->render();

        return Response::json(["html" => $html]);
    }

    public function approveEvent(Request $request) {
        $event = Event::find($request->id);

        if($request->approved == "true") {
            $event->approved = 1;

            if($event->save()) {
                $message = ["success", $event->event_name. " is approved"];
                return Response::json(["message" => $message]);
            }
            else {
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
        }elseif($request->approved == "false") {
            $event->approved = 0;
            if($event->save()) {
                $message = ["success", $event->event_name. " is unapproved"];
                return Response::json(["message" => $message]);
            }
            else {
                $message = ["error", "Something went wrong"];
                return Response::json(["message" => $message]);
            }
        }
    }

    public function updateEvent(Request $request, $event_id) {
        $success = null;
        $validator = null;
        $event = Event::find($event_id);

        // if ($request->isMethod('post')) {
        //     $validator = Validator::make($request->all(), [
        //         "new_consultation"  => "required",
        //         "new_profession"    => "max:60"
        //     ],
        //     [

        //         "new_consultation.required" => "Polje 'Konsultacija: ' ne sme biti prazno",
        //         "new_profession.max"        => "Maksimum broj karaktera koji mozete da uneste za zanimanje je: 60",
        //     ]);

        //     if ($validator->passes()){

        //         $patient = Patient::find($patient_id);

        //         $patient->address            = $request->input('new_address');
        //         $patient->phone              = $request->input('new_phone');
        //         $patient->skype_name         = $request->input('new_skype');
        //         $patient->profession         = $request->input('new_profession');
        //         $patient->diagnosis          = $request->input('new_patient_diagnosis');
        //         $patient->therapy            = $request->input('new_patient_therapy');
        //         $patient->consultation       = $request->input('new_consultation');


        //         if($patient->save()) {
        //             Session::flash('success', 'Uspesno ste izmenili podatke o pacijentu ');
        //             $success = true;
        //         }
        //     }
        // }

        $html = View::make('moderator.modals.update-event', [

            'event' => $event,
            'validator' => $validator
        ])->render();

        return Response::json( ["html"=>$html, "success" => $success]);

    }
}
