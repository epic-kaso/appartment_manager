<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 7:21 AM
     */

    namespace AppartmentManager\RequestValidators\Tenant;


    use AppartmentManager\RequestValidators\Validator;

    class ComplaintsValidator extends Validator
    {

        function getRules()
        {
            return [
                'complaint_body' => 'required',
                'category_ids'   => 'required|array'
            ];
        }
    }