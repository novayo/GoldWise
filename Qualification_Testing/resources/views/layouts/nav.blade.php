@section('navigation_bar')

<!-- A grey horizontal navbar that becomes vertical on small screens -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">

    {{-- Brand --}}
    <a class="navbar-brand" href="/">
        <img src="/img/logo.jpg" style="width:40px;">
        翡翠花園
    </a>

    <!-- Toggler/collapsibe Button -->
    {{-- 設定當手機畫面時，nav會收起來 --}}
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    {{-- ml-auto：表示東西全靠右 --}}
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            
            <div class="row" style="margin-right:5%;">
                <li class="nav-item col-md-4">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item col-md-4">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item col-md-4">
                    <a class="btn" href="/login" style="color: white; background: green;">Login</a>
                </li>
            </div>
        </ul>
    </div>

</nav>

@endsection