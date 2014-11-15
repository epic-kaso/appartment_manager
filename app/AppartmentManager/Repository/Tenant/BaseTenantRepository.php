<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 6:47 AM
     */

    namespace AppartmentManager\Repository\Tenant;


    use AppartmentManager\Models\Tenant;
    use AppartmentManager\Repository\CrudRepository;

    class BaseTenantRepository implements CrudRepository
    {
        /**
         * @var Tenant
         */
        private $tenant;

        public function getTenant()
        {
            $this->ensureTenantIsPresent();

            return $this->tenant;
        }

        public function setTenant(Tenant $tenant)
        {
            $this->tenant = $tenant;
        }

        private function ensureTenantIsPresent()
        {
            if (!$this->tenant)
                throw new \Exception('You need to Set Tenant First');
        }

        public function create($data = [])
        {
            $this->ensureTenantIsPresent();
        }

        public function read($id, $data = [])
        {
            $this->ensureTenantIsPresent();
        }

        public function delete($id)
        {
            $this->ensureTenantIsPresent();
        }

        public function update($id, $data)
        {
            $this->ensureTenantIsPresent();
        }

        public function all($limit = 20)
        {
            $this->ensureTenantIsPresent();
        }
    }