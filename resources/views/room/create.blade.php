@extends('layouts.sys')

@section('content')
    
    <div class="container-fluid">

    
    <div class="d-flex justify-content-center pt-4">

        <form id="editForm" action="{{route('room.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                @include('components.alert') 
            </div>

            <div class="form-group row">
                <label for="No" class="col-sm-2 col-form-label">No</label>
                <div class="col-auto">
                    <input type="text" name="no" value="{{ old('no') }}" class="form-control" id="no" placeholder="No">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">name</label>
                <div class="col-auto">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="name">
                </div>
            </div>
            <div class="col-auto float-right">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
