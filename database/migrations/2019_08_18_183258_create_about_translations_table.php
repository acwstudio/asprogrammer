<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAboutTranslationsTable
 */
class CreateAboutTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_translations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('about_id');
            $table->string('locale')->index();

            $table->string('title');
            $table->text('text');
            $table->string('description');


            $table->timestamps();
            $table->unique(['about_id', 'locale']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_translations');
    }
}
