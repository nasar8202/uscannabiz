<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class EmailSettingsTableSeeder extends Seeder
{

    public function run()
    {
        \App\Models\EmailSetting::create([

            'mail_domain' => 'SMTP',
            'mail_host' => 'mailserver.laravelecommerce.com',
            'ssl' => 1,
            'mail_port' => 465,
            'from_address' => 'olivesupport@safedataxchange.com',
            'username' => 'olivesupport@safedataxchange.com',
            'password' => 'test123'
        ]);
    }
}
