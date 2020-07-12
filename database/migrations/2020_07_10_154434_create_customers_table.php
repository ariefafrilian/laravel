<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender');
            $table->string('city');
            $table->date('birth');
            $table->text('address');
            $table->string('email');
            $table->string('phone');
            $table->string('photo')->default('0');
            $table->unsignedTinyInteger('points')->default(0);
            $table->string('api_token')->default('0');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('code');
            $table->unique('email');
            $table->unique('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
