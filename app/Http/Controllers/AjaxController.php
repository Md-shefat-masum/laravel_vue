<?php

namespace App\Http\Controllers;

use App\AjaxCrud;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class AjaxController extends Controller
{
    public function index(Request $request){
        $all=AjaxCrud::where('status',1)->get();
        return view('admin.ajax.ajax',compact('all'));
    }

    public function add(Request $request){
        // dd($request);
        $insert = AjaxCrud::insert([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->hashName('image');
            $image = Image::make($file);
            $image->fit(600, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = 'uploads/ajaxCrud/' . $path;
            Storage::put($path, (string) $image->encode());

            $id = AjaxCrud::limit(1)->orderBy('id', 'DESC')->get();
            foreach ($id as $id) {
                $id = $id->id;
            }

            AjaxCrud::where('id', $id)->update([
                'image' => $path,
            ]);
        }

        // $this->view($id);
        return response()->json(array('image'=>$path, 'id' => $id));

    }

    public function view($id){
        $banner = AjaxCrud::where('id',$id)->firstOrFail();
        return response()->json(array('sucess'=>true,'banner' => $banner));
    }

    public function update(Request $request){
        $update = AjaxCrud::where('id',$request->id)->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->hashName('image');
            $image = Image::make($file);
            $image->fit(600, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = 'uploads/ajaxCrud/' . $path;
            Storage::put($path, (string) $image->encode());

            AjaxCrud::where('id', $request->id)->update([
                'image' => $path,
            ]);
        }

        // if($update){
        //     return redirect()->route('ajax_index');
        // }

    }

    public function delete(Request $request){
        $delete = AjaxCrud::where('id',$request->id)->update([
            'status' => 0
        ]);
    }
}
