<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    function index() {
        return view('personal.index');
    }

    function contact() {
        return view('personal.contact');
    }

    function projects() {
        return view('personal.projects');
    }

    function resume() {
        return view('personal.resume');
    }

}
