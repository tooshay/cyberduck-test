@extends('adminlte::page')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    @isset($companies)
        <div class="box">
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td colspan = 2>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td><a href="{{ $company->url }}">{{ $company->name }}</a></td>
                                <td>{{ $company->email }}</td>
                                <td><a href="{{ route('companies.edit', ['company' => $company]) }}">update</a></td>
                                <td><a href="{{ route('companies.destroy', ['company' => $company]) }}">delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endisset
@stop


