<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 5:29 PM
     */

    namespace AppartmentManager\RequestValidators\Admin;


    use AppartmentManager\RequestValidators\Validator;

    class ComplaintsCategoryValidator extends Validator
    {

        protected $edit = FALSE;

        function setEditValidation()
        {
            $this->edit = TRUE;
        }

        function getRules()
        {

            $rules = [];

            if ($this->edit) {
                $rules = [
                    'name'        => 'required',
                    'description' => '',
                    'admin_id'    => 'integer'
                ];
            } else {
                $rules = [
                    'name'        => 'required|unique:complaints_categories',
                    'description' => '',
                    'admin_id'    => 'integer'
                ];
            }

            return $rules;
        }
    }