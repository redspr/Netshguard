<?php namespace App\Controllers;

use App\Models\BlacklistModel;
use App\Models\AttackLogsModel;
use App\Models\ChatBotModels;

class FetchController extends BaseController
{
    public function index()
    {
        return $this->blacklist();
    }
    public function fetch($name)
    {
        if($name === 'blacklist' or $name === 'attacklogs')
        {
            return $this->$name();
        }
        else
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Fetch not found');
        }
    }
	public function blacklist()
	{
        $model = new BlacklistModel;
        $data = $model->where('active',1)->findAll();
        $count = count($data);
        if ($count > 0)
        {
            $msg = array("status"=>true,"data"=>$data);
        }
        else
        {
            $msg = array("status"=>false,"msg"=>"No Data Found");
        }
        echo json_encode($msg);
    }
    public function attacklogs()
	{
        $model = new AttackLogsModel;
        $data = $model->where('active',1)->findAll();
        $count = count($data);
        if ($count > 0)
        {
            $msg = array("status"=>true,"data"=>$data);
        }
        else
        {
            $msg = array("status"=>false,"msg"=>"No Data Found");
        }
        echo json_encode($msg);
    }

    public function fetchip()
    {
        $ip = $this->request->getPost('ip');
        if($ip !== null)
        {
            $json = file_get_contents("http://ip-api.com/json/$ip");
            $data = json_decode($json,true);
            if($data['status'] == "success")
            {
                $data = array("ISP"=>$data['isp'],"city"=>$data['city'],"country"=>$data['country'],"region"=>$data['regionName'],"timezone"=>$data['timezone']);
                $msg = array("status"=>true,"data"=>$data);
            }
            else
            {
                $msg = array("status"=>false,"error"=>"Failed to retreive this IP!");
            }
        }
        else
        {
            $msg = array("status"=>false,"error"=>"Failed to retreive this IP!");
        }
        
        echo json_encode($msg);
    }

    public function remove()
    {
        $model = new BlacklistModel;
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
            $model->save([
                'id'=>$id,
                'active'=>0
            ]);
            $msg = array("status"=>true);
            echo json_encode($msg);
        }
        
    }
    public function generatetoken()
    {

    }

}
