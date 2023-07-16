<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    function form1() {
        return view('forms.form1');
    }

    function form1_data(Request $request) {

        // dd($request->all());
        // dd($request->only('name', '_token'));
        // dd($request->except('_token'));
        // dd($request->input('name'));
        dd($request->name);

    }

    function form2() {
        return view('forms.form2');
    }

    function form2_data(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);

        $name    = $request->name;
        $email   = $request->email;
        $phone   = $request->phone;
        $age     = $request->age;
        $message = $request->message;

        return view('forms.form2_info', compact('name', 'email', 'phone', 'age', 'message'));
    }
}
