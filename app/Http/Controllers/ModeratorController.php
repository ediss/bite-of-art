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

    public function getEvents() {
        $events = new Event;

        $data = $events->all();

        $html = View::make('inc.partial.dashboard.tables.events-table',[
            'events'  => $data,
        ])->render();

        return Response::json(["html" => $html]);
    }
}
