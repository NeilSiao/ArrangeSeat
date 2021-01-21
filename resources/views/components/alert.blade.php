@if (session('msg') !== null)
<div id="default-msg" class="alert alert-success">{{ session()->pull('msg') }}</div>
@endif

@if(!$errors->isEmpty())
    @foreach ($errors->all() as $error)
        <div id="default-error" class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

<script type="application/javascript">
    $('#default-msg').fadeIn(function(){
        $(this).delay(2000).fadeOut(1600)
    });
    
    $('#default-error').fadeIn(function(){
        $(this).delay(2000).fadeOut(1600)
    });
    
</script>