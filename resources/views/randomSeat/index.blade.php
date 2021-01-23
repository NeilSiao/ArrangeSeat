@extends('layouts.sys')

@section('content')
<div class="container-fluid">


    <div class="container">
        @include('components.alert')
    <div class="row" style="min-height: calc(100vh - 65px - 56px); width: 100%;">
            <form action="{{ route('randomSeat.store') }}" method="POST" id="randomForm">
                @csrf
            </form>
            
            <div class="row mt-3">
                    <div class="col-6">
                        <form action="{{ route('randomSeat.index') }}">
                            <div class="col-auto form-group">
                                <label for="roomOption" class="form-label">教室選擇</label>
                                <select name="roomOption" id="roomOption" class="form-control">
                                    @foreach ($roomOption as $option)
                                        <option value="{{ $option->id }}" {{ $selRoom == $option->id ? 'selected' : '' }}>
                                            {{ $option->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto form-group">
                                <label for="teamOption" class="form-label">班級選擇</label>
                                <select name="teamOption" id="teamOption" class="form-control">
                                    @foreach ($teamOption as $team)
                                        <option value="{{ $team->id }}" {{ $selTeam == $team->id ? 'selected' : '' }}>
                                            {{ $team->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <a id="randomBtn" class="btn btn-primary mt-2">開始亂數排序</a>
                                <a id="saveBtn" class="btn btn-warning mt-2">儲存資料</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <h5>未被安排座位的學生</h5>
                        <div class="" style="height: 200px; overflow-y: scroll;">
                            <ul class="list-group" id="unChooseStudent">
                            </ul>    
                        </div>

                    </div>
                    
                </div>
                <div class="row">
                    <div class="room-wrapper" id="room-wrapper">
                    </div>
                </div>
        </div>

       
    </div>


    <div id="studentModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title">輸入學生代號</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="display:none" id="modal-warning" class="alert alert-warning">找不到學生在這個教室</div>
                    <div class="form-group">
                        <label for="StudentNo">學生代號</label>
                        <input type="text" class="form-control" id="StudentNo" placeholder="代號...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="saveModal" type="button" class="btn btn-primary">儲存</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/randomSeat.js') }}"></script>
    <script>
        setSeatList({!! $roomSeat !!});
        setStuList({!! $teamStudent !!})
        iterateSeats();
        bindModalEvent();
        renderUnChooseStudent();
    </script>

</div>
@endsection
