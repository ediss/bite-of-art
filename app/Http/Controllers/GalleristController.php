<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as Gallerist;


class GalleristController extends Controller
{
    public function index() {
        $validator = null;
        return view('gallerist.dashboard',[
            'validator' => $validator
        ]);
    }
}
