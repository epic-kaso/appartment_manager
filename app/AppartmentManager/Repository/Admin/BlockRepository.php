<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 12:59 PM
     */

    namespace AppartmentManager\Repository\Admin;


    use AppartmentManager\Models\Block;
    use AppartmentManager\Repository\CrudRepository;

    class BlockRepository implements CrudRepository
    {


        /**
         * @var Block
         */
        private $blockModel;

        function __construct(Block $blockModel)
        {

            $this->blockModel = $blockModel;
        }

        public function create($data = [])
        {
            $block = $this->blockModel->create($data);

            return $block;
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