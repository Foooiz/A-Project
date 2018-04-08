<?php

use Illuminate\Database\Seeder;
use App\Models\Link;

class LinksTableSeeder extends Seeder
{
    public function run()
    {
        $links = factory(Link::class)->times(6)->make();

        Link::insert($links->toArray());
    }
}
