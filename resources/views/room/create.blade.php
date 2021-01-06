@extends('layouts.normal')

@section('content')
<div class="form-group">
    <button class="btn-primary btn" type="submit" form="addRoom" >Save</button>
</div>
<h3>Create Room Data</h3>

<form id="addRoom">
    <div class="form-group">
      <label for="formGroupExampleInput">Room Name</label>
      <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="type room name..">
    </div>
  </form>

@endsection