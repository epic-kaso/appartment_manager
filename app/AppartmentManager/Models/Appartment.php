<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 1:00 PM
     */

    namespace AppartmentManager\Models;


    class Appartment extends \Eloquent
    {

        protected $guarded = ['id'];

        public function block()
        {
            return $this->unit->block;
        }

        public function unit()
        {
            return $this->belongsTo('AppartmentManager\Models\Unit');
        }

        public function tenant()
        {
            return $this->belongsTo('AppartmentManager\Models\Tenant');
        }

        public function tenant_name()
        {
            if (!$this->tenant) {
                return 'None';
            } else {
                return $this->tenant->last_name . ' ' . $this->tenant->first_name . ' [ ' . $this->tenant->phone . ' ]';
            }

        }

        public function getFullNameAttribute()
        {
            return "{$this->unit->block->name} {$this->unit->name}";
        }


    }