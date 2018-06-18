
@extends('layouts.app')

@section('blogpost')

{!! Form::open(['url' => '/createblog']) !!}



{{--{!! Form::label('Title') !!}--}}

<div class="container">

{!! Form::label('title', 'Title') !!}

{!! Form::text('title',null, ['id' => 'title', 'class' => 'form-control','placeholder' => 'Name this snazzy post!', 'required']) !!}</br>

{!! Form::label('body', 'Body') !!}

{!! Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control','placeholder' => 'Let  your creative juices flow!', 'required']) !!}</br>

{!! Form::submit('Publish') !!}

</div>


{!! Form::close() !!}

@stop