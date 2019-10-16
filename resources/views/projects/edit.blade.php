@extends('layouts.app')
@section('content')

    <div class="row col-12 col-md-9 col-lg-9 col-sm-9 float-left">

        <div class="container">
            <div class=" col-lg-12 col-sm-12 col-md-12 pl-5 pr-5 pt-2" style="background-color: #fff;padding: 10px 0">
                <h1>Update Project</h1>
                {!! Form::open(['action' => ['CompaniesController@update',$company->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $company->name, ['class' => 'form-control','placeholder' => 'Name Of Company']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', $company->description, ['class' => 'form-control','placeholder' => 'Description About Company']) !!}
                    </div>
                    {!! Form::submit('Edit Company', ['class' => 'btn btn-primary']) !!}
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
                    <a class="nav-link" href="/companies/{{$company->id}}">
                        View Companies
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/companies">
                        All Companies
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

