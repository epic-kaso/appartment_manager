<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 11:27 PM
     */

    namespace AppartmentManager\Commands\Admin;


    use AppartmentManager\Commands\Command;
    use AppartmentManager\Repository\Admin\AdminRepository;

    class AdminCommand implements Command
    {


        /**
         * @var AdminRepository
         */
        private $adminRepository;

        function __construct(
            AdminRepository $adminRepository
        )
        {
            $this->adminRepository = $adminRepository;
        }

        public function execute($data = [])
        {
            $admin = $this->createAdmin($data);

            return $admin;
        }

        private function createAdmin($data)
        {
            return $this->adminRepository->create($data);
        }


    }