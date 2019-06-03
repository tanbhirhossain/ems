<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //POSTED USER ID
            $table->text('news_title');
            $table->longText('news_details');
            $table->string('fetured_image')->nullable();
            $table->string('others_1')->nullable();
            $table->string('others_2')->nullable();
            $table->string('others_3')->nullable();
            $table->string('others_4')->nullable();
            $table->string('others_5')->nullable();
            $table->string('others_6')->nullable();
            $table->integer('isDel')->nullable()->comments('1 = Deleted', 'Null = Not Delete');
            $table->integer('status')->nullable()->comments('Null = Review', '1 = Published', '2 = Violated Post');
            $table->integer('isPub')->nullable()->comments('Null = No', '1 = Yes' );
            $table->integer('trash')->nullable()->comments('Null = Not Delete', '1 = Deleted');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
