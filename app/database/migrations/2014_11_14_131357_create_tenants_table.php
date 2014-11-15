<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class CreateTenantsTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('tenants', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email');
                $table->string('password');
                $table->string('phone');
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
            Schema::drop('tenants');
        }

    }
