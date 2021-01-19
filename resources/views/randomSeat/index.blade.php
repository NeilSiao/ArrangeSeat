@extends('layouts.sys')

@section('content')
    <div class="row" style="min-height: calc(100vh - 65px - 56px); width: 100%;">
        <div class="container">

            <div class="col-3">
                <div class="row mt-3 ">
                    <div class="col-auto form-group">
                        <label for="roomOption" class="form-label">教室選擇</label>
                        <select name="roomOption" id="roomOption" class="form-control">
                            @foreach ($roomOption as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto form-group">
                        <label for="classOption" class="form-label">班級選擇</label>
                        <select name="classOption" id="classOption" class="form-control">
                            @foreach ($teamOption as $team)
                                <option value="{{ $team->id }}"> {{ $team->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button id="randomBtn" class="btn btn-primary mt-2">Start Random</button>
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
    
    
    <div id="studentModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Input Student No</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
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
@endsection
