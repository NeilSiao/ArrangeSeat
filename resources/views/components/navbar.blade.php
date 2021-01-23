<script>
    $(function(){
        var target = '{{ $current }}'
        $(target).addClass('active');
    });
</script>
<nav class="navbar navbar-expand-lg navbar-light mb-3" style="background-color: rgb(98, 170, 162);">
    <a class="navbar-brand" href="{{ route('index') }}">
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
            <a id="home" class="nav-link " href="{{route('index')}}">首頁</a>
            @auth
            <div class="nav-item dropdown " id="student">
                <a href="" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    學生管理
                </a>
                <div class="dropdown-menu">
                    <a href="{{route('student.index')}}" class="dropdown-item">新增學生</a>
                    <a href="{{route('team.index')}}" class="dropdown-item">新增團隊</a>
                </div>
            </div>
            
            <div class="nav-item dropdown" id="room">
                <a href="" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    教室管理
                </a>
                <div class="dropdown-menu">
                    <a href="{{route('room.index')}}" class="dropdown-item">新增教室</a>
                    <a href="{{route('roomSeat.index')}}" class="dropdown-item">排列教室座位</a>
                </div>
            </div>

            {{-- <a class="nav-link" href="{{route('student.index')}}">新增學生</a>
            <a class="nav-link" href="{{route('team.index')}}">新增學生群組</a> --}}
            {{-- <a class="nav-link" href="{{route('room.index') }}">新增教室</a>
            <a class="nav-link" href="{{route('roomSeat.index')}}">排列教室座位</a> --}}
            <a id="randomSeat" class="nav-link" href="{{route('randomSeat.index')}}">亂數排序教室與學生</a>
            
            <div class="nav-item dropdown">
                <a href="" id="dashboard" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    個人資訊
                </a>
                <div class="dropdown-menu">
                    <a href="{{route('dashboard')}}" class="dropdown-item">編輯個人資訊</a>
                    <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); logout(this)">登出</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                    </form>
                    <script>
                        function logout(){
                            document.getElementById('logout-form').submit();
                        }
                    </script>
                </div>
            </div>
            @else
                <a id="login" class="nav-link" href="{{route('login')}}" >登入</a>
                <a class="nav-link" href="{{route('register')}}" >註冊</a>
            @endauth
            
        </div>
    </div>
</nav>