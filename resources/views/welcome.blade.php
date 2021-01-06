@extends('layouts.sys')
@section('content')
    <div class="jumbotron jumbotron-fluid bg-cover bg-center" style="height:450px;" id="jb-bg">
        <div class="container">

            <div class="display-4 text-info" id="jb-title" style="display:inline">
            </div>

            <p class="lead text-white mt-5" id="jb-content" style="height: 150px;">
            </p>

            <button class="btn btn-outline-warning float-right">前往瞭解</button>
        </div>
    </div>

    <div class="container" style="min-height: calc(100vh - 538px - 65px - 16px);">
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
    

