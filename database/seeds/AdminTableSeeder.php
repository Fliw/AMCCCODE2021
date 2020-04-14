<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'identity' => '00.00.0000',
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('amccamikom')
        ]);
    }
}
