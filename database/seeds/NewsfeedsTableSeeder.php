<?php

use Illuminate\Database\Seeder;
use App\Models\Newsfeed;

class NewsfeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Newsfeed::class, 10)->create();
    }
}
