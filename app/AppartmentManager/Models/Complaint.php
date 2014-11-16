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

        public function complaints_categories()
        {
            return $this->belongsToMany(
                'AppartmentManager\Models\ComplaintsCategory',
                'complaint_complaints_category',
                'complaints_category_id'
            );
        }

        public function admins()
        {
            return $this->hasManyThrough('AppartmentManager\Models\Admin',
                'AppartmentManager\Models\ComplaintsCategory');
        }

        public function present($attr)
        {
            $cats = ComplaintComplaintsCategory::where('complaint_id', $this->id)
                ->with('complaints_category')
                ->get();
            $result = '';
            //dd($cats->toJson());
            foreach ($cats as $cat) {
                $result .= "<label class='label label-info'>{$cat->complaints_category->name}</label><br/>";
            }

            return $result;
        }
    }