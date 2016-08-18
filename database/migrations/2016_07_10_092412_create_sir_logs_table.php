<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSirLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sir_logs');
        Schema::create('sir_logs', function (Blueprint $table) {
            //
            $table->increments('sirlog_id')->unsigned();
            $table->enum('sirlog_type', ['imported_book', 'rollbacked_book', 'fixed_word', 'permitted_test', 'revised_test']);
            $table->string('sirlog_opcode');
            //
            $table->string('data_dump')->nullable();
            $table->string('data_slot1')->nullable();
            $table->string('data_slot2')->nullable();
            $table->string('data_slot3')->nullable();
            //
            $table->string('sir_uid_fk');
            $table->timestamp('acted_at');

            //$table->primary('sirlog_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sir_logs');
    }
}
