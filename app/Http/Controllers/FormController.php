<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataRequest;
use App\Mail\ContactMail;
use App\Mail\ContactUsMail;
use App\Rules\WordCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use LDAP\Result;

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

    function form2_data(DataRequest $request) {


        // 1. Request Validate
        // $request->validate([
        //     'name' => ['required', 'min:4', 'max:30'],
        //     'email' => 'required|ends_with:@gmail.com',
        //     'phone' => 'required',
        //     'age' => 'required|gt:30',
        //     'message' => ['required', new WordCount(8) ]
        // ]);


        // 2. Validator Class
    //     $valid = Validator::make($request->all(), [
    //             'name' => ['required', 'min:4', 'max:30'],
    //             'email' => 'required|ends_with:@gmail.com',
    //             'phone' => 'required',
    //             'age' => 'required|gt:30',
    //             'message' =>'required'
    //     ]
    //     // ,[
    //     //     'name.required' => ' حقل الاسم مطلووووووووب',
    //     //     'email.required' => 'الايميل مهم ي حبيبي'
    //     // ]
    // );

    //     if($valid->fails()) {
    //         // return response()->json([
    //         //     'status'=>false,
    //         //     'msg'=>'Validation Error!',
    //         //     'errors'=>$valid->messages()
    //         // ]);

    //         return redirect()->back()->withErrors($valid)->withInput();
    //     }

        // dump();
        dd($request->all());

        $name    = $request->name;
        $email   = $request->email;
        $phone   = $request->phone;
        $age     = $request->age;
        $message = $request->message;

        return view('forms.form2_info', compact('name', 'email', 'phone', 'age', 'message'));
    }

    function form3() {
        return view('forms.form3');
    }

    function form3_data(Request $request) {
        $request->validate([
            'image' => 'required|mimes:gif,svg'
        ]);
        $imgname = rand(). time(). $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'),$imgname);
    }

    function contact() {
        return view('forms.contact');
    }

    function contact_data (Request $request) {
        // validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'cv' => 'required',
        ]);

        // upload file
        // Mohammed Ahmed => mohammed-ahmed-23-7-2023-4656565.pdf
        // dd.pdf => pdf
        $ex = $request->file('cv')->getClientOriginalExtension();
        $cv_name = str_replace(' ', '-', strtolower($request->name));
        $cv_name = $cv_name . '-cv-'.date('d-m-Y').'-'.time().'.'.$ex;
        $request->file('cv')->move(public_path('uploaded_cv'), $cv_name);

        $info = $request->except('_token', 'cv');
        $info['cv'] = $cv_name;

        // dd($info);
        // store data or send mail or any action
        Mail::to('malqumbuz@gmail.com')->send(new ContactMail($info));
        // redirect to any other page
    }
}
// smtp => simple mail transfer protocol
// mailtrap
