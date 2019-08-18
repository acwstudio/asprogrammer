<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateIntroTranslationsTable
 */
class CreateIntroTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intro_translations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('intro_id');
            $table->string('locale')->index();

            $table->string('title');
            $table->text('text');
            $table->string('description');


            $table->timestamps();
            $table->unique(['intro_id', 'locale']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intro_translations');
    }
}
