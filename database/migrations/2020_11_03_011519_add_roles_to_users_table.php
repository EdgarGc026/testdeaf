<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolesToUsersTable extends Migration{

    public function up(){
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('student');
        });
    }

    public function down(){
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('role');
        });
    }
}
