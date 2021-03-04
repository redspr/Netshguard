<?php namespace App\Controllers;


use App\Models\ChatBotModel;
use App\Models\UsersModel;
use App\Models\AttackLogsModel;
use App\Models\BlacklistModel;

class ChatBotController extends BaseController
{
    function checkDirect()
    {

        if (empty($_SERVER["HTTP_X_REQUESTED_WITH"])) 
        {
            $output = array("status"=>false,"msg"=>"Direct Access is not permitted!");
            die(json_encode($output));
        }
        if($_SERVER["HTTP_X_REQUESTED_WITH"] !== "XMLHttpRequest")
        {
            $output = array("status"=>false,"msg"=>"Direct Access is not permitted!");
            die(json_encode($output));
        }
    }
    public function generatetoken()
    {
        $this->checkDirect();
        $model = new ChatBotModel;
        $length = 5;
        $password = "";
        do {
            $password = substr(str_shuffle("ABCDEF1234567890"), 0, $length);
            $password = "NG-".$password;
            $search = $model->where('token',$password)->findAll();
            $total = count($search);
        } while ($total > 0);
        $session = session();
        $uid = $session->get('uid');
        $model->save([
            'uid'=>$uid,
            'bid'=>'-',
            'name'=>'-',
            'token'=>$password,
            'admin'=>0,
            'active'=>1,
        ]);
        $msg = array("status"=>true);
        echo json_encode($msg);   
    }
    public function setadmin()
    {
        $this->checkDirect();
        $model = new ChatBotModel;
        $id = $this->request->getPost('id');
        $session = session();
        $uid = $session->get('uid');
        $searcher = array('id'=>$id,"uid"=>$uid);
        $model->where('uid', $uid)->set(['admin' => 0])->update();
        $model->where($searcher)->set(['admin' => 1])->update();
        $msg = array("status"=>true);
        echo json_encode($msg); 
    }

    function checkOwner($bid,$admin=false)
    {
        $ChatBot = new ChatBotModel;
        if($bid !== null && $bid !== "-")
        {
            $req = $ChatBot->where(['bid'=>$bid,'active'=>1])->first();
            if($req !== null )
            {
                if ($admin === true)
                {

                    if ($req['admin'] === "1")
                    {
                        return $req['uid'];
                    }
                    else
                    {
                        return null;
                    }
                }
                else
                {
                    return $req['uid'];
                }
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            return null;
        }
    }
    function checkadmin($bid)
    {
        $ChatBot = new ChatBotModel;
        if($bid !== null && $bid !== "-")
        {
            $req = $ChatBot->where('bid',$bid)->first();
            if($req !== null )
            {
               return $req['admin'];
            }
            else
            {
                return null;
            }
        }
        else
        {
            return null;
        }
    }
    function getLocation($ip)
    {
        if($ip !== null)
        {
            $json = file_get_contents("http://ip-api.com/json/$ip");
            $data = json_decode($json,true);
            if($data['status'] == "success")
            {
                return $data['city'];
            }
            else
            {
                return "-";
            }
        }
        else
        {
            return "-";
        }
    }
    public function checklockdown()
    {
        $this->checkDirect();
        $UsersModel = new UsersModel;
        $uid = $this->request->getPost('uid');
        $cid = $this->checkOwner($uid,true);
        if($cid !== null)
        {
            $req = $UsersModel->where('id',$cid)->first();
            if($req !== null)
            {
                $msg = array("status"=>true,"lockdown"=>$req['lockdown']);
            }
            else
            {
                $msg = array("status"=>false);
            }
        }
        else
        {
            $msg = array("status"=>false);
        }
        echo json_encode($msg);
    }
    public function checkLogs()
    {
        $this->checkDirect();
        $UsersModel = new UsersModel;
        $AttackLogsModel = new AttackLogsModel;
        $uid = $this->request->getPost('uid');
        $cid = $this->checkOwner($uid,false);
        if($cid !== null)
        {
            $req = $AttackLogsModel->where(['cid'=>$cid,'active'=>1])->orderBy('id', 'desc')->findAll(10);
            $newdata = array();
            foreach($req as $x)
            {
                $newdata[] = array('ip'=>$x['ip'],'type'=>$x['attack_type'],'attempt_date'=>$x['created_at'],"payload"=>$x['payload']);
            
            }
            $msg = array("status"=>true,"data"=>$newdata);

        }
        else
        {
            $msg = array("status"=>false);
        }
        echo json_encode($msg);
    }
    public function checkBlacklist()
    {
        $this->checkDirect();
        $UsersModel = new UsersModel;
        $BlacklistModel = new BlacklistModel;
        $uid = $this->request->getPost('uid');

        $cid = $this->checkOwner($uid,false);
        if($cid !== null)
        {
            $req = $BlacklistModel->where(['aid'=>$cid,'active'=>1])->orderBy('id', 'desc')->findAll(10);
            $newdata = array();
            foreach($req as $x)
            {
                $newdata[] = array('ip'=>$x['ip'],'location'=>$x['location'],'attempt_time'=>$x['c_time']);
            
            }
            $msg = array("status"=>true,"data"=>$newdata);

        }
        else
        {
            $msg = array("status"=>false);
        }
        echo json_encode($msg);
    }
    public function checkuid()
    {
        $this->checkDirect();
        $data = $this->request->getPost('uid');
        $check = $this->checkOwner($data,false);
        $UsersModel = new UsersModel;
        $ChatBot = new ChatBotModel;
        if ($check !== null)
        {
            $uid = $ChatBot->where('bid',$data)->first();
            $id = $uid['uid'];
            $lock = $UsersModel->where('id',$id)->first();
            $admin = $this->checkOwner($data,true);

            if ($admin === null)
            {
                $admin = 0;
            }
            else
            {
                $admin = 1;
            }
            $msg = array("status"=>true,"lockdown"=>$lock['lockdown'],"admin"=>$admin);
        }
        else
        {
            $msg = array("status"=>false);
        }
        echo json_encode($msg);
    }
    public function checktoken()
    {
        $this->checkDirect();
        $token = $this->request->getPost('token');
        $name = $this->request->getPost('name');
        $uid = $this->request->getPost('uid');

        $ChatBot = new ChatBotModel;
        $check = $ChatBot->where(['token'=>$token,'active'=>1,'bid'=>'-'])->first();
        if ($check !== null)
        {
            $ChatBot->save([
                'id'=> $check['id'],
                'bid'=>$uid,
                'name'=>$name
            ]);
            $msg = array("status"=>true);
        }
        else
        {
            $msg = array("status"=>false);
        }
        echo json_encode($msg);
    }
    public function addblacklist()
    {
        $this->checkDirect();
        $uid = $this->request->getPost('uid');
        $bid = $this->request->getPost('bid');
        $cid = $this->checkOwner($uid,true);
        $AttackLogsModel = new AttackLogsModel;
        $BlacklistModel = new BlacklistModel;
        if($cid !== null)
        {
            if($bid !== null)
            {
                $req = $AttackLogsModel->where(['id'=>$bid,'cid'=>$cid])->first();
                if($req !== null)
                {
                    $loc = $this->getLocation($req['ip']);
                    $BlacklistModel->save([
                        'uid'=>$cid,
                        'aid'=>$req['id'],
                        'ip'=>$req['ip'],
                        'location'=>$loc,
                        'active'=>1
                    ]);
                    $msg = array("status"=>true);
                }
                else
                {
                    $msg = array("status"=>false);
                }
            }
            else
            {
                $msg = array("status"=>false);
            }
            
        }
        else
        {
            $msg = array("status"=>false);
        }
        echo json_encode($msg);
    }

}
