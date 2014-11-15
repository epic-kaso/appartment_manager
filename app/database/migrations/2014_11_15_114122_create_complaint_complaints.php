<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class CreateComplaintComplaints extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::table('complaints', function (Blueprint $table) {
                $table->dropColumn('complaints_category_id');
            });

            Schema::create('complaint_complaints_category', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('complaint_id')->index();
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
            Schema::drop('complaint_complaints_category');

            Schema::table('complaints', function (Blueprint $table) {
                $table->integer('complaints_category_id')->index();
            });
        }

    }
