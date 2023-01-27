<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class usercheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
    //    if segment 1 == users
    //  we have to redirect the request to the second segment
    $uri = service('uri');
    if($uri->getSegment(1)=='careers'){
        if($uri->getSegment(2)=='')
        $segment = '/';
    }
        else{
            $segment = '/' .$uri->getSegment(2);
            return redirect()->to($segment);
        }
     
       
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}