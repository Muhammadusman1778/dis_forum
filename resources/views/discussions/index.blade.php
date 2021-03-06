@extends('layouts.app')

@section('content')

    @foreach($discussions as $discussion)
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">

                    <div>
                        <img src="{{Gravatar::src($discussion->author->email)}}" alt="" width="40px" height="40px" style="border-radius:50%; ">
                        <strong class="ml-2"> {{$discussion->author->name}}</strong>
                    </div>
                    <div>
                        <a href="{{route('discussion.show',$discussion->slug)}}" class="btn btn-info">View</a>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="text-center">
                    <strong>
                        {{$discussion->title}}
                    </strong>
                </div>
            </div>
        </div>
    @endforeach
    {{$discussions->appends(['channel'=>request()->query('channel')])->links()}}
@endsection
