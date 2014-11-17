<?php namespace AppartmentManager\Controllers\Admin;

use AppartmentManager\Commands\Admin\AdminCommand;
use AppartmentManager\Controllers\BaseController;
use AppartmentManager\Repository\Admin\AdminRepository;
use AppartmentManager\RequestValidators\Admin\AdminValidator;

class AdminController extends BaseController
{


    /**
     * @var AdminRepository
     */
    private $adminRepository;
    /**
     * @var AdminValidator
     */
    private $adminValidator;
    /**
     * @var AdminCommand
     */
    private $adminCommand;

    function __construct(
        AdminRepository $adminRepository,
        AdminValidator $adminValidator,
        AdminCommand $adminCommand
    )
    {
        $this->beforeFilter('admin_auth');

        $this->adminRepository = $adminRepository;
        $this->adminValidator = $adminValidator;
        $this->adminCommand = $adminCommand;

    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $admins = $this->adminRepository->all();
        $admin = $this->adminRepository->getCurrentAdmin();

        return \View::make('admin.admin.index', compact('admins', 'admin'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $admin = $this->adminRepository->getCurrentAdmin();

        return \View::make('admin.admin.create', compact('admin'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = \Input::only(['name', 'email', 'phone', 'is_super_admin', 'password', 'password_confirmation']);
        $data['is_super_admin'] = \Input::get('is_super_admin', FALSE) == FALSE ? FALSE : TRUE;


        $validation = $this->adminValidator->validate($data);

        if ($validation->fails()) {
            return \Redirect::back()->withInput()->withErrors($validation);
        }

        unset($data['password_confirmation']);

        $this->adminCommand->execute($data);

        return \Redirect::route('admin.index')->withMessage('Created Successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
