<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateWorkTranslationsTable
 */
class CreateWorkTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_translations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('work_id');
            $table->string('locale')->index();

            $table->string('title');
            $table->text('text');
            $table->string('description');


            $table->timestamps();
            $table->unique(['work_id', 'locale']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_translations');
    }
}
