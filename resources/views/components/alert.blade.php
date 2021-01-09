@if (session('msg') !== null)
<div class="alert alert-success">{{ session('msg') }}</div>
@endif

@if(!$errors->isEmpty())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif