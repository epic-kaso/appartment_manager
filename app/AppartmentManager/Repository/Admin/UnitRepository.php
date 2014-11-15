<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 12:59 PM
     */

    namespace AppartmentManager\Repository\Admin;


    use AppartmentManager\Models\Unit;
    use AppartmentManager\Repository\CrudRepository;

    class UnitRepository implements CrudRepository
    {


        /**
         * @var
         */
        private $unitModel;

        function __construct(Unit $unitModel)
        {
            $this->unitModel = $unitModel;
        }

        public function create($data = [])
        {
            $unit = $this->unitModel->create($data);

            return $unit;
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
            // TODO: Implement all() method.
        }
    }