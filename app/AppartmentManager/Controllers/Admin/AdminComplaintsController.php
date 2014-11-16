<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 2:38 PM
     */

    namespace AppartmentManager\Controllers\Admin;


    use AppartmentManager\Controllers\BaseController;
    use AppartmentManager\Repository\Admin\AdminRepository;

    class AdminComplaintsController extends BaseController
    {


        private $adminRepository;

        function __construct(
            AdminRepository $adminRepository
        )
        {
            $this->adminRepository = $adminRepository;
            $this->beforeFilter('admin_auth');
        }


        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            $admin = $this->adminRepository->getCurrentAdmin();
            $responses = $this->adminRepository->getComplaintsForAdmin($admin);

            //dd($responses->toJson());
            return \View::make('admin.complaints.index', compact('admin', 'responses'));
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
