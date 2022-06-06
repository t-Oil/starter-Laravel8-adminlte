<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreabannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('title');
            $table->string('image');
            $table->enum('target', ['_blank', '_self'])->default('_self');
            $table->enum('type', ['banner', 'link'])->default('banner');
            $table->longText('type_value')->nullable();
            $table->integer('ordinal_no')->nullable();
            $table->dateTime('start_datetime', 0)->nullable();
            $table->dateTime('end_datetime', 0)->nullable();
            $table->smallInteger('is_active');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
