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

        public function setCurrentTenant($tenant)
        {
            \Session::set('tenant_id', $tenant->id);
        }

        public function getCurrentTenant()
        {
            $id = \Session::get('tenant_id', NULL);
            if (!$id) {
                return NULL;
            } else {
                return $this->read($id);
            }
        }

        public function read($id, $data = [])
        {
            if (empty($data)) {
                return $this->tenantModel->find($id)->first();
            }
        }

        public function unSetCurrentTenant()
        {
            \Session::forget('tenant_id');
        }

        public function getTenantByEmail($email)
        {
            return $this->tenantModel->where('email', $email)->first();
        }
    }