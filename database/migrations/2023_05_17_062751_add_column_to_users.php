<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->after('name')->nullable();
            $table->string('phone')->after('lastname')->nullable();
            $table->string('street_number')->after('phone')->nullable();
            $table->string('street_name')->after('street_number')->nullable();
            $table->string('city')->after('street_name')->nullable();
            $table->string('state')->after('city')->nullable();
            $table->string('zip_code')->after('state')->nullable();
            $table->string('ssn')->after('zip_code')->nullable();
            $table->enum('status', ['active', 'inactive']);

            $table->unsignedBigInteger('role_id')->nullable();
 
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('phone');
            $table->dropColumn('street_number');
            $table->dropColumn('street_name');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zip_code');
            $table->dropColumn('ssn');
            $table->dropColumn('status');

            $table->dropForeign('role_id');
        });
    }
};
