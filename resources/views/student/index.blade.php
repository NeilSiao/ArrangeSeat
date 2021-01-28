@extends('layouts.sys')

@section('content')
<div class="container-fluid">


    @include('components.alert')
    
    <h3>建立學生資料</h3>
    <div class="row">
        <div class="col-auto my-2">
            <a href="{{route('student.create')}}" class="btn btn-primary m-1">建立學生</a>
            <a href="{{route('student.excel')}}" class="btn btn-secondary m-1">Excel統計表格</a>

        </div>
    </div>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">學號</th>
                <th scope="col">相片</th>
                <th scope="col">姓名</th>
                <th scope="col">性別</th>
                <th scope="col">操作</th>
            </tr>
        </thead>
        <tbody>
            @if ($students->isNotEmpty())
                @foreach ($students as $index => $student)
                    <tr>
                        <th class="align-middle" style="width: 10%" scope="row" data-id="{{$student->id}}">{{ $index + 1  }}</th>
                        <td class="align-middle" style="width: 20%">{{ $student->no }}</td>
                        <td class="align-middle" style="width: 15%"><img width="64px" height="64px"
                                src="{{ $student->image->secure_url ?? asset('img/fake.png') }}" alt=""></td>
                        <td class="align-middle" style="width: 20%">{{ $student->name }}</td>
                        <td class="align-middle" style="width: 20%">{{ $student->gender }}</td>
                        <td class="align-middle" style="width: 20%">
                            <div class="d-flex justify-content-around">
                                <button class="btn-sm btn-warning" data-id="{{ $student->id }}" data-toggle="modal"
                                    onclick="edit(this)">編輯</button>
                                <form action="{{ route('student.destroy', $student->id) }} }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn-sm btn-danger" type="submit">刪除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td style="width: 25%">沒有學生相關資料...</td>
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
            var idText = $(id).data('id');
            console.log(idText);
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
                    <h5 class="modal-title">編輯學生資訊</h5>
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
                            <label for="No" class="col-sm-2 col-form-label">編號</label>
                            <div class="col-sm-10">
                                <input type="text" name="no" class="form-control" id="no" placeholder="No">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">姓名</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">相片: </label>
                            <div class="col-sm-10">
                                <img id="stu_img" height="64px" width="64px" src="" alt="">
                            </div>
                            <div class="col-auto">
                                <div class="input-group mt-3">
                                    <div class="custom-file">
                                        <input type="file" id="upload_img" name="upload_img" class="custom-file-input">
                                        <label for="upload_img" class="custom-file-label">選擇照片檔案</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">性別: </label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" value="M" id="genderMale" name="gender">
                                    <label class="form-check-label" for="gender">男生</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" value="F" id="genderFemale" name="gender">
                                    <label class="form-check-label" for="gender">女生</label>
                                </div>
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
</div>
@endsection
