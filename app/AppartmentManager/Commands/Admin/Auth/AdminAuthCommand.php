<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 1:27 PM
     */

    namespace AppartmentManager\Commands\Admin\Auth;


    use AppartmentManager\Commands\Command;
    use AppartmentManager\Exceptions\InvalidPasswordException;
    use AppartmentManager\Repository\Admin\AdminRepository;

    class AdminAuthCommand implements Command
    {

        private $adminRepository;


        /**
         * @param AdminRepository $adminRepository
         */
        function __construct(
            AdminRepository $adminRepository
        )
        {
            $this->adminRepository = $adminRepository;
        }

        public function execute($data = [])
        {
            return $this->loginAdmin($data['email'], $data['password']);
        }

        /**
         * @param $email
         * @param $password
         * @return mixed
         * @throws InvalidPasswordException
         */
        public function loginAdmin($email, $password)
        {
            $admin = $this->adminRepository
                ->getAdminByEmail($email);

            if ($admin->verifyPassword($password)) {
                return $this->persistAdmin($admin);
            } else {
                throw new InvalidPasswordException('Invalid Password Supplied');
            }
        }

        private function persistAdmin($admin)
        {
            $this->adminRepository->setCurrentAdmin($admin);

            return $admin;
        }
    }