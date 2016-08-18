<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('options');
        Schema::create('options', function (Blueprint $table) {
            //
            $table->increments('opt_id')->unsigned();
            $table->enum('opt_level', ['global', 'sys', 'sir', 'std', 'testing']);
            $table->string('opt_key');
            $table->string('opt_value');
            //
            $table->string('sys_uid_fk')->nullable();
            $table->string('sir_uid_fk')->nullable();
            $table->string('std_uid_fk')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('chenged_at')->nullable();

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
        //
        Schema::drop('options');
    }
}
