
@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

@foreach($discussions as $discussion)
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">

            <div>
                <img src=" {{ gravatar($discussion->author->email) }}" alt="" width="40px" height="40px" style="border-radius:50%; ">
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

            </div>
        </div>
    </div>
</div>
@endsection

