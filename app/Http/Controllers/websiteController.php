<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact_message;
use Carbon\Carbon;

class websiteController extends Controller
{
    public function index(){
        return view('website.index');
    }

    public function contact(){
        return view('website.contact');
    }
    public function message(){
        $slug='contact'.uniqid(25);
        $insert=contact_message::insert([
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'subject' => $_POST['subject'],
            'message'=>$_POST['message'],
            'slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            return redirect()->route('website_contact');
        }
    }
}
