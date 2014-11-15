<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 3:04 PM
     */

    namespace AppartmentManager\RequestValidators\Admin;


    use AppartmentManager\RequestValidators\Validator;

    class TenantValidator extends Validator
    {


        function getRules()
        {
            return [
                'last_name'     => 'required',
                'first_name'    => 'required',
                'email'         => 'required|email|unique:tenants',
                'phone'         => 'digits:11',
                'password' => 'required|confirmed|alpha_dash',
                'appartment_id' => 'integer'
            ];
        }
    }