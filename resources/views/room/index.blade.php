@extends('layouts.sys')

@section('content')
<div class="container-fluid">


    @include('components.alert')
    
    <h3>Create Room Data</h3>
    
    <div class="row">
        <div class="col-auto my-2">
            <a href="{{route('room.create')}}" class="btn btn-primary m-1">Add Room</a>
            <a href="{{route('room.excel')}}" class="btn btn-secondary m-1">Download Excel</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">no</th>
                <th scope="col">name</th>
            </tr>
        </thead>
        <tbody>
            @if ($rooms->isNotEmpty())
                @foreach ($rooms as $room)
                    <tr>
                        <th class="align-middle" style="width: 10%" scope="row">{{ $room->id }}</th>
                        <td class="align-middle" style="width: 20%">{{ $room->no }}</td>
                        
                        <td class="align-middle" style="width: 20%">{{ $room->name }}</td>
                        
                        <td class="align-middle" style="width: 20%">
                            <div class="d-flex justify-content-around">
                                <button class="btn-sm btn-warning" data-id="{{ $room->id }}" data-toggle="modal"
                                    onclick="edit(this)">Edit</button>
                                <form action="{{ route('room.destroy', $room->id) }} }}" method="post" id="deleteRow">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn-sm btn-danger" type="submit" form="deleteRow">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td style="width: 25%">Nothing to show...</td>
                    <td style="width: 20%"></td>
                    <td style="width: 25%"></td>
                    <td style="width: 25%"></td>
                    <td style="width: 25%"></td>
                </tr>
            @endif
        </tbody>
    </table>
    {!! $rooms->links() !!}
    <script >
        $(document).ready(function(){
            bsCustomFileInput.init();
        })
        function edit(evt) {
            window.evt = evt;
            var tr = $(evt).closest('tr');
            var tds = tr.find('td');

            var id = tr.find('th');

            var no = tds[0];
            var name = tds[1];
            //console.log(row)
            var noText = $(no).text();
            var idText = $(id).text();
            var nameText = $(name).text();
            
            document.getElementById('id').value = idText;
            document.getElementById('no').value = noText;
            document.getElementById('name').value = nameText;
            
            $('#editModal').show();
            var editFormAction = "{{ route('room.index') }}" + '/' + idText;
            document.getElementById('editForm').action = editFormAction;
        }

    </script>

    <div class="modal" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modify room Data</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="$('#editModal').hide();"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row align-items-center">
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="" id="id"
                                    aria-describedby="id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="No" class="col-sm-2 col-form-label">No</label>
                            <div class="col-sm-10">
                                <input type="text" name="no" class="form-control" id="no" placeholder="No">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="name">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="editForm">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="$('#editModal').hide();">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
