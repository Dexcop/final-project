<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('admin_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->timestamps();
        });

        DB::table('admins')->insert([
            'name' => 'admin',
            'admin_id' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'phone' => '0812312323',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
