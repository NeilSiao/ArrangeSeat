@extends('layouts.sys')
@section('content')

    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: rgb(98, 170, 162);">
        <a class="navbar-brand" href="#">
            <img src="./icons/cogwheel.png" width="30" height="30" class="d-inline-block align-top text-white" alt=""
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
                <div class="float-right">
                    @auth
                    <a class="nav-link" href="#">個人資訊</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">登出</a>
                    <a class="nav-link" href="{{route('logout')}}">Login</a>
                    @else
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid bg-cover bg-center" style="height:450px;" id="jb-bg">
        <div class="container">

            <div class="display-4 text-info" id="jb-title" style="display:inline">
            </div>

            <p class="lead text-white mt-5" id="jb-content" style="height: 150px;">
            </p>

            <button class="btn btn-outline-warning float-right">前往瞭解</button>
        </div>
    </div>

    <div class="container" style="min-height: calc(100vh - 538px - 65px);">
        <h1 class="mb-3">使用步驟</h1>
        <div class="card-deck mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">1. 新增教室</h5>
                    <p class="card-text">建立教室資源，建立教室的座位，以利後續作業綁定。</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">2. 新增學生</h5>
                    <p class="card-text">建立學生資源，以提供教室在隨機座位時，可以將指定之學生安排進座位。
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">3. 隨機教室座位排序學生</h5>
                    <p class="card-text">進行指定的教室與學生的資料綁定，提供隨機的座位安排服務</p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/index.js')}}"></script>
@endsection
    

