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

{{--
--------------------------------------------------------------------------------------
                            THE CURRENT POST CHOSEN
--}}

                            <div class="card flex-md-column mb-4 box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                    <strong class="d-inline-block mb-2 text-primary">Post</strong>


                                    <h3 class="mb-0"> {{$post->title}} </h3>

                                        <p class="card-text mb-auto">{{$post->body}}</p>

                                    <div class="mb-1 text-muted">Publisher: {{$post->user->username}}</div>
                                    <div class="mb-1 text-muted">{{$post->updated_at}}</div>


                                </div>

                            </div>
{{--
-------------------------------------------------------------------------------------
                            ALL THE COMMENTS UNDER POST
--}}
                            @forelse($post->comments as $comment)

                            <div class="card flex-md-column mb-4 box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                    <strong class="d-inline-block mb-2 text-success">Comment</strong>


                                    <div class="mb-0">

                                        <p class="card-text mb-auto">{{$comment->body}}</p>

                                        <p class="mb-1 text-muted">Publisher: {{$comment->user->username}}</p>

                                        <p class="mb-1 text-muted"> {{$comment->updated_at}}</p>



                                    </div>

                                </div>
{{--
     ---------------------------------------------Delete Comment------------------------------------
--}}

                                @if( $currentuser && $currentuser->id == $comment->user_id || $currentuser->admin)

                                    {!! Form::open(['route' => 'delete-comment', 'method' => 'DELETE', 'class' => 'text-right']) !!}

                                    <div class="container">

                                        {!! Form::hidden('comment_id',$comment->id) !!}

                                        <p class="text-right">{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</p>

                                    </div>
                                    {!! Form::close() !!}
                                @endif
                                @empty
                                    <p>No comments yet! Be the first</p>
                                @endforelse

                            </div>


{{--
--------------------------------------------------------------------------------------
                    ADD A COMMENT
--}}
                            {!! Form::open(['route' => 'add-comment']) !!}



                            {{--{!! Form::label('Title') !!}--}}

                            <div class="container">

                                 {!! Form::hidden('id',$post->id) !!}

                                {!! Form::textarea('body', null, ['id' => 'body', 'class' => 'form-control','placeholder' => 'Lets hear what you have to say!', 'required']) !!}</br>

                                {!! Form::submit('Comment') !!}

                            </div>


                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
