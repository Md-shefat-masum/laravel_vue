<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\banner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Session;

class bannerController extends Controller
{
    public function index(){
        $all=banner::where('status',1)->get();
        return view('admin.ajax.banner',compact('all'));
    }

    public function add(Request $request){
        $slug = 'banner'.uniqid(20);
        $insert = banner::insert([
            'heading'=>$_POST['heading'],
            'subheading'=>$_POST['subheading'],
            'button_name'=>$_POST['button_name'],
            'button_url'=>$_POST['button_url'],
            'slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $path=Storage::putFile('uploads/banner',$file);
            banner::where('slug',$slug)->update([
                'image'=>$path
            ]);
        }

        // if($insert){
        //     Session::flash('success','value');
        //     return redirect()->route('banner');
        // }
    }

    public function view(Request $request,$id){
        $banner = banner::where('id',$id)->firstOrFail();
        return response()->json(array('sucess'=>true,'banner' => $banner));
    }
}
