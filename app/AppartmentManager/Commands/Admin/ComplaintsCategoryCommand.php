<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 5:26 PM
     */

    namespace AppartmentManager\Commands\Admin;


    use AppartmentManager\Commands\Command;
    use AppartmentManager\Repository\Admin\ComplaintsCategoryRepository;

    class ComplaintsCategoryCommand implements Command
    {


        /**
         * @var ComplaintsCategoryRepository
         */
        private $categoryRepository;

        function __construct(ComplaintsCategoryRepository $categoryRepository)
        {
            $this->categoryRepository = $categoryRepository;
        }

        public function execute($data = [])
        {
            return $this->createCategory($data['name'], $data['description'], $data['admin_id']);
        }

        private function createCategory($name, $description, $admin_id)
        {
            $category = $this->categoryRepository->create(compact('name', 'description'));

            return $this->categoryRepository->assignToAdmin($admin_id, $category);
        }


    }