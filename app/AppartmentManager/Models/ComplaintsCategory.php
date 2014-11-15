<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 3:39 PM
     */

    namespace AppartmentManager\Models;


    class ComplaintsCategory extends \Eloquent
    {

        protected $guarded = ['id'];

        public function admin()
        {
            return $this->belongsToMany('AppartmentManager\Models\Admin');
        }

        public function admin_name()
        {
            if (!$this->admin) {
                return '';
            } else {
                $admins = $this->admin;
                $name = '';
                foreach ($admins as $admin) {
                    $name .= $admin->email . ',';
                }

                return $name;
            }
        }

        public function complaints()
        {
            return $this->belongsToMany('AppartmentManager\Models\Complaint');
        }
    }