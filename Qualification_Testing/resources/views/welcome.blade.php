@extends('layouts.header')
@extends('layouts.nav')

@section('logo image')
    <div class="container">
        <div class="col-md-12">
            <img src="/img/top_logo.jpg" style="max-width: 100%; height: auto;">
        </div>
    </div>
@endsection

@section('rolling banner')

    {{-- 
        * id = "carouselExampleIndicators" ，會對應到左右頁的href跟data-target=
        * class = "slide"：有輪播動畫
        * data-interval：輪播時間（毫秒）
        * carousel-fade：輪播動畫是消失
    --}}

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade banner" data-ride="carousel" data-interval="1000">

        <ol class="carousel-indicators banner">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
@endsection

@section('bracelet')
    <div style="padding: 2%;">
        <div class="container-fluid" style="background:WhiteSmoke; padding: 3%;">
            {{-- 標題 --}}
            <h1>手鐲</h1>

            {{-- 手鐲 --}}
            <div class="row">
                @foreach ($bracelets as $bracelet)
                    <div class="my-4 col-xs-12 col-sm-6 col-md-3">
                        <div class="card h-100">
                            <img src="/img/{{ $bracelet->image_name }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 150%">{{ $bracelet->guideline }}</h5>
                                <p class="card-text">
                                    <?php echo str_replace(chr(10), "<br />", $bracelet->subguideline) ?>
                                </p>
                                <a href="/detail/{{ $bracelet->guideline }}" class="btn btn-primary">更多資訊</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

@section('ring')
    <div style="padding: 2%;">
        <div class="container-fluid" style="background:Gainsboro; padding: 3%;">
            {{-- 標題 --}}
            <h1>戒指</h1>

            <div class="row">
                @foreach($rings as $ring)
                    <div class="my-4 col-xs-12 col-sm-6 col-xl-3">
                        <div class="hover_action card bg-dark text-white h-100">
                            <a href="/detail/{{ $ring->guideline }}" class="stretched-link" id="cardlink">
                                <img src="/img/{{ $ring->image_name }}" class="card-img">
                                <div class="card-img-overlay">
                                    <h5 class="card-title" style="font-size: 150%; color: black;">{{ $ring->guideline }}</h5>
                                    <p class="card-text">
                                        <?php echo str_replace(chr(10), "<br />", $ring->subguideline) ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection