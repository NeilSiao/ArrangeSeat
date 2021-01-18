@extends('layouts.sys')

@section('content')
    

    <div class="d-flex justify-content-center pt-4">
        <form id="editForm" action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @include('components.alert') 
            </div>

            <div class="form-group row">
                <label for="No" class="col-sm-2 col-form-label">No</label>
                <div class="col-auto">
                    <input type="text" name="no" class="form-control" id="no" placeholder="No">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">name</label>
                <div class="col-auto">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Photo: </label>

                <div class="col-auto">

                    <div class="custom-file">
                        <input type="file" id="upload_img" name="upload_img" class="custom-file-input">
                        <label for="upload_img" class="custom-file-label">Choose file</label>
                    </div>

                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Gender: </label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" value="M" id="genderMale" name="gender" checked>
                        <label class="form-check-label" for="gender">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" value="F" id="genderFemale" name="gender">
                        <label class="form-check-label" for="gender">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-auto float-right">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
