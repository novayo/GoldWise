<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('upload');
    }

    // post name: image_name guildline subguildline content attribute
    // redirect: /
    public function store(Request $request){

        if($request->hasFile('upload_image')){
            if ($request->file('upload_image')->isValid()) {
                $image_name = htmlspecialchars($request->file('upload_image')->getClientOriginalName());
                $request->file('upload_image')->move(public_path('img'), $image_name);
                
                // 放進mysql
                $newRecord = new Banner();
                $newRecord->guideline = htmlspecialchars($request->input('guideline'));
                $newRecord->subguideline = htmlspecialchars($request->input('subguideline'));
                $newRecord->content = htmlspecialchars($request->input('content'));
                $newRecord->image_name = $image_name;
                $newRecord->attribute = htmlspecialchars($request->input('attribute'));
                $newRecord->save();

                return redirect('/');
            }
            return redirect()->back()->with('error', '檔案名稱不符');
        }
        return redirect()->back()->with('error', '錯誤，請重新上傳');
    }
}
