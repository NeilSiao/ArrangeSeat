@extends('layouts.sys')

@section('content')
    @if (session('msg') !== null)
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <h3>Create Student Data</h3>
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
                            <div class="d-flex justify-content-between ">
                                <button class="btn-sm btn-warning mr-1" data-id="{{ $student->id }}"
                                   data-toggle="modal" data-target="#editModal"  >Edit</button>
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
    <script>
        function edit(evt) {
            var id = evt.dataset.id
            console.log(evt);
        }

    </script>

    <div class="modal show" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modify Student Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                          <label for="exampleInputEmail1">ID</label>
                          <input type="text" readonly class="form-control form-control-plaintext" id="studentId" aria-describedby="id">
                        </div>
                        <div class="form-group">
                          <label for="No">No</label>
                          <input type="text" class="form-control" id="No" placeholder="No">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="genderMale" name="gender" checked>
                                <label class="form-check-label" for="gender">Male</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="genderFemale" name="gender">
                                <label class="form-check-label" for="gender">Female</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
