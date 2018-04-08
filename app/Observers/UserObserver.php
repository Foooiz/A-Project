<?php

namespace App\Observers;

use App\Models\User;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
    public function saving(User $user)
    {
        if (empty($user->avatar)) {
            $user->avatar = 'https://pic-1256191933.cos.ap-chengdu.myqcloud.com/8.jpg';
        }
    }
}
