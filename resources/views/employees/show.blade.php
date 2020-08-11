@extends('adminlte::page')

@section('content_header')
    <h1>{{ $employee->name }}</h1>
@stop

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    {{ $employee->email }}
                </div>
                <div class="form-group">
                    <strong>Phone</strong>
                    {{ $employee->phone }}
                </div>
                <div class="form-group">
                    <strong>Company</strong>
                    {{ $employee->company->name }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <a class="btn btn-primary pull-right" href="{{ route('employees.index') }}">Back</a>
                <a class="btn btn-primary pull-left" href="{{ route('employees.edit', $employee) }}">Edit</a>
            </div>
        </div>
    </div>
@stop
