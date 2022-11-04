<x-app-layout>

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-header">Add Discussion</div>
                        @include('partials.error')
                        <div class="card-body">
                            <form action="{{route('discussion.store')}}" method="post">

                                @csrf

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <input id="content" type="hidden" name="content">
                                    <trix-editor input="content"></trix-editor>
                                </div>
                                <div class="form-group">
                                    <label for="channel">Channel</label>
                                    <select name="channel" id="channel" class="form-control">
                                        @foreach($channels as $channel)
                                        <option value="{{$channel->id}}">{{$channel->name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <button class="btn btn-success mt-2" type="submit" style="  background-color: green;">Create Discussion</button>


                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">




    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>


