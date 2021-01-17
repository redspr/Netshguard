<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\AuthModel;
class Auth extends BaseController
{
	public function login(){
        $model = new AuthModel;
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $row = $model->getUserData($username);
        if ($row == NULL){
            session()->setFlashdata('msg','Wrong Username / Password');
            return redirect()->to('/login');
        }
        if(password_verify($password,$row->password))
        {
            $data = array(
                'log' =>TRUE,
                'username' => $row->username,
                'level' => $row->level
            );
            session()->set($data);
            
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        session()->setFlashData('msg','Logout');
        return redirect()->to('/login');
    }

}