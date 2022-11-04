@extends('layouts.app')

@section('content')

    <div class="card card-default">
   @include('partials.discussion-header')

        <div class="card-body">
            <div class="text-center">
                <strong>
                    {{$discussion->title}}
                </strong>
            </div>
            <hr>

            {!! $discussion->content  !!}

          @if($discussion->bestReply)

            <div class="card bg-success my-5" style="color: white">
                <div class="card-header">
                    <div>
                        <div class="d-flex justify-content-between">
                            <div>

                                <img src="{{ gravatar()->avatar($discussion->bestReply->owner->email) }}" alt="" width="40px" height="40px" style="border-radius: 50%">
                                <strong>
                                    {{$discussion->bestReply->owner->name}}
                                </strong>
                            </div>
                            <div>
                                <strong>
                                    BEST REPLY
                                </strong>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! $discussion->bestReply->content !!}

                </div>
            </div>
            @endif
        </div>
    </div>





  @foreach($discussion->replies()->paginate(3) as $reply)

        <div class="card my-5">

            <div class="card-header">

                <div class="d-flex justify-content-between">

                 <div>

                     <img src="{{gravatar()->avatar($reply->owner->email)}}" alt="" width="40px" height="40px" style="border-radius: 50%">
                     <span>{{$reply->owner->name}}</span>

                 </div>
                    <div>
                       @auth
                        @if(auth()->user()->id===$discussion->user_id)

                            <form action="{{route('discussion.best-reply',['discussion'=>$discussion->slug,'reply'=>$reply->id])}}" method="post">

                                @csrf

                                <button class="btn btn-sm btn-primary" type="submit">
                                    mark as best reply
                                </button>


                            </form>


                        @endif



                        @endauth
                    </div>

                </div>

            </div>

            <div class="card-body">
                {!! $reply->content !!}
            </div>


        </div>

        @endforeach

    {{$discussion->replies()->paginate(3)->links('pagination::bootstrap-5')}}

 


    <div class="card my-5">
        <div class="card-header">Add a reply</div>
        <div class="card-body">
            @auth
            <form action="{{route('replies.store',$discussion->slug)}}" method="post">
                @csrf
                <input type="hidden" id="content" name="content">
                <trix-editor input="content"></trix-editor>

                <button class="btn btn-success btn-sm my-2" type="submit" style="  background-color: green;">
                    Add Reply
                </button>

            </form>
            @else
                <a href="{{route('login')}}" class="btn btn-info">Sign in to add a reply</a>

                @endauth

        </div>
    </div>
@endsection

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
@endsection
