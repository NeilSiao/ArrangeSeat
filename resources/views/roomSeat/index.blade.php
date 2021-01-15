



@extends('layouts.sys')

@section('content')
<form action="" id="seatListForm">
    <div class="row" style="min-height: calc(100vh - 65px - 56px); width: 100%;">
        <div class="container">
            <div class="col-3">
                <div class="row mt-3 ">
                    <div class="col-auto form-group">
                        <label for="roomOption" class="form-label">教室選擇</label>
                        <select name="roomOption" id="roomOption" class="form-control">
                            @foreach($roomOption as $option)
                                <option value="{{ $option->id }}" {{ ($defRoomVal == $option->id) ? 'selected' : ''  }} >{{ $option->name }}</option>
                            @endforeach
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
</form>
    <script src={{asset('js/arrangeSeat.js')}}></script>
@endsection 
