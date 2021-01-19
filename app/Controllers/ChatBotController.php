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
            if($_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest")
            {
                $output = array("status"=>false,"msg"=>"Direct Access is not permitted!");
                die(json_encode($output));
                if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) { // direct access denied
                    $output = array("status"=>false,"msg"=>"Direct Access is not permitted!");
                    die(json_encode($output));
                }
            }  
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
            $req = $ChatBot->where('bid',$bid)->first();
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
