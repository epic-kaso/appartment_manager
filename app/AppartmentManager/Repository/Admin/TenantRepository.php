<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 2:42 PM
     */

    namespace AppartmentManager\Repository\Admin;


    use AppartmentManager\Models\Tenant;
    use AppartmentManager\Repository\CrudRepository;

    class TenantRepository implements CrudRepository
    {


        /**
         * @var Tenant
         */
        private $tenantModel;

        function __construct(Tenant $tenantModel)
        {
            $this->tenantModel = $tenantModel;
        }

        public function create($data = [])
        {
            return $this->tenantModel->create($data);
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
            return $this->tenantModel->simplePaginate($limit);
        }
    }