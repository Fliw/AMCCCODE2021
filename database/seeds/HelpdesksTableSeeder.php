<?php

use Illuminate\Database\Seeder;

class HelpdesksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Helpdesk::create([
            'type' => 'confirmation',
            'name' => 'CP Konfirmasi',
            'target' => 'https://wa.me/',
            'workdays' => '1,2,3,4,5,6',
            'from' => '09:00',
            'to' => '18:00'
        ]);

        App\Models\Helpdesk::create([
            'type' => 'contact',
            'name' => 'CP Bantuan 1',
            'target' => 'https://wa.me/',
            'workdays' => '0',
            'from' => '09:00',
            'to' => '18:00'
        ]);
    }
}
