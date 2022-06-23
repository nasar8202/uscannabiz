<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (\Schema::hasTable('email_settings')) {
            $mail = DB::table('email_settings')->first();
            if ($mail) //checking if table is not empty
            {
                $config = array(
                    'driver'     => $mail->mail_domain,
                    'host'       => $mail->mail_host,
                    'port'       => $mail->mail_port,
                    'encryption' => $mail->ssl,
                    'username'   => $mail->username,
                    'password'   => $mail->password,
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                    'MAIL_FROM_ADDRESS'    => $mail->from_address,
                );
                
                Config::set('mail', $config);
                //dd(Config::get('mail'));
            }
        }
    }

}
