<div class="card-header">
    <div class="d-flex justify-content-between">

        <div>
            <img src="{{ gravatar($discussion->author->email) }}" alt="" width="40px" height="40px" style="border-radius:50%; ">
            <strong class="ml-2"> {{$discussion->author->name}}</strong>
        </div>
        <div>
            <a href="{{route('discussion.show',$discussion->slug)}}" class="btn btn-info">View</a>
        </div>

    </div>
</div>
