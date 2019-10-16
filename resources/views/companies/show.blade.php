@extends('layouts.app')
@section('content')

        <div class="row col-12 col-md-9 col-lg-9 col-sm-9 float-left">
            <div class="jumbotron col-sm-12">
                <div class="container">
                    <h1 class="display-4">{{$company->name}}</h1>
                    <p class="lead">{{$company->description}}</p>
                    <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>-->
                </div>
            </div>

            <div class="container">
                <div class="row col-lg-12 col-sm-12 col-md-12" style="background-color: #fff;padding: 10px 0">

                    @foreach ($company->projects as $project)
                        <div class="col-lg-4 " >
                            <h2>{{$project->name}}</h2>
                            <p>{{$project->description}}</p>
                            <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View Project »</a></p>
                        </div>
                    @endforeach


                </div>

            </div>
        </div>
    <div class="col-md-3 col-lg-3 float-right">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <h4 class="nav-link">
                        Actions
                    </h4>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companies/{{$company->id}}/edit">
                        Edit
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/projects/create/{{$company->id}}">
                        Add Project
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companies">
                        My Companies
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companies/create">
                        Create New Company
                    </a>
                </li>
                <li class="nav-item">
                    {!! Form::open(['action' => ['CompaniesController@destroy',$company->id], 'method' => 'delete']) !!}
                    	{!! Form::submit('Delete', ['class' => 'nav-link btn btn-link']) !!}
                    {!! Form::close() !!}
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="#">
                        Add New Members
                    </a>
                </li>-->

            </ul>
            <!--<ul class="nav flex-column">
                <li class="nav-item">
                    <h4 class="nav-link">
                        Members
                    </h4>
                </li>

            </ul>-->


        </div>
    </div>



@endsection

