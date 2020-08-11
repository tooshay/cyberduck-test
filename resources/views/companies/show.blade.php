@extends('adminlte::page')

@section('content_header')
    @if (isset($company->logo))
        <div>
            <img src='{{ URL::to('storage/app/'. $company->logo) }}'>
        </div>
    @endif
    <div>
        <h1>{{ $company->name }}</h1>
    </div>
@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <a href="mailto:{{$company->email}}">{{ $company->email }}</a>
                </div>
                <div class="form-group">
                    <strong>Website</strong>
                    <a href="{{$company->url}}">{{ $company->url }}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <a class="btn btn-primary pull-right" href="{{ route('companies.index') }}">Back</a>
                    <a class="btn btn-primary pull-left" href="{{ route('companies.edit', $company) }}">Edit</a>
                </div>
            </div>
        </div>
    </div>
@stop
