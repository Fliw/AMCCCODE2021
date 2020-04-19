<?php

use Illuminate\Database\Seeder;

class CompetitionCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\CompetitionCategory::create([
            'name' => 'IT Business Idea',
        ]);

        App\Models\CompetitionCategory::create([
            'name' => 'Mobile Apps Development',
        ]);

        App\Models\CompetitionCategory::create([
            'name' => 'Web Apps Development',
        ]);
    }
}
