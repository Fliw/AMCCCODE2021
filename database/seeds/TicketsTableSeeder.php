<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Ticket::create([
            'name' => 'Placeholder Tim I',
            'slug' => 'team-1',
            'price' => 100000,
            'stock' => 50,
            'buyable' => false
        ]);

        App\Models\Ticket::create([
            'name' => 'Placeholder Tim II',
            'slug' => 'team-2',
            'price' => 50000,
            'stock' => 30,
            'buyable' => false
        ]);

        App\Models\Ticket::create([
            'name' => 'Placeholder Seminar I',
            'slug' => '-',
            'price' => 30000,
            'stock' => 50,
            'buyable' => false
        ]);

        App\Models\Ticket::create([
            'name' => 'Placeholder Seminar II',
            'slug' => '-',
            'price' => 40000,
            'stock' => 50,
            'buyable' => false
        ]);

        App\Models\Ticket::create([
            'name' => 'Placeholder Seminar III',
            'slug' => '-',
            'price' => 50000,
            'stock' => 50,
            'buyable' => false
        ]);
    }
}
