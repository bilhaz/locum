<?php

namespace App\Controllers\employee;



use App\Models\UserModel;
use App\Models\EmpModel;
use App\Models\ClientModel;
use App\Models\gradeModel;
use App\Models\ordersModel;
use App\Models\specialityModel;
use App\Models\clRegModel;
use App\Models\usrgrpModel;
use DateTimeZone;

class emp extends EMPBaseController
{
	public function login()
	{
		$data = [];
		helper(['form']);
		$validation = \Config\Services::validation();
		$model = new EmpModel();
		$data['emp_user'] = $model->where('emp_email', $this->request->getVar('emp_email'))
		->first();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'emp_email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
				'emp_pwd' => ['label' => 'Password', 'rules' => 'required|validateEmp[emp_email,emp_pwd]'],
			];

			$errors = [
				'emp_pwd' => [
					'validateEmp' => 'Email or Password don\'t match'
				],
				
			];

			if (isset($data['emp_user']['emp_status']) && $data['emp_user']['emp_status'] == 0) {
				$session = session();
				$session->setFlashdata('error', 'Your Account is Disabled');
				return redirect()->to('employee/login');
			}
			else{
			

			if (!$this->validate($rules, $errors)) {


				$data['validation'] = $this->validator;
			} else {
				

				$empuser = $model->where('emp_email', $this->request->getVar('emp_email'))
					->first();

				$this->setUserSession($empuser);
				return redirect()->to('employee/dashboard');
			}
		}
		}

		return $this->LoadView('employees/login', $data);
	}
	// Setting User Session
	private function setUserSession($empuser)
	{
		$data = [
			'emp_id' => $empuser['emp_id'],
			'emp_email' => $empuser['emp_email'],
			'emp_fname' => $empuser['emp_fname'],
			'emp_lname' => $empuser['emp_lname'],
			'EmpLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function dashboard()
	{
		$data = [];
		$timestamp = \time();
		$dt = date('Y-m-d H:i:s', $timestamp);
		$model = new ordersModel();
		$data['o_pen'] = $model->where('ord_status', '1')->where('emp_id', session()->emp_id)->where('ord_required_to >=', $dt)->countAllResults();
		$data['o_pro'] = $model->where('ord_status', '2')->where('emp_id', session()->emp_id)->where('ord_required_to >=', $dt)->countAllResults();
		$data['o_con'] = $model->where('ord_status', '3')->where('emp_id', session()->emp_id)->where('ord_required_to >=', $dt)->countAllResults();
		$data['o_end'] = $model->where('ord_status', '4')->where('emp_id', session()->emp_id)->where('ord_required_to >=', $dt)->countAllResults();




		return $this->LoadView('employees/dashboard', $data);
	}

	

	public function logout()
	{
		// Unsetting a specific session
		session()->remove('EmpLoggedIn');
		return redirect()->to('employee/login');
	}

	public function pwdupd()
	{
		
		$data = [];
		$usrid = session()->usr_id;
		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'usr_pwd' => ['label' => 'Password', 'rules' => 'required|min_length[8]|max_length[255]'],
				'password_confirm' => ['label' => 'Confirm Password', 'rules' => 'matches[usr_pwd]'],
			];

			if (!$this->validate($rules)) {
				
				$data['validation'] = $this->validator;
			} else {
				//store this to database

				$model = new UserModel();
				$newData = [
					
					'usr_pwd' => $this->request->getVar('usr_pwd'),
				];
				$model->update($usrid,$newData);
				$session = session();
				$session->setFlashdata('success', 'Password Updation Successful');
				return redirect()->to('admin/pwdupd');
			}
		}

		return $this->LoadView('admin/changepwd', $data);
	}

	

}
