<?php namespace App\Controllers;

use App\Models\BlacklistModel;
use App\Models\AttackLogsModel;
use App\Models\ChatBotModel;

class RemoveController extends BaseController
{
    public function remove($name)
    {
        if($name === 'blacklist'  or $name == 'chatbot')
        {
            return $this->$name();
        }
        else
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Remove not found');
        }
    }


    public function chatbot()
    {
        $model = new ChatBotModel;
        $id = $this->request->getPost('id');

        $search = $model->where('id',$id)->findAll();
        $total = count($search);
        if ($total == 0)
        {
            $msg = array("status"=>false);
            echo json_encode($msg);
        }
        else
        {

            if ($search[0]['admin'] === "1")
            {
                $msg = array("status"=>false);
            }
            else
            {
                $model->save([
                    'id'=>$id,
                    'active'=>0
                ]);
                $msg = array("status"=>true);
            }
            
            echo json_encode($msg);
        }
        
    }


}
