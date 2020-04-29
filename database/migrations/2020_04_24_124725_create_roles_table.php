<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label')->nullable();
            $table->timestamps();
        });

       
//for relation rol & permission(1->n)
//table n is first in name in middle table(1->n)
        Schema::create('permission_role', function (Blueprint $table) {
        
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            
            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
//for not to repeat same row in middle table
            $table->primary(['role_id','permission_id']);
        });

        //for relation rol & user(n->n)
Schema::create('role_user', function (Blueprint $table) {
        
    $table->integer('role_id')->unsigned();
    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    
    $table->integer('user_id')->unsigned();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//for not to repeat same row in middle table
    $table->primary(['role_id','user_id']);
});



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
