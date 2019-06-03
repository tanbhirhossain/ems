<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('ban_id')->unique()->nullable(); // FOR ALL EMPLOYERS LAST DIGIT CODE XXXXX
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
        Schema::dropIfExists('profiles');
    }
}
