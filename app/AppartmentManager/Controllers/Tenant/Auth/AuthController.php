<?php namespace AppartmentManager\Controllers\Tenant\Auth;

use AppartmentManager\Commands\Tenant\Auth\AuthCommand;
use AppartmentManager\Exceptions\InvalidPasswordException;
use AppartmentManager\Repository\Admin\TenantRepository;
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
    private $tenantRepository;

    public function __construct(
        AuthCommand $authCommand,
        AuthValidator $authValidator,
        TenantRepository $tenantRepository
    )
    {

        $this->authCommand = $authCommand;
        $this->authValidator = $authValidator;
        $this->tenantRepository = $tenantRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function getLogin()
    {
        return \View::make('tenant.auth.login')
            ->with('message', \Session::get('message'));;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postLogin()
    {
        $data = \Input::only(['appartment_id', 'password']);

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

        return \Redirect::route('tenant-dashboard.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     */
    public function getForgotPassword()
    {
        return \View::make('tenant.auth.forgot_password')
            ->with('message', \Session::get('message'));;
    }

    public function postForgotPassword()
    {
        //
    }

    public function getChangePassword()
    {
        $tenant = $this->tenantRepository->getCurrentTenant();

        return \View::make('tenant.auth.change_password', compact('tenant'));
    }

    public function postChangePassword()
    {
        $tenant = $this->tenantRepository->getCurrentTenant();

        $rules = ['new_password' => 'required|alpha_dash|confirmed'];

        $result = \Validator::make(\Input::only(['new_password', 'new_password_confirmation']), $rules);

        if ($result->fails()) {
            return \Redirect::back()->withInput()->withErrors($result);
        }

        $tenant->password = \Input::get('new_password');
        $tenant->save();

        return \Redirect::action('AppartmentManager\Controllers\Tenant\ProfileController@getIndex')
            ->withMessage('Successfully Changed Password');
    }


    public function getLogout()
    {
        $this->tenantRepository->unSetCurrentTenant();

        return \Redirect::route('tenant-dashboard.index');
    }

}
