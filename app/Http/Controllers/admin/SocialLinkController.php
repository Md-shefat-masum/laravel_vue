<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SocialLink;
use Carbon\ Carbon;
use Image;
use Session;
use Auth;

class SocialLinkController extends Controller
{
    public function index(Request $request){
        $select = SocialLink::get();
        return view('admin.personal_info.index',compact('select'));
      //return view('index');
    }
    public function icons(Request $request){
        return view('admin.personal_info.icon');
      //return view('index');
    }

    public function add(Request $request){
        $slug = 'slug'.uniqid(20);
        $insert = SocialLink::insert([
            'icon' => $_POST['icon'],
            'link' => $_POST['link'],
            'slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect()->route('social_link');
        }
    }
    public function update(Request $request,$slug){
        $insert = SocialLink::where('slug',$slug)->update([
            'icon' => $_POST['icon'],
            'link' => $_POST['link'],
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect()->route('social_link');
        }
    }

    public function delete(Request $request,$slug){
        $delete = SocialLink::where('slug',$slug)->delete();
        if($delete){
            Session::flash('success','value');
            return redirect()->route('social_link');
        }
      //return view('delete');
    }
}
