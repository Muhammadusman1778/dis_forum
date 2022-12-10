<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\MarkAsBestReplyAdded;




class Discussion extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'title',
        'slug',
        'reply_id',
        'content',
        'channel_id',
    ];

    public function author(){
        return $this->belongsTo(User::class,'user_id');

    }

    public function replies(){

        return $this->hasMany(Reply::class);

    }
    public function getRouteKeyName(){

        return 'slug';

    }

    public function markAsBestReply(Reply $reply){

        $this->update([

            'reply_id'=>$reply->id

        ]);

        if($reply->owner->id===$this->author->id){

            return;
        }

        $reply->owner->notify(new MarkAsBestReplyAdded($reply->discussion));


    }

    public function scopeFilterByChannels($builder){

        if(request()->query('channel')){

            //agar request hoti h channel ki by filete to ye database sy find kare ga

            $channel= Channel::where('slug',request()->query('channel'))->first();

            if($channel){

                //agar channel exist krta h tu wo match kare ga aur return b

                return $builder->where('channel_id',$channel->id);

            }

            return $builder;



        }



        return $builder;



    }

    public function bestReply(){


        return $this->belongsTo(Reply::class,'reply_id');
    }

}
