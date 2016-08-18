<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSirAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sir_accounts');
        Schema::create('sir_accounts', function (Blueprint $table) {
            //
            $table->increments('sir_id')->unsigned();
            $table->string('sir_uname');
            $table->string('sir_pwd');
            $table->string('sir_uid');
            //
            $table->string('sir_sn')->nullable();
            $table->string('sir_rname')->nullable();
            $table->string('sir_sex')->nullable();
            $table->string('sir_level')->nullable();            
            //
            //$table->timestamp('created_at');
            $table->timestamps();
            $table->enum('activation', ['-1', '1'])->default('1');

            //$this->primary('sir_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sir_accounts');
    }
}
