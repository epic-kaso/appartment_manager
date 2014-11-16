<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 3:24 PM
     */

    namespace AppartmentManager\Models;


    class ComplaintComplaintsCategory extends \Eloquent
    {

        protected $table = 'complaint_complaints_category';
        protected $guarded = ['id'];

        public function complaint()
        {
            return $this->belongsTo('AppartmentManager\Models\Complaint');
        }

        public function complaints_category()
        {
            return $this->belongsTo('AppartmentManager\Models\ComplaintsCategory');
        }
    }