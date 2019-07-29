<?php

use Illuminate\Database\Seeder;
use App\Episode;

class EpisodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $episode = new Episode();
        $episode->name = 'test episode';
        $episode->show_id = 1;
        $episode->link = 'DYLbAPkKqWQ';
        $episode->save();
    }
}
