<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 2:38 PM
     */

    namespace AppartmentManager\Controllers\Admin;


    use AppartmentManager\Controllers\BaseController;
    use AppartmentManager\Events\AdminHandlesComplaint;
    use AppartmentManager\Repository\Admin\AdminRepository;
    use AppartmentManager\Repository\Tenant\ComplaintsRepository;

    class AdminComplaintsController extends BaseController
    {


        private $adminRepository;
        /**
         * @var ComplaintsRepository
         */
        private $complaintsRepository;

        function __construct(
            AdminRepository $adminRepository,
            ComplaintsRepository $complaintsRepository
        )
        {

            $this->beforeFilter('admin_auth');
            $this->complaintsRepository = $complaintsRepository;
            $this->adminRepository = $adminRepository;
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
            $complaint = $this->complaintsRepository->read($id, FALSE);

            return \View::make('admin.complaints.show', compact('admin', 'complaint'));
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
            $complaint = $this->complaintsRepository->read($id, FALSE);
            $complaint->is_handled = 1;
            if ($complaint->save()) {
                \Event::fire(AdminHandlesComplaint::class, ['complaint_id' => $id]);

                return \Redirect::route('admin-complaints.show', ['id' => $id]);
            } else {
                echo 'error occured';
            }

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
