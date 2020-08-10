@extends('adminlte::page')

@section('content_header')
    <h1>{{ $company->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                {{ $company->email }}
            </div>
            <div class="form-group">
                <strong>Website</strong>
                {{ $company->url }}
            </div>
            <div class="form-group">
                <strong>Website</strong>
                {{ $company->url }}
            </div>
            <img src='{{ URL::to('storage/app/'. $company->logo) }}'>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}">Back</a>
            </div>
        </div>
    </div>
@stop
