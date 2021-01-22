@extends('layouts.sys')

@section('content')
<div id="app">

    <div class="container-fluid">
    @include('components.alert')
    <h3>建立團隊資料</h3>
    <div class="row">
        <div class="col-auto my-2">
            <a href="{{route('team.create')}}" class="btn btn-primary m-1">新增團隊</a>
            <a href="{{route('team.excel')}}" class="btn btn-secondary m-1">Excel 統計資料</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">團隊名稱</th>

                <th scope="col">操作</th>
            </tr>
        </thead>
        <tbody>
            @if ($teams->isNotEmpty())
                @foreach ($teams as $index => $Team)
                    <tr>
                        <th class="align-middle" style="width: 10%" scope="row" data-id={{$Team->id}}>{{ $index + 1  }}</th>
                        <td class="align-middle" style="width: 20%">{{ $Team->name }}</td>
                        <td class="align-middle" style="width: 20%">
                            <div class="d-flex">
                                <button class="btn-sm btn-info mr-3" data-id="{{ $Team->id }}" data-toggle="modal"
                                    @@click="open">綁定學生</button>
                                <button class="btn-sm btn-warning mr-3" data-id="{{ $Team->id }}" data-toggle="modal"
                                    onclick="edit(this)">編輯</button>
                                <form action="{{ route('team.destroy', $Team->id) }} }}" method="post" id="deleteRow">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn-sm btn-danger" type="submit" form="deleteRow">刪除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td style="width: 25%">沒有團隊資料可以顯示...</td>
                    <td style="width: 20%"></td>
                    <td style="width: 25%"></td>
                    <td style="width: 25%"></td>
                    <td style="width: 25%"></td>
                </tr>
            @endif
        </tbody>
    </table>
    {!! $teams->links() !!}
  
    {{-- Edit Team Modal Start  --}}
    <div class="modal" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">編輯團隊資料</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="$('#editModal').hide();"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row align-items-center d-none">
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="" id="id"
                                    aria-describedby="id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">團隊名稱</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Team Name">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="editForm">儲存資料</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="$('#editModal').hide();">關閉視窗</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Team Modal End --}}

    {{-- Choose Student Modal --}}
        <student-modal v-if="showModal"  v-bind:team-id="selTeamId" @@close="showModal=false;"></student-modal>
    {{-- Choose Student Modal End --}}

</div>
</div>
<script src="{{ asset('js/team.js') }}"></script>
@endsection
