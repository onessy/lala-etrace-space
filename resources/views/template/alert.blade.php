@if(count($errors) >0 )
    @foreach($errors->all() as $error)
        <div class="d-flex alert alert-danger justify-content-sm-end w-auto">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="d-flex justify-content-sm-end  alert alert-success w-auto">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="d-flex justify-content-sm-end alert alert-danger w-auto">
        {{session('error')}}
    </div>
@endif
