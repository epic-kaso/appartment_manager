<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 7:22 AM
     */

    namespace AppartmentManager\RequestValidators\Tenant\Auth;


    use AppartmentManager\RequestValidators\Validator;

    class AuthValidator extends Validator
    {

        function getRules()
        {
            return [
                'appartment_id' => 'required|exists:appartments',
                'password'      => 'required'
            ];
        }
    }