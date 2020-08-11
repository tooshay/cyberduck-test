@extends('adminlte::page')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @isset($companies)
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Website</td>
                            <td>Email</td>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td><a href="{{ route('companies.show', $company) }}">{{ $company->name }}</a></td>
                                <td>{{ $company->url }}</td>
                                <td>{{ $company->email }}</td>
                                <td><a class="btn btn-primary" href="{{ route('companies.edit', ['company' => $company]) }}">edit</a></td>
                                <td>
                                    <form action="{{ route('companies.destroy', ['company' => $company]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <td colspan="6">{{ $companies->links() }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('companies.create') }}">New company</a>
                </div>
            </div>
        </div>
    @endisset
@stop


