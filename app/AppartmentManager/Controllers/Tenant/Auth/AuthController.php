<?php namespace AppartmentManager\Controllers\Tenant\Auth;

class AuthController extends \Controller
{

    public function __construct()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function getLogin()
    {
        return \View::make('tenant.auth.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postLogin()
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     */
    public function getForgotPassword()
    {
        return \View::make('tenant.auth.forgot_password');
    }

    public function postForgotPassword()
    {
        //
    }

    public function getChangePassword($token)
    {
        return \View::make('tenant.auth.change_password');
    }

    public function postChangePassword($token)
    {

    }


    public function getLogout()
    {
        //
    }

}
