<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStdLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('std_logs');
        Schema::create('std_logs', function (Blueprint $table) {
            //
            $table->increments('stdlog_id')->unsigned();
            $table->enum('stdlog_type', ['loging_in', 'loging_out', 'aliving_check', 'test_collection']);
            $table->string('stdlog_collection_uid');
            //
            $table->enum('collection_status', ['new_test', 'completed_test', 'checked_test', 'revised_by_sir'])->nullable();
            $table->string('data_dump', 5000)->nullable();
            $table->string('data_slot1', 2000)->nullable();
            $table->string('data_slot2', 2000)->nullable();
            $table->string('data_slot3', 2000)->nullable();
            //
            $table->string('std_uid_fk');
            $table->timestamp('acted_at');

            //$table->primary('stdlog_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('std_logs');
    }
}
