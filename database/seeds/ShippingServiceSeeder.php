<?php

use Illuminate\Database\Seeder;

class ShippingServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usps = array(
            'env' => 'testing',
            'username' => '',
            'password' => '',
        );
        foreach ($usps as $item){
            \App\Models\ShippingService::create([
                'service_name' => 'USPS',
                'name' => $item,
                'value' => json_encode($usps),
            ]);
        }
    }
}
