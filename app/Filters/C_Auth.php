<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class C_Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        
        if(! session()->get('CliLoggedIn')){
            return redirect()->to('client/login');
            // echo 'hello';
          }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}