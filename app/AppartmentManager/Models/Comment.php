<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 6:17 AM
     */

    namespace AppartmentManager\Models;


    class Comment extends \Eloquent
    {

        protected $guarded = ['id'];

        public function complaint()
        {
            return $this->belongsTo('AppartmentManager\Models\Complaint');
        }
    }