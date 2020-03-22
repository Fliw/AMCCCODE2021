<?php

use Illuminate\Database\Seeder;
use App\Models\CompetitionCategory;

class CompetitionCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CompetitionCategory::class, 3)->create();
    }
}
