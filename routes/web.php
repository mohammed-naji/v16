<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Models\Product;

// Route::get('/profile/{name?}', function($n = '') {
//     return 'Profile ' . $n;
// });

// Route::get('url', 'action');

// use , namespace

// Route::post('/', function () {
//     return 'Homepage';
// });

// Route::put('/', function () {
//     return 'Homepage';
// });

// Route::patch('/', function () {
//     return 'Homepage';
// });

// Route::delete('/', function () {
//     return 'Homepage';
// });

// Route::get('/', function () {
//     return 'Homepage - Get';
// });

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
// Route::get('home', function() {
//     return 'home page';
// });

// Route::get('about', function() {
//     return 'about page';
// });

// Route::get('contact', function() {
//     return 'contact page';
// });

// Route::post('contact', function() {
//     return 'contact page';
// });

// Route::get('team', function() {
//     return 'team page';
// });

// Route::get('services', function() {
//     return 'services page';
// });

// Route::get('user/{name}/{age}', function($name, $age) {
//     return "Welcome $name, your age is $age";
// })->whereAlpha('name')->whereNumber('age');
// ->where('name', '[a-zA-Z]+');
// /sessions/itil-foundation/self-study
// /sessions/itil-foundation

// Route::get('/sessions/{course}/{type?}', function($course, $type = 'live-online') {
//     return "Course Name : $course , Course Type = $type";
// });



// Route::get('/', function() {
//     // return 'Go to <a href="/contact-me">Contact</a> Page';
//     // $url = url('/contact-me');
//     $url = route('contactpage');
//     // return $url;
//     return 'Go to <a href="'.$url.'">Contact</a> Page';
//     // return 'Go to <a href="">Contact</a> Page';
// });

// Route::get('contact-us', function() {
//     return 'Contact Us';
// })->name('contactpage');

// Route::prefix('admin')->name('admin.')->group(function() {
//     Route::get('/', function() {
//         return 'Admin';
//     })->name('index');

//     Route::get('orders', function() {
//         return 'Admin orders';
//     })->name('orders');

//     Route::get('products', function() {
//         return 'Admin products';
//     })->name('products');

//     Route::get('posts', function() {
//         return 'Admin posts';
//     })->name('posts');

//     Route::get('books', function() {
//         return 'Admin books';
//     })->name('books');

// });

// Route::match(['post', 'put', 'patch'], 'save-data', function() {
//     return 'Data Saved';
// });

// Route::any('privacy-policy', function() {
//     return 'dd';
// });

// Route::view('test', 'welcome');

// Route::redirect('/test', '/privacy-policy');

// use , namespace

// Route::get('/', [MainController::class, 'index'])->name('main.index');
// Route::get('/', 'MainController@index');

// SiteController
// home , about , team , contact
// Route::get('home', [SiteController::class, 'home'])->name('home');
// Route::get('about', [SiteController::class, 'about'])->name('about');
// Route::get('team', [SiteController::class, 'team'])->name('team');
// Route::get('contact', [SiteController::class, 'contact'])->name('contact');

// Route::get('course/{name}', [CourseController::class, 'index'])->name('course.index');

// Route::get('/admin', function() {
//     return 'Admin';
// });

Route::get('/', [PersonalController::class, 'index'])->name('index');
Route::get('/contact', [PersonalController::class, 'contact'])->name('contact');
Route::get('/projects', [PersonalController::class, 'projects'])->name('projects');
Route::get('/resume', [PersonalController::class, 'resume'])->name('resume');


Route::get('form1', [FormController::class, 'form1'])->name('forms.form1');
Route::post('form1', [FormController::class, 'form1_data'])->name('forms.form1_data');

Route::get('form2', [FormController::class, 'form2'])->name('forms.form2');
Route::post('form2', [FormController::class, 'form2_data'])->name('forms.form2_data');

Route::get('form3', [FormController::class, 'form3'])->name('forms.form3');
Route::post('form3', [FormController::class, 'form3_data'])->name('forms.form3_data');

Route::get('contact', [FormController::class, 'contact'])->name('forms.contact');
Route::post('contact', [FormController::class, 'contact_data'])->name('forms.contact_data');

// $con = mysqli_connect('localhost', 'root', '', 'v16');

// if(!$con) {
//     die('dddd');
// }


// CRUD Application
Route::get('products', [ProductController::class, 'products'])->name('products.index');

Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
// /products/create

Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
