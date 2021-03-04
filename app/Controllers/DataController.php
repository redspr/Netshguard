<?php namespace App\Controllers;


use App\Models\UsersModel;
use App\Models\LogsModel;


class DataController extends BaseController
{
    public function getData()
    {
        $data = $this->request->getPost('data');
        if ($data !== null)
        {
            $procData = json_decode($data,true);
            if($procData['Host'] !== null)
            {
                $logs = new LogsModel;
                $logs->save([
                    'cid'=>'1',
                    'host'=>$procData['Host'],
                    'ua'=>$procData['UA'],
                    'clientip'=>$procData['ClientIP'],
                    'path'=>$procData['Path'],
                    'method'=>$procData['Method'],
                ]); 
                echo "success";
            }
        }
        

    }

}
