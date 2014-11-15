<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 5:18 PM
     */

    namespace AppartmentManager\Repository\Admin;


    use AppartmentManager\Models\Admin;
    use AppartmentManager\Repository\CrudRepository;

    class AdminRepository implements CrudRepository
    {


        /**
         * @var Admin
         */
        private $admin;

        function __construct(Admin $admin)
        {
            $this->admin = $admin;
        }

        public function create($data = [])
        {
            return $this->admin->create($data);
        }

        public function read($id, $data = [])
        {
            // TODO: Implement read() method.
        }

        public function delete($id)
        {
            // TODO: Implement delete() method.
        }

        public function update($id, $data)
        {
            // TODO: Implement update() method.
        }

        public function all($limit = 20)
        {
            return $this->admin->simplePaginate($limit);
        }

        public function getAdmins($withSuperUser = FALSE)
        {
            if ($withSuperUser) {
                return $this->admin->get();
            } else {
                return $this->admin->where('is_super_admin', '!=', TRUE)->get();
            }
        }

        public function getAdminsAsList($value, $key, $withSuperUser = FALSE)
        {
            if ($withSuperUser) {
                return $this->admin->lists($value, $key);
            } else {
                return $this->admin->where('is_super_admin', '!=', TRUE)->lists($value, $key);
            }
        }

        public function getSuperAdmin()
        {
            return $this->admin->where('is_super_admin', TRUE)->first();
        }


    }