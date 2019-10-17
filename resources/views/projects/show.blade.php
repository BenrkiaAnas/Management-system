@extends('layouts.app')
@section('content')

        <div class="row col-12 col-md-9 col-lg-9 col-sm-9 float-left">
            <div class="jumbotron col-sm-12">
                <div class="container">
                    <h1 class="display-4">{{$project->name}}</h1>
                    <p class="lead">{{$project->description}}</p>
                    <!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>-->
                </div>
            </div>

            <div class="container">
                <div class="col-lg-12 col-sm-12 col-md-12 pl-5 pr-5 pt-2" style="background-color: #fff;padding: 10px 0">
                    <!-- Start Display Comment -->
                    <h3 class=" mt-3">Recent Comment</h3>
                    @include('comments.comment')
                    <!-- Start The Form Of Comment Project -->
                    {!! Form::open(['action' => 'CommentsController@store', 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::hidden('commentable_type', 'App\Project') !!}
                        {!! Form::hidden('commentable_id',$project->id) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body', 'Comment') !!}
                        {!! Form::textarea('body', '', ['class' => 'form-control','placeholder' => 'Enter Comment', 'rows' => 5]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('url', 'Prof Of Work Done (Url/Photos)') !!}
                        {!! Form::textarea('url', '', ['class' => 'form-control','placeholder' => 'Enter Url Or Screenshots', 'rows' => 5]) !!}
                    </div>
                    {!! Form::submit('Comment', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    {{-- @foreach ($company->projects as $project)
                        <div class="col-lg-4 " >
                            <h2>{{$project->name}}</h2>
                            <p>{{$project->description}}</p>
                            <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View Project »</a></p>
                        </div>
                    @endforeach
                        --}}



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
                    <a class="nav-link" href="/projects/{{$project->id}}/edit">
                        Edit
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/projects">
                        My Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/projects/create">
                        Create New Project
                    </a>
                </li>
                <!-- Only Show Action Of Created Deleted Project For The One Who Create The Project-->
                @if ($project->user_id == Auth::id())
                    <li class="">
                        {!! Form::open(['action' => ['ProjectsController@destroy',$project->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'nav-link btn btn-link']) !!}
                        {!! Form::close() !!}
                    </li>
                @endif

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
            <hr>
            <h4 >Add Members</h4>
            <!-- Start The Part Of Adding User To Project Using Ajax -->
            <ul class="input-group mb-3">
                {!! Form::open(['action' => ['ProjectsController@adduser',$project->id], 'method' => 'post']) !!}
                    {!! Form::text('user', '', ['class' => 'form-control','placeholder' => "Add User"]) !!}
                    {!! Form::hidden('project_id',$project->id) !!}
                    <div class="input-group-append">
                        {!! Form::submit('Add User', ['class' => 'btn btn-outline-secondary']) !!}
                    </div>
                {!! Form::close() !!}
            </ul>

            <!-- Listing Member Of Project -->
            <ul class="nav flex-column">

                <li class="nav-item">
                    <h4 class="nav-link">
                        Team Members
                    </h4>
                </li>
                @foreach ($project->users as $user)
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{$user->name}}
                        </a>
                    </li>
                @endforeach


            </ul>

        </div>

    </div>



@endsection

