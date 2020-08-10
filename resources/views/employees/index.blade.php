@extends('adminlte::page')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @isset($employees)
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Company</td>
                            <td colspan=2>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td><a href="{{ route('employees.show', $employee) }}">{{ $employee->name }}</a></td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td><a class="btn btn-primary" href="{{ route('employees.edit', ['employee' => $employee]) }}">edit</a></td>
                                <td>
                                    <form action="{{ route('employees.destroy', ['employee' => $employee]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <td colspan="7">{{ $employees->links() }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('employees.create') }}">New employee</a>
                </div>
            </div>
        </div>
    @endisset
@stop


