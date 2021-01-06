<nav class="navbar navbar-expand-lg navbar-light mb-3" style="background-color: rgb(98, 170, 162);">
    <a class="navbar-brand" href="#">
        <img src="{{asset('icons/cogwheel.png')}}" width="30" height="30" class="d-inline-block align-top text-white" alt=""
            loading="lazy">
        資訊系統
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" href="{{url('/')}}">首頁 <span class="sr-only">(當前位置)</span></a>
            <a class="nav-link" href="#">新增學生</a>
            <a class="nav-link" href="#">新增教室</a>
            <a class="nav-link" href="{{route('roomSeat.index')}}">排列學生與教室座位</a>
            
            @auth
            <a class="nav-link" href="#">個人資訊</a>
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">登出</a>
            <a class="nav-link" href="{{route('logout')}}">Login</a>
            @else
            <a class="nav-link" href="{{route('login')}}">Login</a>
            @endauth
            
        </div>
    </div>
</nav>