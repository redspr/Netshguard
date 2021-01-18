<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return $this->dashboard();
	}

	public function dashboard()
	{
		return view('dashboard/dash');
	}

	public function protection()
	{
		return view('dashboard/protection');
	}

	public function blacklist()
	{
		return view('dashboard/blacklist');
	}

	public function logs()
	{
		return view('dashboard/logs');
	}

	public function chatbot()
	{
		return view('dashboard/chatbot');
	}
}
