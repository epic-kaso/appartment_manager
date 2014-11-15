<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 3:12 PM
     */

    namespace AppartmentManager\Commands\Admin;


    use AppartmentManager\Commands\Command;
    use AppartmentManager\Repository\Admin\AppartmentRepository;
    use AppartmentManager\Repository\Admin\TenantRepository;

    class TenantCommand implements Command
    {


        /**
         * @var TenantRepository
         */
        private $tenantRepository;
        /**
         * @var AppartmentRepository
         */
        private $appartmentRepository;

        function __construct(
            TenantRepository $tenantRepository,
            AppartmentRepository $appartmentRepository
        )
        {
            $this->tenantRepository = $tenantRepository;
            $this->appartmentRepository = $appartmentRepository;
        }

        public function execute($data = [])
        {
            return $this->start($data);
        }

        private function start($data)
        {
            //First Create Tenant
            $appartment_id = $data['appartment_id'];
            unset($data['appartment_id']);
            $tenant = $this->createTenant($data);

            //Assign Tenant to Appartment
            return $this->assignToAppartment($appartment_id, $tenant);
        }

        private function createTenant($data)
        {
            return $this->tenantRepository->create($data);
        }

        private function assignToAppartment($appartment_id, $tenant)
        {
            return $this->appartmentRepository->assignTenant($appartment_id, $tenant);
        }
    }