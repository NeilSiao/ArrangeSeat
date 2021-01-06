@extends('layouts.sys')

@section('content')
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
                        <td class="align-middle" style="width: 15%"><img width="64px" height="64px" src="{{$student->photo}}" alt=""></td>
                        <td class="align-middle" style="width: 20%">{{ $student->name }}</td>
                        <td class="align-middle" style="width: 20%">{{ $student->gender }}</td>
                        <td class="align-middle" style="width: 20%" >
                            <div class="d-flex justify-content-between ">
                                <button class="btn-sm btn-warning mr-1" data-id="{{$student->id}}" onclick="edit(this)">Edit</button>
                                <button class="btn-sm btn-danger" data-id="{{$student->id}}" onclick="remove(this)">Delete</button>
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
    {!!  $students->links() !!}

    <script>
        function remove(evt){
            var parent = $(evt).parent().parent().parent().fadeOut();
            console.log(parent);
            var id = evt.dataset.id
            console.log(evt);
            console.log(evt);
        }
        function edit(evt){
            var id = evt.dataset.id
            console.log(evt);
        }

    </script>
@endsection
