@extends('layouts.sys')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">個人資料</div>

                <div class="card-body">   
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">電子信箱</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">使用者名稱</label>
                        <input class="form-control" id="" type="text" value="{{ $user->name }}">
                    </div>
                    <button class="btn btn-primary">
                        儲存資料
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
