<?php

use Illuminate\Database\Seeder;
use App\Show;

class ShowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $show = new Show();
        $show->name = 'test';
        $show->save();
    }
}
