<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class EM_auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        
        if(! session()->get('ALoggedIn')){
            return redirect()->to('backend/login');
            // echo 'hello';
          }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}