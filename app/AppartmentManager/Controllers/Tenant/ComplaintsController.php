<?php namespace AppartmentManager\Controllers\Tenant;

use AppartmentManager\Commands\Tenant\ComplaintsCommand;
use AppartmentManager\Controllers\BaseController;
use AppartmentManager\Repository\Admin\AdminRepository;
use AppartmentManager\Repository\Admin\ComplaintsCategoryRepository;
use AppartmentManager\Repository\Admin\TenantRepository;
use AppartmentManager\Repository\Tenant\ComplaintsRepository;
use AppartmentManager\RequestValidators\Tenant\ComplaintsValidator;

class ComplaintsController extends BaseController
{


    private $tenantRepository;
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
        TenantRepository $tenantRepository,
        ComplaintsCategoryRepository $complaintsCategoryRepository,
        ComplaintsRepository $complaintsRepository,
        ComplaintsValidator $complaintsValidator,
        ComplaintsCommand $complaintsCommand,
        AdminRepository $adminRepository
    )
    {

        $this->beforeFilter('tenant_auth');

        $this->tenantRepository = $tenantRepository;
        $this->complaintsCategoryRepository = $complaintsCategoryRepository;
        $this->complaintsRepository = $complaintsRepository;
        $this->complaintsValidator = $complaintsValidator;
        $this->complaintsCommand = $complaintsCommand;
        $this->adminRepository = $adminRepository;


    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tenant = $this->tenantRepository->getCurrentTenant();
        $complaints = $this->complaintsRepository->all(NULL);

        return \View::make('tenant.complaints.index', compact('tenant', 'complaints'))
            ->with('message', \Session::get('message'));;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tenant = $this->tenantRepository->getCurrentTenant();
        $complaints_categories = $this->complaintsCategoryRepository->all(NULL);

        return \View::make('tenant.complaints.create', compact('tenant', 'complaints_categories'))
            ->with('message', \Session::get('message'));;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = \Input::all();

        $validation = $this->complaintsValidator->validate($data);

        if ($validation->fails()) {
            return \Redirect::back()->withInput()->withErrors($validation);
        }

        $this->complaintsCommand->execute($data);

        return \Redirect::route('tenant-dashboard.complaints.index')
            ->withMessage('Created Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return \View::make('tenant.complaints.show')
            ->with('message', \Session::get('message'));;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return \View::make('tenant.complaints.edit')
            ->with('message', \Session::get('message'));;
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
