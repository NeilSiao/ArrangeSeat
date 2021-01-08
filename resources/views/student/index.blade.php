@extends('layouts.sys')

@section('content')
    @if (session('msg') !== null)
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <h3>Create Student Data</h3>
    <a href="{{route('student.create')}}" class="btn btn-primary m-1">Add Student</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">no</th>
                <th scope="col">photo</th>
                <th scope="col">name</th>
                <th scope="col">gender</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @if ($students->isNotEmpty())
                @foreach ($students as $student)
                    <tr>
                        <th class="align-middle" style="width: 10%" scope="row">{{ $student->id }}</th>
                        <td class="align-middle" style="width: 20%">{{ $student->no }}</td>
                        <td class="align-middle" style="width: 15%"><img width="64px" height="64px"
                                src="{{ $student->photo }}" alt=""></td>
                        <td class="align-middle" style="width: 20%">{{ $student->name }}</td>
                        <td class="align-middle" style="width: 20%">{{ $student->gender }}</td>
                        <td class="align-middle" style="width: 20%">
                            <div class="d-flex justify-content-around">
                                <button class="btn-sm btn-warning" data-id="{{ $student->id }}" data-toggle="modal"
                                    onclick="edit(this)">Edit</button>
                                <form action="{{ route('student.destroy', $student->id) }} }}" method="post" id="deleteRow">
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
    {!! $students->links() !!}
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
            var photo = tds[1];
            var name = tds[2];

            var gender = tds[3];
            //console.log(row)
            var noText = $(no).text();
            var idText = $(id).text();
            //console.log(no);
            //console.log(noText);
            var src = $(photo).find('img').attr('src');

            var nameText = $(name).text();
            var genderText = $(gender).text();
            switch (genderText) {
                case 'M':
                    $('#genderMale').attr("checked", 'checked');
                    break;
                case 'F':
                    $('#genderFemale').attr("checked", 'checked');
                    break;
                default:
                    $('#genderFemale').attr("checked", '');
                    break;
            }
            document.getElementById('id').value = idText;
            document.getElementById('no').value = noText;
            document.getElementById('name').value = nameText;
            document.getElementById('stu_img').src = src;
            $('#editModal').show();
            var editFormAction = "{{ route('student.index') }}" + '/' + idText;
            document.getElementById('editForm').action = editFormAction;
        }

    </script>

    <div class="modal" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modify Student Data</h5>
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
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Photo: </label>
                            <div class="col-sm-10">
                                <img id="stu_img" height="64px" width="64px" src="" alt="">
                            </div>
                            <div class="col-auto">
                                <div class="input-group mt-3">
                                    <div class="custom-file">
                                        <input type="file" id="upload_img" name="upload_img" class="custom-file-input">
                                        <label for="upload_img" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Gender: </label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="genderMale" name="gender">
                                    <label class="form-check-label" for="gender">Male</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="genderFemale" name="gender">
                                    <label class="form-check-label" for="gender">Female</label>
                                </div>
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

@endsection
