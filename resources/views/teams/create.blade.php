@extends('layouts.sys')

@section('content')
    <div class="container-fluid">
    <div class="d-flex justify-content-center pt-4">
        <form id="editForm" action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @include('components.alert') 
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">團隊名稱</label>
                <div class="col-auto">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Team Name">
                </div>
            </div>
            <div class="col-auto float-right">
                <button class="btn btn-primary">建立團隊</button>
            </div>
        </form>
    </div>
</div>
@endsection
