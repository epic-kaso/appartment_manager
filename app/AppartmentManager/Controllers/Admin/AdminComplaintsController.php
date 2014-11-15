<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 2:38 PM
     */

    namespace AppartmentManager\Controllers\Admin;


    use AppartmentManager\Commands\Tenant\ComplaintsCommand;
    use AppartmentManager\Controllers\BaseController;
    use AppartmentManager\Repository\Admin\AdminRepository;
    use AppartmentManager\Repository\Admin\ComplaintsCategoryRepository;
    use AppartmentManager\Repository\Tenant\ComplaintsRepository;
    use AppartmentManager\RequestValidators\Tenant\ComplaintsValidator;

    class AdminComplaintsController extends BaseController
    {


        private $adminRepository;
        /**
         * @var ComplaintsCategoryRepository
         */
        private $complaintsCategoryRepository;
        /**
         * @var ComplaintsRepository
         */
        private $complaintsRepository;
        /**
         * @var ComplaintsValidator
         */
        private $complaintsValidator;
        /**
         * @var ComplaintsCommand
         */
        private $complaintsCommand;

        function __construct(
            AdminRepository $adminRepository,
            ComplaintsCategoryRepository $complaintsCategoryRepository,
            ComplaintsRepository $complaintsRepository,
            ComplaintsValidator $complaintsValidator,
            ComplaintsCommand $complaintsCommand
        )
        {
            $this->adminRepository = $adminRepository;
            $this->complaintsCategoryRepository = $complaintsCategoryRepository;
            $this->complaintsRepository = $complaintsRepository;
            $this->complaintsValidator = $complaintsValidator;
            $this->complaintsCommand = $complaintsCommand;

            $this->beforeFilter('tenant_auth');
        }


        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            $complaints = $this->complaintsRepository->all(NULL);
            $admin = $this->adminRepository->getCurrentAdmin();

            return \View::make('tenant.complaints.index', compact('admin', 'complaints'));
        }


        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return Response
         */
        public function show($id)
        {
            $admin = $this->adminRepository->getCurrentAdmin();

            return \View::make('tenant.complaints.show', compact('admin'));
        }


        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return Response
         */
        public function edit($id)
        {
            return \View::make('tenant.complaints.edit');
        }


        /**
         * Update the specified resource in storage.
         *
         * @param  int $id
         * @return Response
         */
        public function update($id)
        {
            //
        }


        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return Response
         */
        public function destroy($id)
        {
            //
        }


    }
