<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CalculateActiveUser extends Command
{
    protected $signature = 'project:calculate-active-user';

    protected $description = '生成活跃用户';

    public function handle(User $user)
    {
        $this->info("开始计算...");

        $user->calculateAndCacheActiveUsers();

        $this->info("成功生成！");
    }
}
