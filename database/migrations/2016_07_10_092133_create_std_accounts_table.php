<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStdAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('std_accounts');
        Schema::create('std_accounts', function (Blueprint $table) {
            //
            $table->increments('std_id')->unsigned();
            $table->string('std_uname');
            $table->string('std_pwd');
            $table->string('std_uid');
            //
            $table->string('std_sn')->nullable();
            $table->string('std_rname')->nullable();
            $table->string('std_sex')->nullable();
            $table->timestamp('std_jdate');// 加入学校日期
            //
            $table->string('sir_uid_fk')->nullable();
            $table->string('std_schema')->nullable();// 学习进度
            //
            //$table->timestamp('created_at');
            $table->timestamps();
            $table->enum('activation', ['-1', '1'])->default('1');

            //$table->primary('std_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('std_accounts');
    }
}
