<?php

use Illuminate\Support\Facades\Route;

// Route::get('url', 'action');

// use , namespace

Route::post('/', function () {
    return 'Homepage';
});

Route::put('/', function () {
    return 'Homepage';
});

Route::patch('/', function () {
    return 'Homepage';
});

Route::delete('/', function () {
    return 'Homepage';
});

Route::get('/', function () {
    return 'Homepage - Get';
});

// Route::get('/about', function () {
//     return 'About Page';
// });

// Route::get('/contact', function () {
//     return 'Contact Page';
// });

// Route::fallback(function() {
//     return redirect('/');
// });

// Route::get('uri', 'action');
// Route::post('uri', 'action');
// Route::put('uri', 'action');
// Route::patch('uri', 'action');
// Route::delete('uri', 'action');

// home , about , contact , team , services
Route::get('home', function() {
    return 'home page';
});

Route::get('about', function() {
    return 'about page';
});

Route::get('contact', function() {
    return 'contact page';
});

Route::post('contact', function() {
    return 'contact page';
});

Route::get('team', function() {
    return 'team page';
});

Route::get('services', function() {
    return 'services page';
});

Route::get('user/{name}/{age}', function($name, $age) {
    return "Welcome $name, your age is $age";
})->whereAlpha('name')->whereNumber('age');
// ->where('name', '[a-zA-Z]+');
// /sessions/itil-foundation/self-study
// /sessions/itil-foundation

Route::get('/sessions/{course}/{type?}', function($course, $type = 'live-online') {
    return "Course Name : $course , Course Type = $type";
});
