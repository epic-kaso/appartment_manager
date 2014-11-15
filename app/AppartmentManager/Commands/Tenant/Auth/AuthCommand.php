<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 7:20 AM
     */

    namespace AppartmentManager\Commands\Tenant\Auth;


    use AppartmentManager\Commands\Command;
    use AppartmentManager\Exceptions\InvalidPasswordException;
    use AppartmentManager\Repository\Admin\AppartmentRepository;
    use AppartmentManager\Repository\Admin\TenantRepository;

    class AuthCommand implements Command
    {
        /**
         * @var AppartmentRepository
         */
        private $appartmentRepository;
        /**
         * @var TenantRepository
         */
        private $tenantRepository;


        /**
         * @param AppartmentRepository $appartmentRepository
         * @param TenantRepository $tenantRepository
         */
        function __construct(
            AppartmentRepository $appartmentRepository,
            TenantRepository $tenantRepository
        )
        {
            $this->appartmentRepository = $appartmentRepository;
            $this->tenantRepository = $tenantRepository;
        }

        public function execute($data = [])
        {
            return $this->loginTenant($data['appartment_id'], $data['password']);
        }

        public function loginTenant($appartment_id, $password)
        {
            $appartment = $this->appartmentRepository
                ->getAppartmentByAppartmentID($appartment_id);
            $tenant = $appartment->tenant;

            if ($tenant->verifyPassword($password)) {
                return $this->persistTenant($tenant);
            } else {
                throw new InvalidPasswordException('Invalid Password Supplied');
            }
        }

        private function persistTenant($tenant)
        {
            $this->tenantRepository->setCurrentTenant($tenant);

            return $tenant;
        }
    }