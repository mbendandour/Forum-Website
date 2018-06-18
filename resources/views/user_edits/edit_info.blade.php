@extends('layouts.app')

@section('blogpost')
{!! Form::model($user, ['url' => 'edit_info']) !!}


{!! Form::hidden('user_id', $user->id) !!}



{{--{!! Form::label('Title') !!}--}}

<div class="container">

    {!! Form::label('username', 'Username') !!}

    {!! Form::text('username',null, ['id' => 'username', 'class' => 'form-control','placeholder' => 'Name this snazzy post!', 'required']) !!}</br>

    {!! Form::label('bio', 'Bio') !!}

    {!! Form::textarea('bio', null, ['id' => 'bio', 'class' => 'form-control','placeholder' => 'Let  your creative juices flow!', 'required']) !!}</br>

    {!! Form::submit('Save') !!}

</div>


{!! Form::close() !!}

    @stop