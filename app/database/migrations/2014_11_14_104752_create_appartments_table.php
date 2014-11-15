<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class CreateAppartmentsTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('appartments', function (Blueprint $table) {
                $table->increments('id');
                $table->string('appartment_id');
                $table->integer('unit_id')->index();
                $table->integer('tenant_id')->nullable();
                $table->boolean('is_vacant');
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
            Schema::drop('appartments');
        }

    }
