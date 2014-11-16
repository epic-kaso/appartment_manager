<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class CreateAdminComplaintsCategoryTable extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('admin_complaints_category', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('admin_id')->index();
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
            Schema::drop('admin_complaints_category');
        }

    }
