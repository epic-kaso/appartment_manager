<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 6:53 AM
     */

    namespace AppartmentManager\Repository\Tenant;


    use AppartmentManager\Models\Complaint;
    use AppartmentManager\Repository\Admin\TenantRepository;

    class ComplaintsRepository extends BaseTenantRepository
    {


        /**
         * @var Complaint
         */
        private $complaintModel;
        /**
         * @var TenantRepository
         */
        private $tenantRepository;

        function __construct(
            Complaint $complaintModel,
            TenantRepository $tenantRepository
        )
        {
            $this->complaintModel = $complaintModel;
            $this->tenantRepository = $tenantRepository;
            $this->setTenant($this->tenantRepository->getCurrentTenant());

        }

        public function create($data = [])
        {
            parent::create($data);

            $m = $this->complaintModel->create($data);
            $m->tenant()->associate($this->getTenant());

            return $m;
        }

        public function read($id, $data = [])
        {
            parent::read($id, $data);
        }

        public function delete($id)
        {
            parent::delete($id);
        }

        public function update($id, $data)
        {
            parent::update($id, $data);
        }

        public function all($limit = 20)
        {
            parent::all($limit);
        }
    }