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

    // load more
    public function load_more(Request $request){
        if($request->ajax()){ // 如果是 ajax
            if ($request->cur_id != -1){
                $commodity = Banner::where('attribute', $request->attribute)->where('id', '<', $request->cur_id)->orderBy('id', 'DESC')->limit(4)->get(); // 拿下4個
            }
            else{
                $commodity = Banner::where('attribute', $request->attribute)->orderBy('id', 'DESC')->limit(4)->get(); // 拿下4個
            }
            
            $return_html = ''; // 回傳的 格式
            $return_id = $request->cur_id;   // 下4個的最後一個id

            if ($commodity->isEmpty() == FALSE){
                // 填return_html
                // 放四張圖
                // dd($commodity);
                $return_html .=  '<div class="row">';

                foreach($commodity as $data){
                    $subguideline = str_replace(chr(10), "<br />", $data->subguideline);
                    $return_id = $data->id;
                    if ($request->attribute == "bracelet"){
                        $return_html .= 
                        '<div class="my-4 col-xs-12 col-sm-6 col-md-3">
                            <div class="card h-100">
                                <img src="/img/'.$data->image_name.'" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 150%">'.$data->guideline.'</h5>
                                    <p class="card-text">
                                        '.$subguideline.'
                                    </p>
                                    <a href="/detail/'.$data->guideline.'" class="btn btn-primary">更多資訊</a>
                                </div>
                            </div>
                        </div>';
                    }
                    else if ($request->attribute == "ring"){    
                        $return_html .= 
                        '<div class="my-4 col-xs-12 col-sm-6 col-xl-3">
                            <div class="hover_action card bg-dark text-white h-100">
                                <a href="/detail/'.$data->guideline.'" class="stretched-link" id="cardlink">
                                    <img src="/img/'.$data->image_name.'" class="card-img">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title" style="font-size: 150%; color: black;">'.$data->guideline.'</h5>
                                        <p class="card-text">
                                            '.$subguideline.'
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>';
                    }
                    
                }
                $return_html .= '</div>';

                // 放按鈕
                $return_html .= 
                    '<div id="load_more" class="row">
                        <button type="button" class="mx-auto col-sm-12 col-md-3 btn btn-success form-control" data-id="'.$return_id.'" id="load_more_'.$request->attribute.'">載入更多</button>
                    </div>';
            }
            else{
                // 如果沒資料了，就直接 回傳一個不能按的按鈕
                $return_html .= 
                    '<div id="load_more" class="row">
                        <button type="button" class="mx-auto col-sm-12 col-md-3 btn btn-secondary form-control" disabled>已找到最底</button>
                    </div>';
            }

            // 回傳回去
            echo $return_html;
        }
    }
}
