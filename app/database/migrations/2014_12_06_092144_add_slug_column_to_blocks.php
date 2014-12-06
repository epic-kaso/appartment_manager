<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class AddSlugColumnToBlocks extends Migration
    {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('blocks', function (Blueprint $table) {
                $table->string('slug')->index();
            });

            $blocks = \AppartmentManager\Models\Block::get();
            foreach ($blocks as $block) {
                if (empty($block->slug)) {
                    $block->slug = \Str::slug($block->name . rand(10000000, 99999999));
                    $block->save();
                }
            }
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('blocks', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }

    }
