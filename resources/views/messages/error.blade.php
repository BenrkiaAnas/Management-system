<!-- Display Error Message -->
@if (count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
<!-- Displaying The Error Of The Session -->
@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
