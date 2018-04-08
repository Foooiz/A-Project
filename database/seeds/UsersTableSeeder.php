<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = app(Faker\Generator::class);

        $avatars = [
            'https://pic-1256191933.cos.ap-chengdu.myqcloud.com/3.jpg',
            'https://pic-1256191933.cos.ap-chengdu.myqcloud.com/4.jpg',
            'https://pic-1256191933.cos.ap-chengdu.myqcloud.com/5.jpg',
            'https://pic-1256191933.cos.ap-chengdu.myqcloud.com/6.jpg',
            'https://pic-1256191933.cos.ap-chengdu.myqcloud.com/7.jpg',
            'https://pic-1256191933.cos.ap-chengdu.myqcloud.com/8.jpg',
        ];

        $users = factory(User::class)
                        ->times(10)
                        ->make()
                        ->each(function ($user, $index)
                            use ($faker, $avatars)
        {
            $user->avatar = $faker->randomElement($avatars);
        });

        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        User::insert($user_array);

        $user = User::find(1);
        $user->name = 'test';
        $user->email = 'test@test.com';
        $user->avatar = 'https://pic-1256191933.cos.ap-chengdu.myqcloud.com/1.jpg';
        $user->save();

        $user->assignRole('Founder');


        $user = User::find(2);
        $user->name = 'test2';
        $user->email = 'test2@test.com';
        $user->avatar = 'https://pic-1256191933.cos.ap-chengdu.myqcloud.com/2.jpg';
        $user->save();

        $user = User::find(2);
        $user->assignRole('Maintainer');
    }
}
