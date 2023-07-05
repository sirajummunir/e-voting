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
            $table->string('name', 191);
            $table->string('nid', 20)->unique();
            $table->string('image', 200)->default('male');
            $table->timestamp('birthday')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('present_division');
            $table->string('present_district');
            $table->string('present_upazilla');
            $table->string('present_village');
            $table->string('present_po');
            $table->string('present_pc');
            $table->string('permanent_division');
            $table->string('permanent_district');
            $table->string('permanent_upazilla');
            $table->string('permanent_village');
            $table->string('permanent_po');
            $table->string('permanent_pc');
            $table->string('religion');
            $table->string('marital'); // 0 => false, 1=>true
            $table->string('gender');  // male,female, others keys
            $table->string('blood', 4);
            $table->string('occupation');
            $table->string('mobile');
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
