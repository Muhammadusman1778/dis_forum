<?php

namespace Discussion_forum;



class Reply extends Model
{
    public function owner(){

        return $this->belongsTo(User::class,'user_id');

    }

    public function discussion(){

        return $this->belongsTo(Discussion::class);

    }

}
