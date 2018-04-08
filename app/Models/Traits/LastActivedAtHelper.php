<?php

namespace App\Models\Traits;

use Redis;
use Carbon\Carbon;

trait LastActivedAtHelper
{
    // 缓存相关
    protected $hash_prefix = 'project_last_actived_at_';
    protected $field_prefix = 'user_';

    public function recordLastActivedAt()
    {
        // 获取今日 Redis 哈希表名称
        $hash = $this->getHashFromDateString(Carbon::now()->toDateString());

        // 字段名称
        $field = $this->getHashField();

        // 当前时间
        $now = Carbon::now()->toDateTimeString();

        // 数据写入 Redis
        Redis::hSet($hash, $field, $now);
    }

    public function syncUserActivedAt()
    {
        // 获取昨日的哈希表名称
        $hash = $this->getHashFromDateString(Carbon::now()->subDay()->toDateString());

        // 从 Redis 中获取所有哈希表里的数据
        $dates = Redis::hGetAll($hash);

        // 遍历，并同步到数据库中
        foreach ($dates as $user_id => $actived_at) {
            $user_id = str_replace($this->field_prefix, '', $user_id);

            // 只有当用户存在时才更新到数据库中
            if ($user = $this->find($user_id)) {
                $user->last_actived_at = $actived_at;
                $user->save();
            }
        }

        // 以数据库为中心的存储，既已同步，即可删除
        Redis::del($hash);
    }

    public function getLastActivedAtAttribute($value)
    {
        // 获取今日对应的哈希表名称
        $hash = $this->getHashFromDateString(Carbon::now()->toDateString());

        $field = $this->getHashField();

        // 优先选择 Redis 的数据，否则使用数据库中
        $datetime = Redis::hGet($hash, $field) ? : $value;

        // 如果存在的话，返回时间对应的 Carbon 实体
        if ($datetime) {
            return new Carbon($datetime);
        } else {
        // 否则使用用户注册时间
            return $this->created_at;
        }
    }

    public function getHashFromDateString($date)
    {
        return $this->hash_prefix . $date;
    }

    public function getHashField()
    {
        return $this->field_prefix . $this->id;
    }
}
