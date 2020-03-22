<?php

use Illuminate\Database\Seeder;
use App\Models\Helpdesk;

class HelpdesksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Helpdesk::class, 4)->create();
    }
}
