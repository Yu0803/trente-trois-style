<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
            /**
             * Run the migrations.
             */
            public function up()
        {
            Schema::table('users', function (Blueprint $table) {
                // $table->string('first_name')->nullable();
                // $table->string('last_name')->nullable();
                // $table->string('phone_number')->nullable();
                // $table->string('address1')->nullable();
                // $table->string('address2')->nullable();
                // $table->string('postal_code')->nullable();
                // $table->string('country')->nullable();
                // $table->enum('status', ['active', 'inactive'])->default('active');
            });
        }

        public function down()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn([
                    'first_name', 'last_name', 'phone_number', 'birth_of_date',
                    'address1', 'address2', 'postal_code', 'country', 'status',
                ]);
            });
        }
};