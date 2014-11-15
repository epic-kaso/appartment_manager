<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 11:28 PM
     */

    namespace AppartmentManager\RequestValidators\Admin;


    use AppartmentManager\RequestValidators\Validator;

    class AdminValidator extends Validator
    {

        function getRules()
        {
            return [
                'email'          => 'required|email|unique:admins',
                'name'           => '',
                'phone'          => 'required|digits:11',
                'password' => 'required|confirmed|alpha_dash',
                'is_super_admin' => ''
            ];
        }
    }