<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class CreateComplaintsTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('complaints', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('tenant_id');
                $table->text('description');
                $table->boolean('is_handled')->default(FALSE);
                $table->integer('complaints_category_id')->index();
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
            Schema::drop('complaints');
        }

    }
