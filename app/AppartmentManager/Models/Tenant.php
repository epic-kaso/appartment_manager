<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 1:04 PM
     */

    namespace AppartmentManager\Models;


    class Tenant extends \Eloquent
    {

        protected $guarded = ['id'];

        public function appartment()
        {
            return Appartment::where('tenant_id', $this->id)->first();
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