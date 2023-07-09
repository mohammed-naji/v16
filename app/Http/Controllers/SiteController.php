<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
public function home() {
    return 'home page';
}

public function about() {
    return 'about page';
}

public function team() {
    return 'team page';
}

public function contact() {
    return 'contact page';
}



}
