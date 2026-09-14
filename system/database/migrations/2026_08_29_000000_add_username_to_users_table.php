<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable()->change();
        });

        $taken = [];
        DB::table('users')->orderBy('id')->get()->each(function ($user) use (&$taken) {
            $base = $user->email ? (string) explode('@', $user->email)[0] : 'user';
            $username = $base;
            $i = 1;
            while (isset($taken[$username])) {
                $username = $base.($i++);
            }
            $taken[$username] = true;

            DB::table('users')->where('id', $user->id)->update(['username' => $username]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);
            $table->dropColumn('username');
        });
    }
};