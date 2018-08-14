<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRolePermisson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('admin_roles', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name', 30)->default('');
             $table->string('description', 100)->default('');
             $table->timestamps();
        });

        Schema::create('admin_permissions', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name', 30)->default('');
             $table->string('description', 100)->default('');
             $table->timestamps();
        });

        Schema::create('role_permissions', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('role_id');
             $table->integer('permission_id');
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
        //
        Schema::dropIfExists('admin_roles');
        Schema::dropIfExists('admin_permissions');
        Schema::dropIfExists('role_permission');
    }
}
