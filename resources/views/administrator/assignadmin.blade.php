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
                                @if( $user->admin )
                                    <b>Admin: </b>
                                @endif
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>

                                        {{ Form::open(['route' => ['assign-admin', $user->id]]) }}

                                        @if (! ($currentuser->id == $user->id))
                                        {{ Form::submit('Change Role', ['class' => 'btn btn-danger']) }}
                                        @endif

                                            {{ Form::close() }}




                                    </td>

                            </tr>
                        @endforeach
                        </tbody>
@endsection