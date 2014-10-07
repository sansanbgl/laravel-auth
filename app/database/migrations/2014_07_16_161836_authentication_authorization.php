<?php
/**
 * Authorization Migration
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuthenticationAuthorization extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table)
        {
            $table->increments('id');
            $table->string('username', 64)->index()->nullable();
            $table->string('password')->nullable();
            $table->string('email', 128)->nullable();
            $table->string('homepage', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('fullname')->nullable();
            $table->string('birthplace', 100)->nullable();
            $table->string('bloodtype', 2)->nullable();
            $table->string('currentaddress')->nullable();
            $table->string('originaddress')->nullable();
            $table->string('postalcode', 5)->nullable();
            $table->string('contact', 20)->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('remember_token')->nullable();
            $table->dateTime('last_logtime')->nullable();
            $table->string('last_ip', 64)->nullable();
            $table->integer('group_role_id')->unsigned()->nullable();
            $table->boolean('enabled')->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });

        Schema::create('groups', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('level')->nullable();
            $table->boolean('enabled')->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('menus', function($table)
        {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->index()->nullable();
            $table->string('name')->index()->nullable();
            $table->string('url')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('enabled')->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('permissions', function($table)
        {
            $table->increments('id');
            $table->string('route')->index()->nullable();
            $table->boolean('enabled')->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('group_users', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('group_id')->unsigned()->index()->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('group_menus', function($table)
        {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->index()->nullable();
            $table->integer('menu_id')->unsigned()->index()->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();
        });

        Schema::create('group_permissions', function($table)
        {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->index()->nullable();
            $table->integer('permission_id')->unsigned()->index()->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('groups');
        Schema::drop('menus');
        Schema::drop('permissions');
        Schema::drop('group_users');
        Schema::drop('group_menus');
        Schema::drop('group_permissions');
    }

}
