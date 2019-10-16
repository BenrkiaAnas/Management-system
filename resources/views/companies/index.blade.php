@extends('layouts.app')


@section('content')
    <div class="col-md-6 col-lg-6 offset-md-2 offset-lg-3">
        <div class="card bg-primary text-white ">
            <div class="card-header">
                Companies <a class="btn btn-light float-right" href="/companies/create">Create New Company</a>
            </div>
            <div class="card-body bg-light text-dark">
                <ul class="list-group list-group-flush">
                    @foreach ($companies as $company)
                        <li class="list-group-item"><a href="/companies/{{$company->id}}">{{$company->name}}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

@endsection
