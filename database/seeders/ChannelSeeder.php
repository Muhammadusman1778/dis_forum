<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Channel;
use Illuminate\Support\Str;
class ChannelSeeder extends Seeder
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
            'slug'=>Str::slug('Laravel 9', '-')
        ]);

        Channel::create([
            'name'=>'Vue js',
            'slug'=>Str::slug('Vue js', '-')
        ]);

        Channel::create([
            'name'=>'Node js',
            'slug'=>Str::slug('Node js', '-')
        ]);

        Channel::create([
            'name'=>'Angularjs',
            'slug'=>Str::slug('Angular js', '-')
        ]);
    }
}
