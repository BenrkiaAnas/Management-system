@extends('layouts.app')
@section('content')

    <div class="row col-12 col-md-9 col-lg-9 col-sm-9 float-left">

        <div class="container">
            <div class=" col-lg-12 col-sm-12 col-md-12 pl-5 pr-5 pt-2"  style="background-color: #fff;padding: 10px 0">
                <h1>Create New Project</h1>
                {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', '', ['class' => 'form-control','placeholder' => 'Name Of Project']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', '', ['class' => 'form-control','placeholder' => 'Description About Project']) !!}
                </div>
                <div class="form-group">
                    @if (!empty($companies))
                        <select class="form-control" name="company_id">
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                        {{--
                        {!! Form::label('company', 'Select Company') !!}
                        {!! Form::select('company_id', $companies , null , ['class' => 'form-control']) !!}
                        --}}
                    @endif
                </div>
                @if (empty($companies))
                    <div class="form-group">
                        {!! Form::hidden('company_id', $company_id) !!}
                    </div>
                @endif

                {!! Form::submit('Create Project', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
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
                    <a class="nav-link" href="/projects">
                        My Projects
                    </a>
                </li>



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


