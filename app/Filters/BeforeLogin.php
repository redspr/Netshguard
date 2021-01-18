<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;



class BeforeLogin implements FilterInterface
{
    public function before(RequestInterface $request,$arguments = NULL)
    {
        $session = session();
        if ($session->get('log') != TRUE){
            return redirect()->to('/login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response,$arguments = NULL)
    {
        $session = session();
        if ($session->get('log') == TRUE){
            return redirect()->to('/home/dashboard');
        }
    }
}