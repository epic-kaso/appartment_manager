<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 12:53 PM
     */

    namespace AppartmentManager\Repository;


    interface CrudRepository
    {
        public function create($data = []);

        public function read($id, $data = []);

        public function delete($id);

        public function update($id, $data);

        public function all($limit = 20);
    }