<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    function index($course = '') {
        // return "Course Name $course";

        // $name = "Ahmed";

        // $age = 20;

        // return view('course')->with('course', $course);
        // return view('course', [
        //     'course' => $course,
        //     'name' => $name,
        //     'age' => $age
        // ]);
        // return view('course', compact('course', 'name', 'age'));

        // $posts = Post::all();

        $posts = [
            [
                'id' => 1,
                'title' => 'Title 1',
                'image' => 'Image 1',
                'body' => 'Lorem 1'
            ],
            [
                'id' => 2,
                'title' => 'Title 2',
                'image' => 'Image 2',
                'body' => 'Lorem 2'
            ],
            [
                'id' => 3,
                'title' => 'Title 3',
                'image' => 'Image 3',
                'body' => 'Lorem 3'
            ],
            [
                'id' => 4,
                'title' => 'Title 4',
                'image' => 'Image 4',
                'body' => 'Lorem 4'
            ],
            [
                'id' => 5,
                'title' => 'Title 5',
                'image' => 'Image 5',
                'body' => 'Lorem 5'
            ]
        ];

        // dd($posts);
        // dump($posts);

        return view('posts', compact('posts'));
    }
}



