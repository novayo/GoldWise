<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class bannerController extends Controller
{
    // view: welcome
    public function index(){
        $bracelets = Banner::where('attribute', 'bracelet')->orderBy('created_at','desc')->take(4)->get();
        $rings = Banner::where('attribute', 'ring')->orderBy('created_at','desc')->take(4)->get();
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
}
