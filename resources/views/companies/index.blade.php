@extends('adminlte::page')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    @isset($companies)
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>URL</td>
                    <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->url }}</td>
                        <td><a href="{{ route('company.edit', ['id' => $company->id]) }}">update</a></td>
                        <td><a href="{{ route('company.destroy', ['id' => $company->id]) }}">delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
@stop


