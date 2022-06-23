<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $email_settings = \App\Models\EmailSetting::find(1);
        // \Config::set('mail.mailers.smtp.host', $email_settings->mail_host);
        // \Config::set('mail.mailers.smtp.port', $email_settings->mail_port);
        // \Config::set('mail.mailers.smtp.encryption', $email_settings->ssl);
        // \Config::set('mail.mailers.smtp.username', $email_settings->username);
        // \Config::set('mail.mailers.smtp.password', $email_settings->password);
        
        view()->composer('*', function ($view)
        {
            if(Auth::check()){
                $setting = \App\Models\Settings::find(1);
                //...with this variable
                $view->with('setting', $setting );
            }

        });
        Schema::defaultStringLength(191);

        
    }
}
