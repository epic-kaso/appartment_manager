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

        public function present($attr, $nobreaks = FALSE)
        {
            $cats = ComplaintComplaintsCategory::where('complaint_id', $this->id)
                ->with('complaints_category')
                ->get();
            $result = '';
            $prefix = $nobreaks == FALSE ? '<br/>' : '&nbsp;&nbsp;';
            //dd($cats->toJson());
            foreach ($cats as $cat) {
                $result .= "<label class='label label-default'>{$cat->complaints_category->name}</label>$prefix";
            }

            return $result;
        }

        public function clearAndDelete()
        {
            $com_cats = $this->complaint_complaints_category()->get();
            foreach ($com_cats as $c) {
                $c->delete();
            }

            $this->delete();
        }

        public function complaint_complaints_category()
        {
            return $this->hasMany('AppartmentManager\Models\ComplaintComplaintsCategory');
        }
    }