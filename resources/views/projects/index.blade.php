@extends('layouts.app')


@section('content')
    <div class="col-md-6 col-lg-6 offset-md-2 offset-lg-3">
        <div class="card bg-primary text-white ">
            <div class="card-header">
                Projects <a class="btn btn-light float-right" href="/projects/create">Create New Projects</a>
            </div>
            <div class="card-body bg-light text-dark">
                <ul class="list-group list-group-flush">
                    @foreach ($projects as $project)
                        <li class="list-group-item"><a href="/projects/{{$project->id}}">{{$project->name}}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

@endsection
