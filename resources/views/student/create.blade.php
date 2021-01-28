@extends('layouts.sys')

@section('content')
    

    <div class="d-flex justify-content-center pt-4">
        <form id="editForm" action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @include('components.alert') 
            </div>

            <div class="form-group row">
                <label for="No" class="col-sm-2 col-form-label">編號</label>
                <div class="col-auto">
                    <input type="text" value="{{ old('no') }}" name="no" class="form-control" id="no" placeholder="No">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">姓名</label>
                <div class="col-auto">
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name" placeholder="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">相片: </label>

                <div class="col-auto">

                    <div class="custom-file">
                        <input type="file" id="upload_img" name="upload_img" class="custom-file-input">
                        <label for="upload_img" class="custom-file-label">選擇相片檔案</label>
                    </div>

                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">性別: </label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" value="M" id="genderMale" name="gender" checked>
                        <label class="form-check-label" for="gender">男生</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" value="F" id="genderFemale" name="gender">
                        <label class="form-check-label" for="gender">女生</label>
                    </div>
                </div>
            </div>
            <div class="col-auto float-right">
                <button class="btn btn-primary">新增</button>
            </div>
        </form>
    </div>
@endsection
