@extends('layouts.header')
@extends('layouts.nav')

@section('rolling banner')

    {{-- 
        * id = "carouselExampleControls" ，會對應到左右頁的href跟data-target=
        * class = "slide"：有輪播動畫
        * data-interval：輪播時間（毫秒）
        * carousel-fade：輪播動畫是消失
    --}}

    <div id="carouselExampleControls" class="carousel slide carousel-fade banner" data-ride="carousel" data-interval="1000" data-ride="false">

        <ol class="carousel-indicators banner">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>

        {{-- 輪播主框架
            * active：表示從這裡開始
        --}}
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/banner_1.jpg" class="d-block w-100" alt="1">
            </div>
            <div class="carousel-item">
                <img src="/img/banner_2.jpg" class="d-block w-100" alt="2">
            </div>
            <div class="carousel-item">
                <img src="/img/banner_3.jpg" class="d-block w-100" alt="3">
            </div>
        </div>

        {{-- 左右輪播鍵 --}}
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection

@section('bracelet')
    <div class="banner">
        <div style="background:light-grey !important;" class="jumbotron">
            {{-- 標題 --}}
            <h1>手鐲</h1>

            {{-- 手鐲1 --}}
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="/img/bracelet_1.jpeg" class="card-img-top" alt="bracelet_1">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 150%">輕吻</h5>
                            <p class="card-text">
                                記憶中的美麗<br>
                                溫柔的浮現眼前<br>
                                好似被風吹來的雨霧<br>
                                輕吻在我的臉上<br>
                            </p>
                            <a href="#" class="btn btn-primary">更多資訊</a>
                        </div>
                    </div>
                </div>

                {{-- 手鐲2 --}}
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="/img/bracelet_2.jpg" class="card-img-top" alt="bracelet_2">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 150%">輕吻</h5>
                            <p class="card-text">
                                蝴蝶翅膀上有星辰閃爍<br>
                                讓夏夜裡飄渺紫色星子<br>
                                愛的伴隨  穿越了心靈曠野<br>
                                飛往希望的光芒  為你摘星<br>
                            </p>
                            <a href="#" class="btn btn-primary">更多資訊</a>
                        </div>
                    </div>
                </div>

                {{-- 手鐲3 --}}
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="/img/bracelet_3.jpeg" class="card-img-top" alt="bracelet_3">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 150%">輕吻</h5>
                            <p class="card-text">
                                夏天綻放藍色小花<br>
                                有如清晨的露水<br>
                                幸喜伴隨微風而來的海洋水氣<br>
                                女孩隨風飄揚的笑<br>
                                有著迷迭香的味道<br>
                                溫柔又浪漫的笑顏<br>
                                是我最想留住的回憶<br>
                            </p>
                            <a href="#" class="btn btn-primary">更多資訊</a>
                        </div>
                    </div>
                </div>

                {{-- 手鐲4 --}}
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="/img/bracelet_4.jpg" class="card-img-top" alt="bracelet_4">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 150%">輕吻</h5>
                            <p class="card-text">
                                所謂幸福<br>
                                就是一個笨蛋  遇到一個傻瓜<br>
                                引來無數人的羨慕和嫉妒<br>
                                風風雨雨 平平淡淡<br>
                                屬於我們的小日子<br>
                            </p>
                            <a href="#" class="btn btn-primary">更多資訊</a>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
@endsection

@section('ring')
    <div class="banner">
        <div style="background:light-grey !important;" class="jumbotron">
            {{-- 標題 --}}
            <h1>戒指</h1>

            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
                {{-- 戒指1 --}}
                <div class="col mb-4">
                    <div class="card bg-dark text-white h-100">
                        <a href="#" class="stretched-link" id="cardlink">
                            <img src="/img/ring_1.jpg" class="card-img" alt="ring_1">
                            <div class="card-img-overlay">
                                <h5 class="card-title" style="font-size: 150%; color: black;">祕密花園</h5>
                                <p>
                                    星星閃爍 月光照耀花叢間<br>
                                    澄澈的雙眼 探尋著時間的奧秘<br>
                                    聆聽著紀載著我人生的童話<br>
                                    字字句句都是歲月凝結的光華<br>
                                    歲月給予的童真<br>
                                    都是我的小秘密<br>
                                    <br>
                                    那裡或許春光燦爛 或許陰雨纏綿<br>
                                    隨著內心波動<br>
                                    一花一葉悸動在心田<br>
                                </p>
                            </div>
                        </a>
                    </div>
                    {{-- <div class="card h-100">
                        <img src="/img/ring_1.jpg" class="card-img-top" alt="ring_1">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 150%">祕密花園</h5>
                            <p class="card-text">
                                星星閃爍 月光照耀花叢間<br>
                                澄澈的雙眼 探尋著時間的奧秘<br>
                                聆聽著紀載著我人生的童話<br>
                                字字句句都是歲月凝結的光華<br>
                                歲月給予的童真<br>
                                都是我的小秘密<br>
                                <br>
                                那裡或許春光燦爛 或許陰雨纏綿<br>
                                隨著內心波動<br>
                                一花一葉悸動在心田<br>
                            </p>
                            <a href="#" class="btn btn-primary">更多資訊</a>
                        </div>
                    </div> --}}
                </div>

                {{-- 戒指2 --}}
                <div class="col mb-4">
                    <div class="card bg-dark text-white h-100">
                        <a href="#" class="stretched-link" id="cardlink">
                            <img src="/img/ring_2.jpg" class="card-img" alt="ring_2">
                            <div class="card-img-overlay">
                                <h5 class="card-title" style="font-size: 150%; color: black;">陽翠綠色翡</h5>
                                <p>
                                    曾經的似水年華<br>
                                    在青春的記憶裡<br>
                                    因為有你的陪伴<br>
                                    一路才更加溫暖<br>
                                </p>
                            </div>
                        </a>
                    </div>

                    {{-- <div class="card h-100">
                        <img src="/img/ring_2.jpg" class="card-img-top" alt="ring_2">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 150%">陽翠綠色翡</h5>
                            <p class="card-text">
                                曾經的似水年華<br>
                                在青春的記憶裡<br>
                                因為有你的陪伴<br>
                                一路才更加溫暖<br>
                            </p>
                            <a href="#" class="btn btn-primary">更多資訊</a>
                        </div>
                    </div> --}}
                </div>

                {{-- 戒指3 --}}
                <div class="col mb-4">
                    <div class="card bg-dark text-white h-100">
                        <a href="#" class="stretched-link" id="cardlink">
                            <img src="/img/ring_3.jpg" class="card-img" alt="ring_3">
                            <div class="card-img-overlay">
                                <h5 class="card-title" style="font-size: 150%; color: black;">低調奢華</h5>
                                <p>
                                    時光輕移 從清晨到黃昏<br>
                                    斜照進來的光<br>
                                    分割了上午和下午<br>
                                    時臻慢轉 只為等待這美麗的遇見<br>
                                </p>
                            </div>
                        </a>
                    </div>

                    {{-- <div class="card h-100">
                        <img src="/img/ring_3.jpg" class="card-img-top" alt="ring_3">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 150%">低調奢華</h5>
                            <p class="card-text">
                                時光輕移 從清晨到黃昏<br>
                                斜照進來的光<br>
                                分割了上午和下午<br>
                                時臻慢轉 只為等待這美麗的遇見<br>
                            </p>
                            <a href="#" class="btn btn-primary">更多資訊</a>
                        </div>
                    </div> --}}
                </div>

                {{-- 戒指4 --}}
                <div class="col mb-4">
                        <div class="card bg-dark text-white h-100">
                            <a href="#" class="stretched-link" id="cardlink">
                                <img src="/img/ring_4.jpg" class="card-img" alt="ring_4">
                                <div class="card-img-overlay">
                                    <h5 class="card-title" style="font-size: 150%; color: black;">天涯咫尺</h5>
                                    <p>
                                        天涯外 是一份深情的期待<br>
                                        咫尺 是一場美麗的相遇<br>
                                        等妳 是最溫柔的幸福<br>
                                        天涯 咫尺 等妳 期待 相遇 幸福<br>
                                    </p>
                                </div>
                            </a>
                        </div>
                        
                        
                    {{-- <div class="card h-100">
                        <img src="/img/ring_4.jpg" class="card-img-top" alt="ring_4">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 150%">天涯咫尺</h5>
                            <p class="card-text">
                                天涯外 是一份深情的期待<br>
                                咫尺 是一場美麗的相遇<br>
                                等妳 是最溫柔的幸福<br>
                                天涯 咫尺 等妳 期待 相遇 幸福<br>
                            </p>
                            <a href="#" class="btn btn-primary">更多資訊</a>
                        </div>
                    </div> --}}
                </div>
            </div>

            
        </div>
    </div>
@endsection