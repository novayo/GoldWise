@section('navigation_bar')

    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

        {{-- Brand --}}
        <a class="navbar-brand" href="/" style="margin-left:5%;">
            <img src="/img/logo.jpg" style="width:40px;">
            翡翠花園
        </a>

        <!-- Toggler/collapsibe Button -->
        {{-- 設定當手機畫面時，nav會收起來 --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        {{-- ml-auto：表示東西全靠右 --}}
        <div class="w-100" style="margin-right: 5%;">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <div class="navbar-nav ml-auto">
                    
                    {{-- <div class="row"> --}}
                        <a class="nav-link nav-item col-sm-12 col-md-3" href="/">首頁</a>
                        <a class="nav-link nav-item col-sm-12 col-md-3" href="https://www.jadegardentw.com/index.html">關於</a>
    
                        <!-- Authentication Links -->
                        @guest
                            <div class="nav-item col-sm-12 col-md-4">
                                <a href="{{ route('login') }}" type="button" class="nav-item btn btn-outline-danger">登入</a>
                            </div>
                            @if (Route::has('register'))
                                <div class="nav-item col-sm-12 col-md-2">
                                    <a href="{{ route('register') }}" type="button" class="nav-item btn btn-outline-info">註冊</a>
                                </div>
                            @endif
                        @else
                            <div class="nav-item dropdown col-sm-12 col-md-3">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu">
                                    {{-- 上傳按鈕 --}}
                                    <a class="dropdown-item" href="/upload">上傳商品</a>
    
                                    {{-- 分隔線 --}}
                                    <div class="dropdown-divider"></div>
    
                                    {{-- 登出按鈕 --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"> 登出 </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    {{-- </div> --}}
                </div>
            </div>
        </div>
        

    </nav>

@endsection