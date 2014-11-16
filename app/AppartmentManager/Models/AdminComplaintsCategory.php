<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 5:50 PM
     */

    namespace AppartmentManager\Models;


    class AdminComplaintsCategory extends \Eloquent
    {
        protected $table = 'admin_complaints_category';
        protected $guarded = ['id'];

        public function admin()
        {
            return $this->belongsTo('AppartmentManager\Models\Admin');
        }

        public function complaintsCategory()
        {
            return $this->belongsTo('AppartmentManager\Models\ComplaintsCategory');
        }
    }