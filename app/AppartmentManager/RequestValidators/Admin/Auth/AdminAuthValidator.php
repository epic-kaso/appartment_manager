<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 1:28 PM
     */

    namespace AppartmentManager\RequestValidators\Admin\Auth;


    use AppartmentManager\RequestValidators\Validator;

    class AdminAuthValidator extends Validator
    {

        function getRules()
        {
            return [
                'email'    => 'required|exists:admins',
                'password' => 'required|alpha_dash'
            ];
        }
    }