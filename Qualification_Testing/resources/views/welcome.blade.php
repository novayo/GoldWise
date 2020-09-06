@extends('layouts.header')
@extends('layouts.nav')

@section('logo image')
    {{-- 如果登入成功，顯示某某東西 --}}
    @auth
        <div class="alert alert-success" role="alert">
            <marquee behavior="behavior" width="100%" loop="-1">嗨! <?php echo auth()->user()->name; ?> 歡迎登入</marquee>
        </div>
    @endauth

    @guest
        <script>
            $(document).ready(function(){
                $('#exampleModalCenter').modal('show');
            });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">你尚未登入</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body w-100">
                    <div class="row justify-content-center">
                        <a href="{{ route('login') }}" type="button" class="nav-item btn btn-outline-danger">登入</a>
                        <a href="{{ route('register') }}" type="button" class="nav-item btn btn-outline-info">註冊</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    @endguest

    <div id="logo_section" class="container">
        <div class="col-xs-12">
            <img src="/img/top_logo.jpg" style="max-width: 100%;">
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
    <div id="bracelet_section" style="padding: 2%;">
        <div class="container-fluid" style="background:WhiteSmoke; padding: 3%;">
            {{-- 標題 --}}
            <h1>手鐲</h1>

            {{-- 手鐲 --}}
            @csrf
            <div id="bracelet"></div>

            {{-- load more jquery --}}
            <script type="text/javascript">
                $(document).ready(function(){
                    // 拿token
                    var _token = $('input[name="_token"]').val();
                    load_more_data(-1, "bracelet", _token);
                    
                    // 按了之後
                    $(document).on('click', '#load_more_bracelet', function(){
                        var cur_id = $(this).data('id'); // 拿 data-id 資料 成 int (https://stackoverflow.com/questions/5309926/how-to-get-the-data-id-attribute)
                        $('#load_more_bracelet').html('<b>讀取中...</b>'); // 文字改變
                        load_more_data(cur_id, "bracelet", _token); // 更新資料
                    });
                });
            </script>
        </div>
    </div>
@endsection

@section('ring')
    <div id="ring_section" style="padding: 2%;">
        <div class="container-fluid" style="background:Gainsboro; padding: 3%;">
            {{-- 標題 --}}
            <h1>戒指</h1>

            @csrf
            <div id="ring"></div>

            {{-- load more jquery --}}
            <script type="text/javascript">
                $(document).ready(function(){
                    // 拿token
                    var _token = $('input[name="_token"]').val();
                    load_more_data(-1, "ring", _token);

                    // 按了之後
                    $(document).on('click', '#load_more_ring', function(){
                        var cur_id = $(this).data('id'); // 拿 data-id 資料 成 int (https://stackoverflow.com/questions/5309926/how-to-get-the-data-id-attribute)
                        $('#load_more_ring').html('<b>讀取中...</b>'); // 文字改變
                        load_more_data(cur_id, "ring", _token); // 更新資料
                    });
                });
            </script>
        </div>
    </div>
@endsection