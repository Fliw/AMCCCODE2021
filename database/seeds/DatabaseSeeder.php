<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(SchedulesTableSeeder::class);
        $this->call(CompetitionCategoriesTableSeeder::class);
        $this->call(HelpdesksTableSeeder::class);
        $this->call(NewsfeedsTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        
        Model::reguard();
    }
}
