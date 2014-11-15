<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 1:56 PM
     */

    namespace AppartmentManager\RequestValidators;


    abstract class Validator
    {
        public function validate($input = [])
        {
            return \Validator::make($input, $this->getRules());
        }

        abstract function getRules();
    }