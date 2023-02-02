<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class E_Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        
        if(! session()->get('EmpLoggedIn')){
            return redirect()->to('employee/login');
            // echo 'hello';
          }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}