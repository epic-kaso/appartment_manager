<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 3:09 PM
     */

    namespace AppartmentManager\Commands;


    interface Command
    {

        public function execute($data = []);
    }