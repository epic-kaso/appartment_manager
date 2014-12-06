<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 1:06 PM
     */

    namespace AppartmentManager\Commands\Admin;


    use AppartmentManager\Commands\Command;
    use AppartmentManager\Repository\Admin\AppartmentRepository;
    use AppartmentManager\Repository\Admin\BlockRepository;
    use AppartmentManager\Repository\Admin\UnitRepository;

    class AppartmentCommand implements Command
    {

        private $block_name;
        private $block_size;

        private $appartmentRepository;
        /**
         * @var BlockRepository
         */
        private $blockRepository;
        /**
         * @var UnitRepository
         */
        private $unitRepository;

        function __construct(
            BlockRepository $blockRepository,
            UnitRepository $unitRepository,
            AppartmentRepository $appartmentRepository
        )
        {
            $this->appartmentRepository = $appartmentRepository;
            $this->blockRepository = $blockRepository;
            $this->unitRepository = $unitRepository;
        }


        /**
         * @param array $data
         * @return array
         */

        public function execute($data = [])
        {
            return $this->createAppartment($data['block_name'], $data['block_size'], $data['unit_prefix']);
        }

        private function createAppartment($block_name, $block_size, $unit_prefix)
        {
            $this->block_name = $block_name;
            $this->block_size = $block_size;

            //First Create Block.

            $block = $this->createBlock($block_name, $block_size);

            //Second, Create Units Based on Block Size

            $units = $this->createUnits($block, $unit_prefix);

            //Third, Create Appartments Based on Units

            $appartments = $this->createAppartments($units);

            return $appartments;
        }

        private function createBlock($block_name, $block_size)
        {
            $block = $this->blockRepository->firstOrCreate(
                [
                    'name' => $block_name,
                    'size' => $block_size
                ]
            );

            return $block;
        }

        private function createUnits($block, $unit_prefix)
        {
            $size = $block->size;
            $units = [];

            for ($i = 1; $i <= $size; $i++) {
                $units[] = $this->unitRepository->firstOrCreate([
                    'name' => $unit_prefix . $i,
                    'block_id' => $block->id
                ]);
            }

            return $units;
        }

        private function createAppartments($units = [])
        {
            $appartments = [];

            foreach ($units as $unit) {
                $appartments[] = $this->appartmentRepository->create(
                    [
                        'unit_id'       => $unit->id,
                        'tenant_id'     => NULL,
                        'is_vacant'     => TRUE,
                        'appartment_id' => \Str::slug($unit->block->name . ' ' . $unit->name)
                    ]
                );
            }

            return $appartments;

        }


    }