<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaypalStripCheckToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
           
           $table->enum('paypal_env',['Live','Testing'])->nullable();
           $table->string('paypal_client_id')->nullable(); 
           $table->string('paypal_secret_key')->nullable(); 
           $table->enum('stripe_env',['Live','Testing'])->nullable();
           $table->string('stripe_publishable_key')->nullable(); 
           $table->string('stripe_secret_key')->nullable();
           $table->enum('authorize_env',['Live','Testing'])->nullable();
           $table->string('authorize_merchant_login_id')->nullable(); 
           $table->string('authorize_merchant_transaction_key')->nullable();
            
           // $table->string('paypal_check')->nullable();
            // $table->string('stripe_check')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
