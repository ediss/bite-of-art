<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Event;
use Response;
use View;
use Validator;



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

    public function updateEvent(Request $request) {
        $success = null;
        $validator = null;
        $event_id = $request->id;
        
        $event = Event::find($event_id);

        

        $validator = null;
        if ($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                "new_event_description"   => "required",
                "new_event_name"          => "required",
            ],
            [
                
                
                "new_event_description.required"  => "Field 'Event Description ' can't be empty",
                "new_event_name.required"         => "Field 'Name ' can't be empty",



            ]);

            if ($validator->passes()){
                $vr_tour            = $request->input('virtual_tour');
                $img_360            = $request->input('img_360');
                $event_name         = $request->input('new_event_name');
                $event_date         = explode(" - ", $request->input('new_daterange'));
                $event_cover        = $request->input('new_event_cover');
                $event_desc         = $request->input('new_event_description');
                $event_desc_srb     = $request->input('new_event_description_srb');
                $event_desc_esp     = $request->input('new_event_description_esp');
                $event_desc_slo     = $request->input('new_event_description_slo');

                $event_image_1      = $request->input('event_new_image_1');
                $event_image_2      = $request->input('event_new_image_2');
                $event_image_3      = $request->input('event_new_image_3');
                $event_image_1_desc = $request->input('new_event_image_1_desc');
                $event_image_2_desc = $request->input('new_event_image_2_desc');
                $event_image_3_desc = $request->input('new_event_image_3_desc');
                $event_media        = $request->input('new_event_media');
                $event_media_desc   = $request->input('new_media_description');
                $event_note         = $request->input('new_event_note');


                

                //uplouding event photos
                if ($request->hasFile('new_event_cover')) {
                    $event_cover        = $request->file('new_event_cover');
                    $event_cover_name   = 'cover_'.time().'.'.$event_cover->getClientOriginalExtension();
                    $event_cover_path   = $event_cover ? $event_cover->move('images/events/', $event_cover_name) : null;

                }

                if ($request->hasFile('event_new_image_1')) {
                    $event_image_1        = $request->file('event_new_image_1');
                    $event_image_1_name   = 'image_1_'.time().'.'.$event_image_1->getClientOriginalExtension();
                    $event_image_1_path   = $event_image_1 ? $event_image_1->move('images/events/', $event_image_1_name) : null;

                }
                if ($request->hasFile('event_new_image_2')) {
                    $event_image_2        = $request->file('event_new_image_2');
                    $event_image_2_name   = 'image_2_'.time().'.'.$event_image_2->getClientOriginalExtension();
                    $event_image_2_path   = $event_image_2 ? $event_image_2->move('images/events/', $event_image_2_name) : null;

                }

                if ($request->hasFile('event_new_image_3')) {
                    $event_image_3        = $request->file('event_new_image_3');
                    $event_image_3_name   = 'image_3_'.time().'.'.$event_image_3->getClientOriginalExtension();
                    $event_image_3_path   = $event_image_3 ? $event_image_3->move('images/events/', $event_image_3_name) : null;

                }


                //Inserting in DB
                $event->event_name           = $event_name;
                $event->event_open           = $event_date[0];
                $event->event_closed         = $event_date[1];
                $event->event_cover          = (isset($event_cover_path)) ? $event_cover_path : $event->event_cover;

                

                $event->event_description        = $event_desc;
                $event->srb_event_description    = $event_desc_srb;
                $event->esp_event_description    = $event_desc_esp;
                $event->slo_event_description    = $event_desc_slo;
                $event->event_img_1              = (isset($event_image_1_path)) ? $event_image_1_path : null;
                $event->event_img_2              = (isset($event_image_2_path)) ? $event_image_2_path : null;
                $event->event_img_3              = (isset($event_image_3_path)) ? $event_image_3_path : null;
                $event->event_img_1_desc         = $event_image_1_desc;
                $event->event_img_2_desc         = $event_image_2_desc;
                $event->event_img_3_desc         = $event_image_3_desc;
                $event->event_media              = $event_media;
                $event->event_media_desc         = $event_media_desc;
                $event->event_note               = $event_note;
                $event->vr_tour                  = $vr_tour;
                $event->img_360                  = $img_360;
                

                if($event->save()) {
                    $message = ["success", $event->event_name. " is updated"];
                    

                    //GaleryName(first 3 char)+GaleryId+EventName(first 3 char)+EventID
                    //$nfc_tag = substr(Auth::user()->gallery_name, 0, 3).Auth::user()->id.substr($event->event_name, 0, 3).$eventLastId;


                    return Response::json(['success' => true, 'message' => $message]);

                }else {
                    dd("error");
                    $message = ["error", "OOps! Something went wrong!"];
                    return Response::json(["message" => $message]);
                }
            }else {

                $html = View::make('moderator.modals.update-event', [
                    'event' => $event,
                    'validator'=>$validator
                ])->render();

                return Response::json(["html" => $html, 'success' => false]);
            }

        
            
        }

        
        $html = View::make('moderator.modals.update-event', [

            'event' => $event,
            'validator' => $validator
        ])->render();

        return Response::json( ["html"=>$html, "success" => $success]);

    }
}
