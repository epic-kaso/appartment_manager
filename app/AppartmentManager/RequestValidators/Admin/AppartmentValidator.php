<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 1:56 PM
     */

    namespace AppartmentManager\RequestValidators\Admin;


    use AppartmentManager\RequestValidators\Validator;

    class AppartmentValidator extends Validator
    {

        function getRules()
        {
            return [
                'block_name' => 'required',
                'block_size' => 'required|integer'
            ];
        }
    }