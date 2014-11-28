<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 6:53 AM
     */

    namespace AppartmentManager\Repository\Tenant;


    use AppartmentManager\Models\Complaint;
    use AppartmentManager\Models\ComplaintComplaintsCategory;
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
            $category_ids = $data['category_ids'];

            $m = $this->complaintModel->create(['description' => $data['complaint_body']]);
            $m->tenant()->associate($this->getTenant());
            $m->save();
            foreach ($category_ids as $id) {
                ComplaintComplaintsCategory::create([
                    'complaint_id'           => $m->id,
                    'complaints_category_id' => $id
                ]);
            }
            $m->save();
            return $m;
        }

        public function read($id, $is_tenant = TRUE, $data = [])
        {
            // parent::read($id, $data);
            if ($is_tenant) {
                return $this->complaintModel()->findOrFail($id);
            } else {
                return $this->complaintModel->findOrFail($id);
            }

        }

        private function complaintModel()
        {
            return $this->complaintModel->where('tenant_id', $this->getTenant()->id);
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

            return $this->complaintModel()->with('comments')->simplePaginate($limit);
        }
    }