<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVocabulariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vocabularies');
        Schema::create('vocabularies', function (Blueprint $table) {
            //
            $table->increments('vocab_id')->unsigned();
            $table->string('vocab_book');
            $table->string('book_alias');
            $table->string('book_level');
            //
            $table->string('page_num')->nullable();
            $table->string('list_num')->nullable();
            $table->string('word_num')->nullable();
            //
            $table->string('word');
            $table->string('symbol');
            $table->string('property')->nullable();
            $table->string('sense');
            $table->string('details')->nullable();
            //
            $table->string('sirlog_opcode_fk');
            //$table->timestamp('imported_at');
            $table->timestamps();
            $table->enum('activation', ['-1', '1'])->default('1');
            //
            //$table->primary('vocab_id');
            //$table->foreign('opcode_fk')->references('sirlog_opcode')->on('sir_log')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vocabularies');
    }
}
