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
                'uid' => $row->id,
                'level' => $row->level
            );
            session()->set($data);
            return redirect()->to('/home/dashboard');
        }
        session()->setFlashdata('pesan','Password Salah');
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

}