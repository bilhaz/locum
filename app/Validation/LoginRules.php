<?php

namespace App\Validation;

use App\Models\UserModel;
use App\Models\EmpModel;
use App\Models\ClientModel;

class LoginRules {

    // Rule is to validate email & password
    public function validateEmp(string $str, string $fields, array $data) {
        $model = new EmpModel();
        $user = $model->where('emp_email',$data['emp_email'])
                      -> first();

        if(!$user)
        return false;

        return password_verify($data['emp_pwd'], $user['emp_pwd']);
    }
    public function validateCli(string $str, string $fields, array $data) {
        $model = new ClientModel();
        $user = $model->where('cl_cont_email',$data['cl_cont_email'])
                      -> first();

        if(!$user)
        return false;

        return password_verify($data['cl_cont_pwd'], $user['cl_cont_pwd']);
    }

    public function validateAdmUser(string $str, string $fields, array $data) {
        $model = new UserModel();
        $user = $model->where('usr_email',$data['usr_email'])
                      -> first();

        if(!$user)
        return false;

        return password_verify($data['usr_pwd'], $user['usr_pwd']);
    }
}