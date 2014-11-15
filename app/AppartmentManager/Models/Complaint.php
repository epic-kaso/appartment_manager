<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 6:17 AM
     */

    namespace AppartmentManager\Models;


    class Complaint extends \Eloquent
    {

        protected $guarded = ['id'];

        public function comments()
        {
            return $this->hasMany('AppartmentManager\Models\Comment');
        }

        public function tenant()
        {
            return $this->belongsTo('AppartmentManager\Models\Tenant');
        }

        public function complaints_category()
        {
            return $this->belongsTo('AppartmentManager\Models\ComplaintsCategory');
        }
    }