<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		return $this->login();
	}
	public function login()
	{	
		return view('login');
	}

}