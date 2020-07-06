<?php

use Discussion_forum\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name'=>'Laravel_5.8',
            'slug'=>str_slug('Laravel_5.8')
        ]);

        Channel::create([
            'name'=>'Vue js',
            'slug'=>str_slug('Vue js')
        ]);

        Channel::create([
            'name'=>'Node js',
            'slug'=>str_slug('Node js')
        ]);

        Channel::create([
            'name'=>'Angularjs',
            'slug'=>str_slug('Angularjs')
        ]);
    }
}
