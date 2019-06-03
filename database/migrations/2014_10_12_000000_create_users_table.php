<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique();
            $table->integer('ban_id')->unique();
            $table->string('role');
            $table->string('position')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('upozila')->nullable();
            $table->string('union')->nullable();
            $table->string('ward')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('work_since')->nullable();
            $table->date('expired_date')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('emp_status')->nullable()->comment('1 = Active', '2 = Deactive');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
