



@extends('layouts.sys')

@section('content')
<div class="container-fluid">


@include('components.alert')
<form action="{{route('roomSeat.store')}}" id="seatListForm" method="POST">
    @csrf
</form>
<div class="container-fluid">
<div class="row" style="min-height: calc(100vh - 65px - 56px); width: 100%;">
    <div class="col-12">
        <div class="col-12">
            <div class="alert alert-warning">
                <div>
                    操作說明： 
                </div>
                <ul>
                    <li>點擊新增座位,可增加座位</li>
                    <li>雙擊座位可進行旋轉</li>
                    <li>位置擺放完畢後,請點擊儲存</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-2">
                <div class="row mt-3 ">
                    <div class="col-auto form-group">
                        <form action="">
                        <label for="roomOption" class="form-label">教室選擇</label>
                        <select name="roomOption" id="roomOption" class="form-control" onchange="this.form.submit();">
                            @foreach($roomOption as $option)
                                <option value="{{ $option->id }}" {{ ($selRoom == $option->id) ? 'selected' : ''  }} >{{ $option->name }}</option>
                            @endforeach
                        </select>
                    </form>
                    </div>
                    <div class="col-auto">
                        <button id="addBtn" class="btn btn-primary mt-2">新增座位</button>
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
    </div>
    
    </div>

    <script src={{asset('js/arrangeSeat.js')}}></script>
    <script>
        setSeatList({!! $roomSeats !!})
        iterateSeats();
        bindMotionEvent();
    </script>
    </div>
@endsection 
