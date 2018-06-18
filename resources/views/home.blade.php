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
                        </div>@endif



                        <div class="p-3 mb-3 bg-light rounded">
                            <div class="col-md-15 px-0">
                                <h5 class="display-4 font-italic">Welcome {{$currentuser->username}}!</h5>
                                <h3 class="display-8 font-italic"> Your Bio: </h3>

                                <p class="lead my-3">{{$currentuser->bio}}</p>
                            </div>
                        </div>


{{--
  ----------------------------------------Display Post-----------------------------------
--}}

                    @forelse($posts as $post)



                        <div class="card flex-md-column mb-4 box-shadow h-md-250">

                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">Post</strong>


                                    <h3 class="mb-0">

                                        <a class="text-dark" href="{{ url('createblog/'.$post->id.'/comments') }}">{{$post->title}}</a>

                                    </h3>

                                <div class="mb-1 text-muted">{{$post->updated_at}}</div>
                                <div class="mb-1 text-muted">Publisher:  {{$post->user->username}}</div>

                                <p class="card-text mb-auto">{{$post->body}}</p>

{{--
  -----------------------------------Counts comments---------------------
--}}

                                    @if($post->comments->count() > 0)

                                        <li>{{$post->comments->count()}} comment(s)</li>

                                        @else

                                        <li>Be the first to reply</li>

                                    @endif
{{--
           --------------------------------------Edit Post------------------------------------------------
--}}

                                    @if( $currentuser && $currentuser->id == $post->user_id)

                                        <a href="{{ url($post->id.'/edit') }}">Edit</a>
                                    @endif


                            </div>

{{--
---------------------------------------------------Delete-----------------------------------------------------
--}}
                            @if( $currentuser && $currentuser->id == $post->user_id || $currentuser->admin)

                            {!! Form::open(['route' => 'delete-blog', 'method' => 'DELETE', 'class' => 'text-right']) !!}

                            <div class="container">

                                {!! Form::hidden('post_id',$post->id) !!}

                                <p class="btn btn-danger">{!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}</p>

                            </div>
                            {!! Form::close() !!}
                                @endif

                        </div>
                        @empty
                            <p>No posts yet</p>
                    @endforelse


                </div>
            </div>
        </div>
    </div>

    @yield('adminstuff')
</div>
@endsection
