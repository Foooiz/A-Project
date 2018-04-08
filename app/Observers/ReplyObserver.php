<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;
use App\Events\NewNotification;

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    public function created(Reply $reply)
    {
        $topic = $reply->topic;
        $topic->increment('reply_count', 1);

        if ( ! $reply->user->isAuthorOf($topic)) {
            $topic->user->notify(new TopicReplied($reply));
            event(new NewNotification($topic->user->notification_count));
        }
    }

    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count', 1);
    }
}
