@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <tbody>
@foreach ($users as $user)
    <tr>
        @if(! $user->admin)
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>

            {{ Form::open(['method' => 'DELETE', 'route' => ['delete-user', $user->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}

        </td>
        @endif
    </tr>
@endforeach
</tbody>
                        @endsection