<?php

namespace App\Controllers;



use App\Models\UserModel;


class usersAuth extends BaseController
{
    public function login()
    {
        $data = [];
        helper(['form']);
        $validation = \Config\Services::validation();


        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'cd_nic' => ['label' => 'Nic', 'rules' => 'required|min_length[6]|max_length[15]|validateUser[cd_nic]'],
                'usr_pwd' => ['label' => 'Password', 'rules' => 'required|min_length[8]|max_length[255]|validateUser[cd_nic,usr_pwd]'],
            ];

            $errors = [
                'usr_pwd' => [
                    'validateUser' => 'Nic or Password don\'t match'
                ],
                'cd_nic' => [
                    'validateUser' => 'Nic is not registered'
                ],
            ];

            if (!$this->validate($rules, $errors)) {


                $data['loginvalidation'] = $this->validator;
            } else {
                // $model = new UserModel();

                // $user = $model->where('cd_nic', $this->request->getVar('cd_nic'))
                    // ->first();

                // $this->setUserSession($user);
                // return redirect()->to('apply');
            }
        }

        return $this->LoadView('employees/login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'usr_id' => $user['usr_id'],
            'cd_email' => $user['cd_email'],
            'cd_nic' => $user['cd_nic'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }



    public function create()
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'cd_email' => ['label' => 'Email', 'rules' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[cd_users.cd_email]'],
                'cd_nic' => ['label' => 'Nic', 'rules' => 'required|min_length[8]|max_length[15]|is_unique[cd_users.cd_nic]'],
                'usr_pwd' => ['label' => 'password', 'rules' => 'required|min_length[8]|max_length[25]'],
                'password_confirm' => ['label' => 'Confirm Password', 'rules' => 'matches[usr_pwd]'],
            ];
            $errors = [
                'usr_pwd' => [
                    'validateUser' => 'Password field does\'t match'
                ],
                'cd_email' => [
                    'validateUser' => 'email is not valid and it\'s required'
                ],
                'cd_email' => [
                    'is_unique' => 'This email is already Registered'
                ],
                'cd_nic' => [
                    'is_unique' => 'This Nic is already Registered'
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                $data['signupvalidation'] = $this->validator;
            } else {
                //store this to database

                $model = new UserModel();
                $newData = [
                    'cd_email' => $this->request->getVar('cd_email'),
                    'usr_pwd' => $this->request->getVar('usr_pwd'),
                    'cd_nic' => $this->request->getVar('cd_nic'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('signupsuccess', 'Registration successful');
                return redirect()->to('login');
            }
        }
        return $this->LoadView('login', $data);
    }
}
