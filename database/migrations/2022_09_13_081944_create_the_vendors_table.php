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
        Schema::create('the_vendors', function (Blueprint $table) {
            $table->id();
            $table->string("media_id")->nullable();
            $table->string("gallery_id")->nullable();
            $table->string("vendor_uri");
            $table->string("vendor_name");
            $table->string("vendor_shortdesc")->nullable();
            $table->string("vendore_text")->nullable();
            $table->integer("vendor_comment")->default("0");
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
        Schema::dropIfExists('the_vendors');
    }
};
