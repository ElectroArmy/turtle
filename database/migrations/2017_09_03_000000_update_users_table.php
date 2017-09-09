<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    public function up()
    {
        // add timezone column to users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('timezone')->default(config('app.timezone'));
        });

        // create admin user
        App\User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => Hash::make('admin123')]);
    }

    public function down()
    {
        // drop timezone columns from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('timezone');
        });
    }
}