<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('facebook');
            $table->text('youtube');
            $table->text('google_plus');
            $table->text('hotline');
            $table->text('zalo');
            $table->text('email');
            $table->text('meta_title');
            $table->text('meta_keyword');
            $table->text('meta_description');
            $table->text('google_analytic');
            $table->text('copyright');
            $table->text('legal_regulations');
            $table->text('facebook_fb');
            $table->text('map');
            $table->text('logo');
            $table->text('order_success');
            $table->text('work_time');
            $table->text('branch_address');
            $table->text('about');
            $table->text('address');
            $table->text('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
