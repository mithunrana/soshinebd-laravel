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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('techprotect')->nullable();
            $table->string('customertype');
            $table->text('companyname')->nullable();
            $table->string('servicetype')->nullable();
            $table->string('country')->nullable();
            $table->text('address')->nullable();
            $table->string('VerifyCode')->nullable();
            $table->text('image')->nullable();
            $table->date('BirthDate')->nullable();
            $table->date('EmployeeStatus')->default('NO');
            $table->date('TakeCare')->default(0);
            $table->date('Designation')->nullable();
            $table->text('Website')->nullable();
            $table->string('activestatus')->default('EndUserNotActive');
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
