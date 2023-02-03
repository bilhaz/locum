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
		$data['o_pen'] = $model->where('ord_status', '1')->where('emp_id', session()->emp_id)->countAllResults();
		$data['o_pro'] = $model->where('ord_status', '2')->where('emp_id', session()->emp_id)->countAllResults();
		$data['o_con'] = $model->where('ord_status', '3')->where('emp_id', session()->emp_id)->countAllResults();
		$data['o_end'] = $model->where('ord_status', '4')->where('emp_id', session()->emp_id)->countAllResults();




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
		$usrid = session()->emp_id;
		
		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'emp_pwd' => ['label' => 'Password', 'rules' => 'required|min_length[8]|max_length[255]'],
				'password_confirm' => ['label' => 'Confirm Password', 'rules' => 'matches[emp_pwd]'],
			];

			if (!$this->validate($rules)) {
				
				$data['validation'] = $this->validator;
			} else {
				//store this to database

				$model = new EmpModel();
				$newData = [
					
					'emp_pwd' => $this->request->getVar('emp_pwd'),
				];
				$model->update($usrid,$newData);
				$session = session();
				$session->setFlashdata('success', 'Password Updation Successful');
				return redirect()->to('employee/pwdupd');
			}
		}

		return $this->LoadView('employees/changepwd', $data);
	}

	public function contracts()
	{
		$data = [];
		
		$model = new ordersModel();
		$data['order'] = $model->Join('clients', 'clients.cl_id = orders.cl_id')->Join('employee', 'employee.emp_id = orders.emp_id')->where('orders.emp_id', session()->emp_id)->orderBy('ord_created', 'DESC')->findAll();
		
		return $this->LoadView('employees/contracts', $data);
	}

    public function order_view($oid = null)
	{
		$data = [];
		$oid = decryptIt($oid);
		$model = new ordersModel();
		$data['cont'] = $model->Join('clients', 'clients.cl_id = orders.cl_id')->Join('employee', 'employee.emp_id = orders.emp_id')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade')->where('ord_id', $oid)->first();

		return $this->LoadView('employees/order_view', $data);
	}

    public function upl_asses($asid = null)
	{
        $asid = decryptIt($asid);
		$data = [];
		helper(['form']);	

		$model = new ordersModel();
		$data['e_ord'] = $model->where('ord_id', $asid)->first();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'ord_assignment' => ['label' => 'Assesment', 'rules' => 'ext_in[ord_assignment,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[ord_assignment,2048]'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {

				$DA = $this->request->getFile('ord_assignment');

				if ($DA->isValid() && !$DA->hasMoved()) {
					$DAname = encryptIt($DA->getName()) . '.' . pathinfo($_FILES['ord_assignment']['name'], PATHINFO_EXTENSION);

					$DA->move('public/uploads/doc_assesment/', $DAname, true);
				
				}


				//store this to database


				$newData = [
					
					'ord_assignment' => $DAname,
					

				];
				$model->update($asid, $newData);
				$session = session();
				$session->setFlashdata('success', 'Assesment Successful Added');
				return redirect()->to('employee/ord-view/' . encryptIt($asid));
			}
		}


		return $this->LoadView('employees/upl_asses', $data);
	}

	public function  canc_ord($coid = null)

	{
		$coid = decryptIt($coid);
		$model = new ordersModel();
		$del = $model->where('ord_id', $coid)->first();



		

			$newData = [
				'ord_cancel_bdr' => 1,

			];



			$model->update($coid, $newData);
			$session = session();
			$session->setFlashdata('success', 'Order Cancelled');
			return redirect()->to('employee/orders');
		
	}

	public function timesheet($tid = null)
	{
        $tid = decryptIt($tid);
		$data = [];
		helper(['form']);	

		$model = new ordersModel();
		$data['e_ord'] = $model->where('ord_id', $tid)->first();

		
				
				
				
			
		


		return $this->LoadView('employees/timesheet', $data);
	}

}
