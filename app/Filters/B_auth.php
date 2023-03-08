<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class B_auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        if (!session()->get('ALoggedIn')) {
            return redirect()->to('backend/login');
            // echo 'hello';
        }

        // Get the current user's role
        $role = $this->getCurrentUserRole();

        $uri = $request->uri->getSegments();
         $controller = $uri[0]??'backend';
         $action = $uri[1]??'index';
        // Get the allowed roles for the current resource
        $allowedRoles = $this->getAllowedRolesForCurrentResource(ucfirst($controller), $action);

        // Check if the user's role is in the list of allowed roles
        if (!in_array($role, $allowedRoles)) {
            // Return a Forbidden response if the user's role is not allowed
            return $this->forbiddenResponse();
        }

    }

    protected function getCurrentUserRole()
    {
        // Code to get the current user's role
        // Example: return 'admin';
        return session()->get('grp_id');
    }

    protected function getAllowedRolesForCurrentResource($controllerName, $actionName)
    {
        // Get the controller class

        $class = "App\Controllers\admin\\" . ($controllerName);

        $controllerClass = new $class();

        // Check if the allowedRoles property exists in the controller class
        if (property_exists($controllerClass, 'allowedRoles')) {
            // Get the allowed roles for the current resource
            $allowedRoles = $controllerClass::$allowedRoles[$actionName] ?? [];

            return $allowedRoles;
        }

        return [];
    }

    protected function forbiddenResponse()
    {
        // Return a Forbidden response
        return redirect()->to('backend/forbidden');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}