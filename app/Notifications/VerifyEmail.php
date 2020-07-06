<?php

namespace Discussion_forum\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;


class VerifyEmail extends BaseVerifyEmail implements ShouldQueue
{
    use Queueable;


}
