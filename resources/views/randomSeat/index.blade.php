@extends('layouts.sys')

@section('content')
<div class="container-fluid">


    <div class="row" style="min-height: calc(100vh - 65px - 56px); width: 100%;">
        <div class="container">
            <form action="{{ route('randomSeat.store') }}" method="POST" id="randomForm">
                @csrf
            </form>
            @include('components.alert')

                <div class="row mt-3">
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
                            <a id="randomBtn" class="btn btn-primary mt-2">Start Random</a>
                            <a id="saveBtn" class="btn btn-warning mt-2">儲存資料</a>
                        </div>
                    </form>
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
                    
                    <h5 class="modal-title">Input Student No</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="display:none" id="modal-warning" class="alert alert-warning">Can't find Student No In this class</div>
                    <div class="form-group">
                        <label for="StudentNo">StudentNo</label>
                        <input type="text" class="form-control" id="StudentNo" placeholder="Student No">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="saveModal" type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

    </script>

</div>
@endsection
