<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class bannerController extends Controller
{
    // view: welcome
    public function index(){
        $bracelets = Banner::where('attribute', 'bracelet')->get();
        $rings = Banner::where('attribute', 'ring')->get();
        return view('welcome', [
            'bracelets' => $bracelets,
            'rings' => $rings,
        ]);
    }

    // show page: show the content of the commodity
    public function show($guideline){
        $commodity = Banner::where('guideline', $guideline)->first();

        return view('detail', [
            'commodity' => $commodity,
        ]);
    }

    // post name: image_name guildline subguildline content attribute
    // redirect: /
    public function store(Request $request){

        if($request->hasFile('upload_image')){
            if ($request->file('upload_image')->isValid()) {
                // $user = Auth::user();
                $image_name = $request->file('upload_image')->getClientOriginalName();
                $request->file('upload_image')->move(public_path('img'), $image_name);
                
                // 放進mysql
                $newRecord = new Banner();
                $newRecord->guideline = $request->input('guideline');
                $newRecord->subguideline = $request->input('subguideline');
                $newRecord->content = $request->input('content');
                $newRecord->image_name = $image_name;
                $newRecord->attribute = $request->input('attribute');
                $newRecord->save();

                // $user->myimage = $path.$image_name;
                // $user->save();
                // $this->save();


                return redirect('/');
            }
            return redirect()->back()->with('error', '檔案名稱不符');
        }
        return redirect()->back()->with('error', '錯誤，請重新上傳');
    }
}
