<?php

use Illuminate\Database\Seeder;

class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Configuration::create([
            'key' => 'coming-soon',
            'type' => 'boolean',
            'value' => 'true',
            'active' => true,
            'deletable' => false
        ]);

        \App\Models\Configuration::create([
            'key' => 'email-logo',
            'type' => 'string',
            'value' => 'https://code.amcc.or.id/code2020/img/logo-128.png',
            'active' => true,
            'deletable' => false
        ]);

        \App\Models\Configuration::create([
            'key' => 'qr-dimension',
            'type' => 'integer',
            'value' => '512',
            'active' => true,
            'deletable' => false
        ]);

        \App\Models\Configuration::create([
            'key' => 'team-first-quest-title',
            'type' => 'string',
            'value' => 'Selamat datang Innovator!',
            'active' => true,
            'deletable' => false
        ]);

        \App\Models\Configuration::create([
            'key' => 'team-first-quest-content',
            'type' => 'string',
            'value' => 'Put your content here...',
            'active' => true,
            'deletable' => false
        ]);

        \App\Models\Configuration::create([
            'key' => 'team-ticket-1',
            'type' => 'string',
            'value' => 'team-1',
            'active' => true,
            'deletable' => false
        ]);

        \App\Models\Configuration::create([
            'key' => 'team-first-quest-status',
            'type' => 'string',
            'value' => 'issued',
            'active' => true,
            'deletable' => false
        ]);
    }
}
