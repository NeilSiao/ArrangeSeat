@if (session('msg') !== null)
<div id="default-msg" class="alert alert-success">{{ session()->pull('msg') }}</div>
@endif

@if(!$errors->isEmpty())
    <div id="default-error">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
        @endforeach
    </div>
@endif

<script type="application/javascript">
    $('#default-msg').fadeIn(function(){
        $(this).delay(4000).fadeOut(1600)
    });
    
    $('#default-error').fadeIn(function(){
        $(this).delay(4000).fadeOut(1600)
    });
    
</script>