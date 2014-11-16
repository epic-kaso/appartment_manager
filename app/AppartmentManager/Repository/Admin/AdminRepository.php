<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/14/2014
     * Time: 5:18 PM
     */

    namespace AppartmentManager\Repository\Admin;


    use AppartmentManager\Models\Admin;
    use AppartmentManager\Models\AdminComplaintsCategory;
    use AppartmentManager\Models\Complaint;
    use AppartmentManager\Models\ComplaintComplaintsCategory;
    use AppartmentManager\Repository\CrudRepository;

    class AdminRepository implements CrudRepository
    {


        /**
         * @var Admin
         */
        private $admin;

        function __construct(Admin $admin)
        {
            $this->admin = $admin;
        }

        public function create($data = [])
        {
            return $this->admin->create($data);
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
            return $this->admin->simplePaginate($limit);
        }

        public function getAdmins($withSuperUser = FALSE)
        {
            if ($withSuperUser) {
                return $this->admin->get();
            } else {
                return $this->admin->where('is_super_admin', '!=', TRUE)->get();
            }
        }

        public function getAdminsAsList($value, $key, $withSuperUser = FALSE)
        {
            if ($withSuperUser) {
                return $this->admin->lists($value, $key);
            } else {
                return $this->admin->where('is_super_admin', '!=', TRUE)->lists($value, $key);
            }
        }

        public function getSuperAdmin()
        {
            return $this->admin->where('is_super_admin', TRUE)->first();
        }

        public function getCurrentAdmin()
        {
            $id = \Session::get('admin_id', NULL);
            if (!$id) {
                return NULL;
            } else {
                return $this->read($id);
            }
        }

        public function read($id, $data = [])
        {
            if (empty($data)) {
                return $this->admin->find($id)->first();
            }
        }

        public function setCurrentAdmin(Admin $admin)
        {
            \Session::set('admin_id', $admin->id);
        }

        public function unSetCurrentAdmin()
        {
            \Session::forget('admin_id');
        }

        public function getAdminByEmail($email)
        {
            return $this->admin->where('email', $email)->first();
        }

        public function getComplaintsForAdmin(Admin $admin)
        {
            $admin->load('complaintsCategories');

            $complaintsCategories = $admin->complaintsCategories;
            $value = $complaintsCategories;
            // dd($value);

            $response = ComplaintComplaintsCategory::with(
                [
                    'complaint',
                    'complaint.tenant',
                    'complaint.tenant.appartment',
                    'complaints_category'
                ])
                ->whereHas('complaints_category', function ($q) use ($value) {
                    if (isset($value) && count($value) > 0) {
                        foreach ($value as $v) {
                            $q->orWhere('id', $v->id);
                        }
                    }
                })->simplePaginate(20);

            return $response;
        }

        public function getAdminsForComplaint(Complaint $complaint)
        {
            $complaint->load('complaints_categories');

            $complaintsCategories = $complaint->complaints_categories;

            $value = $complaintsCategories->toArray();


            $response = AdminComplaintsCategory::with('admin');

            if (is_array($value) && !empty($value)) {
                $response->where('complaints_category_id', [$value[0]['id']]);
            }
            if (is_array($value) && count($value) > 1) {
                for ($i = 1; $i < count($value); $i++) {
                    $response->where('complaints_category_id', [$value[$i]['id']]);
                }
            };

            $response = $response->get();

            return $response;
        }


    }