@extends('layouts.sys')

@section('content')

    <div class="row" style="min-height: calc(100vh - 65px - 56px); width: 100%;">
        <div class="container">

            <div class="col-3">
                <div class="row mt-3 ">
                    <div class="col-auto form-group">
                        <label for="roomOption" class="form-label">教室選擇</label>
                        <select name="roomOption" id="roomOption" class="form-control">
                            <option value="room_1">room_1</option>
                        </select>
                    </div>
                    <div class="col-auto form-group">
                        <label for="classOption" class="form-label">班級選擇</label>
                        <select name="classOption" id="classOption" class="form-control">
                            <option value="class_1">class_1</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button id="addBtn" class="btn btn-primary mt-2">新增座位</button>
                    </div>
                    <div class="col-auto">
                        <button id="saveBtn" class="btn btn-warning mt-2">儲存資料</button>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="room-wrapper" id="room-wrapper">
                </div>
            </div>
        </div>
    </div>

@endsection 
