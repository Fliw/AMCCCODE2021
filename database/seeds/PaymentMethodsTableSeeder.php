<?php

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\PaymentMethod::create([
            'name' => 'Bank Transfer',
            'number' => '0123456789',
            'holder' => 'AMCC',
            'usable' => true
        ]);

        App\Models\PaymentMethod::create([
            'name' => 'On-site Stand',
            'number' => 'Basement 4 Citramart',
            'holder' => 'AMCC',
            'usable' => false
        ]);
    }
}
