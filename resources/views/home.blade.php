@extends('layouts.sys')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('components.alert')
            <div class="card">
                <div class="card-header">個人資料</div>
                <form action="{{ route('user.patch') }}" method="POST">
                    @csrf 
                    @method('PATCH')
                <div class="card-body">   
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">電子信箱</label>
                        <input type="email" readonly class="form-control-plaintext" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">使用者名稱</label>
                        <input class="form-control" id="" name="name" type="text" value="{{ $user->name }}">
                    </div>
                    <button class="btn btn-primary">
                        儲存資料
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
