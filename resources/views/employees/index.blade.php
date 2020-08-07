@extends('adminlte::page')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    @isset($employees)
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Company</td>
                    <td colspan = 2>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td><a href="{{ route('employee.edit', ['id' => $employee->id]) }}">update</a></td>
                        <td><a href="{{ route('employee.destroy', ['id' => $employee->id]) }}">delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
@stop


