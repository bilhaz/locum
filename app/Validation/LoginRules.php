<?php

namespace App\Validation;

use App\Models\UserModel;
use App\Models\BackendModel;

class LoginRules {

    // Rule is to validate email & password
    public function validateUser(string $str, string $fields, array $data) {
        $model = new UserModel();
        $user = $model->where('cd_nic',$data['cd_nic'])
                      -> first();

        if(!$user)
        return false;

        return password_verify($data['usr_pwd'], $user['usr_pwd']);
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