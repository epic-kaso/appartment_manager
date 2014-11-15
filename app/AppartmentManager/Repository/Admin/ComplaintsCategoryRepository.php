<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 3:43 PM
     */

    namespace AppartmentManager\Repository\Admin;


    use AppartmentManager\Models\Admin;
    use AppartmentManager\Models\ComplaintsCategory;
    use AppartmentManager\Repository\CrudRepository;

    class ComplaintsCategoryRepository implements CrudRepository
    {


        /**
         * @var ComplaintsCategory
         */
        private $complaintsCategoryModel;

        function __construct(ComplaintsCategory $complaintsCategoryModel)
        {
            $this->complaintsCategoryModel = $complaintsCategoryModel;
        }

        public function create($data = [])
        {
            return $this->complaintsCategoryModel->create($data);
        }

        public function read($id, $data = [])
        {
            return $this->complaintsCategoryModel->findOrFail($id);
        }

        public function delete($id)
        {
            // TODO: Implement delete() method.
        }

        public function update($id, $data = [])
        {
            $admin_id = $data['admin_id'];
            unset($data['admin_id']);
            $m = $this->complaintsCategoryModel->findOrFail($id);
            $m->admin()->attach($id);

            return $m->update($data);

        }

        public function all($limit = 20)
        {
            if (!$limit) {
                return $this->complaintsCategoryModel->get();
            } else {
                return $this->complaintsCategoryModel->simplePaginate($limit);
            }

        }

        public function assignToAdmin($admin_id, ComplaintsCategory $category)
        {
            if (!empty($admin_id)) {
                return Admin::findOrFail($admin_id)->complaintsCategories()->save($category);
            } else {
                return TRUE;
            }

        }
    }