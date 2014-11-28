<?php

    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/28/2014
     * Time: 10:35 AM
     */
    class AdminSeeder extends Seeder
    {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $admin = \AppartmentManager\Models\Admin::where(['email' => 'kasoprecede47@gmail.com']);
            if ($admin) {
                $admin->delete();
            }

            $admin = new \AppartmentManager\Models\Admin();
            $admin->email = 'kasoprecede47@gmail.com';
            $admin->password = 'johnbull';
            $admin->save();
        }

    }
