<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleAccessFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the current user's role
        $role = $this->getCurrentUserRole();

        $router = service('router');
        $controllerName = $router->controllerName();
        $actionName = $router->methodName();

        // Get the allowed roles for the current resource
        $allowedRoles = $this->getAllowedRolesForCurrentResource($controllerName, $actionName);

        print_r($allowedRoles);

        // Check if the user's role is in the list of allowed roles
        if (!in_array($role, $allowedRoles)) {
            // Return a Forbidden response if the user's role is not allowed
            return $this->forbiddenResponse();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
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
        $controllerClass = "App\Controllers\\" . $controllerName;

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
        die('not allowed');
    }
}


?>