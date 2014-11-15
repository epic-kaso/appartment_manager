<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 3:38 PM
     */

    namespace AppartmentManager\Models;


    class Admin extends \Eloquent
    {

        protected $guarded = ['id'];

        public function complaintsCategories()
        {
            return $this->belongsToMany('AppartmentManager\Models\ComplaintsCategory');
        }

        public function setPasswordAttribute($password)
        {
            $this->attributes['password'] = \Hash::make($password);
        }

        public function verifyPassword($password)
        {
            return \Hash::check($password, $this->attributes['password']);
        }
    }