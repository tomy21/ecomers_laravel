<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('id_mamber')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tlp');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('status');
            $table->string('wilayah');
            $table->string('images')->default('default.png');
            $table->boolean('is_admin')->default(false);
            $table->integer('role')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_mamber')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
