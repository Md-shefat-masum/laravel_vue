<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use session;
use auth;
use Carbon\Carbon;
use App\Http\Middleware\PreventBackButton;
use App\frontlogo;

class adminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('preventBackButton');
        // $this->middleware('auth');
    }

    public function view(){
        return view('admin.index');
    }

    public function blank_index(Request $request){
        return view('admin.blank-pages.index');
    }
    public function blank_add(Request $request){
        return view('admin.blank-pages.add');
    }
    public function blank_view(Request $request){
        return view('admin.blank-pages.view');
    }
    public function blank_all(Request $request){
        return view('admin.blank-pages.all-in-one');
    }
    public function test(Request $request){
        return view('admin.blank-pages.text');
    }
}
