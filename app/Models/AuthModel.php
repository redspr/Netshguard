<?php namespace App\Models;
use CodeIgniter\Model;

class AuthModel extends Model
{
    function getUserData($username)
    {
        $builder = $this->db->table('users');
        $builder->where('username',$username);
        $data = $builder->get()->getRow();
        return $data;
    }
}