<?php namespace App\Controllers;

use App\Models\BlacklistModel;
use App\Models\AttackLogsModel;
use App\Models\ChatBotModel;
use App\Models\UsersModel;
class FetchController extends BaseController
{
    public function index()
    {
        return $this->blacklist();
    }
    public function fetch($name)
    {
        if($name === 'blacklist' or $name === 'attacklogs' or $name === 'chatbot' or $name === 'dashboard')
        {
            return $this->$name();
        }
        else
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Fetch not found');
        }
    }
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
	public function blacklist()
	{
        $this->checkDirect();
        $model = new BlacklistModel;
        $session = session();
        $uid = $session->get('uid');
        $searcher = array('active'=>1,"uid"=>$uid);
        $data = $model->where($searcher)->findAll();
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

    public function chatbot()
	{
        $this->checkDirect();
        $model = new ChatBotModel;
        $session = session();
        $uid = $session->get('uid');
        $searcher = array('active'=>1,"uid"=>$uid);
        $data = $model->where($searcher)->findAll();
        $count = count($data);
        if ($count > 0)
        {
            $newdata = array();
            foreach($data as $x)
            {
                $newdata[] = array('id'=>$x['id'],"uid"=>$x['bid'],'name'=>$x['name'],'admin'=>$x['admin'],'token'=>$x['token']);
            
            }
            $msg = array("status"=>true,"data"=>$newdata);
        }
        else
        {
            $msg = array("status"=>false,"msg"=>"No Data Found");
        }
        echo json_encode($msg);
    }

    public function attacklogs()
	{
        $this->checkDirect();
        $model = new AttackLogsModel;
        $session = session();
        $uid = $session->get('uid');
        $searcher = array('active'=>1,"cid"=>$uid);
        $data = $model->where($searcher)->findAll();
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

    public function dashboard()
    {
        $this->checkDirect();
        $attacklog = new AttackLogsModel;
        $chatbot = new ChatBotModel;
        $blacklist = new BlacklistModel;
        $users = new UsersModel;
        $session = session();
        $uid = $session->get('uid');
        $sattacklog = $attacklog->where('cid',$uid)->findAll();
        $ttlattack = count($sattacklog);
        $checker = array('active'=>1,'uid'=>$uid);
        $sblacklist = $blacklist->where($checker)->findAll();
        $ttlblacklist = count($sblacklist);
        $checker = array('active'=>1,'uid'=>$uid);
        $schatbot = $chatbot->where($checker)->orderBy('admin','desc')->findAll();
        $ttlchatbot = count($schatbot);
        $last5 = $attacklog->where('cid',$uid)->orderBy('id','desc')->findAll(5);
        $ttllast5 = count($last5);
        if ($ttllast5 <= 0 )
        {
            $last5 = 0;
        }
        else
        {
            $newdata = array();
            foreach($last5 as $x)
            {
                $newdata[] = array("type"=>$x['attack_type'],'payload'=>$x['payload'],'time'=>$x['created_at'],'ip'=>$x['ip']);
            
            }
            $last5 = $newdata;
        }
        $susers = $users->where('id',$uid)->findAll();
        $lockdown = "";
        if ($susers[0]["lockdown"] === "0")
        {
            $lockdown = "Inactive";
        }
        else
        {
            $lockdown = "Active";
        }

        if ($ttlchatbot <= 0 )
        {
            $schatbot = 0;
        }
        else
        {
            $newdata = array();
            foreach($schatbot as $x)
            {

                $newdata[] = array("name"=>$x['name'],"admin"=>$x['admin']);
            
            }
            $schatbot = $newdata;
        }
        $retheader = array("tsr"=>$ttlattack,"tab"=>$ttlblacklist,"tcu"=>$ttlchatbot);
        $msg = array("status"=>true,"header"=>$retheader,"last5"=>$last5,"lockdown"=>$lockdown,"attempt"=>$susers[0]["a_attempt"],"chatbot"=>$schatbot);
        echo json_encode($msg);

    }
    public function fetchip()
    {
        $this->checkDirect();
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




}
