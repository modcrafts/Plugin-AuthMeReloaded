<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAuthMe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('authme_username')->nullable();
            $table->smallInteger('authme_isLogged')->default(0);
            $table->smallInteger('authme_hasSession')->default(0);
            $table->string('authme_regip')->nullable();
            $table->double('authme_x')->default(0);
            $table->double('authme_y')->default(0);
            $table->double('authme_z')->default(0);
            $table->float('authme_yaw')->nullable();
            $table->float('authme_pitch')->nullable();

            $table->string('authme_world')->default('world');
            $table->bigInteger('authme_last_login_at')->nullable();
            $table->bigInteger('authme_created_at')->nullable();
            

        });
        DB::statement('UPDATE users SET authme_regip = last_login_ip, authme_username = name');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn('authme_username');
            $table->removeColumn('authme_isLogged');
            $table->removeColumn('authme_hasSession');
            $table->removeColumn('authme_regip');
            $table->removeColumn('authme_x');
            $table->removeColumn('authme_y');
            $table->removeColumn('authme_z');
            $table->removeColumn('authme_yaw');
            $table->removeColumn('authme_pitch');
            $table->removeColumn('authme_world');
            $table->removeColumn('authme_last_login_at');
            $table->removeColumn('authme_created_at');
        });
    }
}
