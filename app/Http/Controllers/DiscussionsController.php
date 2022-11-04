<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\NewReplyAdded;
class DiscussionsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified'])->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions.index')->with(['discussions'=>Discussion::filterByChannels()->paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->discussions()->create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title,'-'),
            'content'=>$request->content,
            'channel_id'=>$request->channel

        ]);
        session()->flash('success','Disscussion posted.');
        return redirect(route('discussion.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view('discussions.show',['discussion'=>$discussion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        //
    }
    public function reply(Discussion $discussion,Reply $reply)
    {


        $discussion->markAsBestReply($reply);
        $discussion->author->notify(new NewReplyAdded($discussion));
        session()->flash('success','Mark as best reply');

        return redirect()->back();
    }
    public function dashboard(){
        return view('layouts.app');
    }

}
