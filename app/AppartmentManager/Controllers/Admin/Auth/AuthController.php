<?php namespace AppartmentManager\Controllers\Admin\Auth;

use AppartmentManager\Commands\Admin\Auth\AdminAuthCommand;
use AppartmentManager\Commands\Tenant\Auth\AuthCommand;
use AppartmentManager\Exceptions\InvalidPasswordException;
use AppartmentManager\Repository\Admin\AdminRepository;
use AppartmentManager\Repository\Admin\TenantRepository;
use AppartmentManager\RequestValidators\Admin\Auth\AdminAuthValidator;
use AppartmentManager\RequestValidators\Tenant\Auth\AuthValidator;

class AuthController extends \Controller
{

    /**
     * @var AuthCommand
     */
    private $authCommand;
    /**
     * @var AuthValidator
     */
    private $authValidator;
    /**
     * @var TenantRepository
     */
    private $adminRepository;

    public function __construct(
        AdminAuthCommand $authCommand,
        AdminAuthValidator $authValidator,
        AdminRepository $adminRepository
    )
    {

        $this->authCommand = $authCommand;
        $this->authValidator = $authValidator;
        $this->adminRepository = $adminRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function getLogin()
    {
        return \View::make('admin.auth.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postLogin()
    {
        $data = \Input::only(['email', 'password']);

        $validation = $this->authValidator->validate($data);

        if ($validation->fails()) {
            return \Redirect::back()->withErrors($validation)->withInput();
        }

        try {
            $this->authCommand->execute($data);
        } catch (InvalidPasswordException $ex) {
            return \Redirect::back()
                ->withMessage($ex->getMessage())
                ->withInput();
        }

        return \Redirect::route('admin-dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function getForgotPassword()
    {
        return \View::make('admin.auth.forgot_password');
    }

    public function postForgotPassword()
    {
        //
    }

    public function getChangePassword($token)
    {
        return \View::make('admin.auth.change_password');
    }

    public function postChangePassword($token)
    {

    }


    public function getLogout()
    {
        $this->adminRepository->unSetCurrentAdmin();

        return \Redirect::route('admin-dashboard.index');
    }

}
