<?php

namespace App\Controllers\client;



use App\Models\UserModel;
use App\Models\EmpModel;
use App\Models\ClientModel;
use App\Models\gradeModel;
use App\Models\ordersModel;
use App\Models\specialityModel;
use App\Models\clRegModel;
use App\Models\usrgrpModel;
use DateTimeZone;

class cli extends CLIBaseController
{
	public function index()
	{

		return redirect()->to('client/login');

	}
	public function login()
	{
		$data = [];
		helper(['form']);
		$validation = \Config\Services::validation();
		$model = new ClientModel();
		$data['cli_user'] = $model->where('cl_cont_email', $this->request->getVar('cl_cont_email'))
		->first();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'cl_cont_email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
				'cl_cont_pwd' => ['label' => 'Password', 'rules' => 'required|validateCli[cl_cont_email,cl_cont_pwd]'],
			];

			$errors = [
				'cl_cont_pwd' => [
					'validateCli' => 'Email or Password don\'t match'
				],
				
			];

			if (isset($data['cli_user']['cl_status']) && $data['cli_user']['cl_status'] == 0) {
				$session = session();
				$session->setFlashdata('error', 'Your Account is Disabled');
				return redirect()->to('client/login');
			}
			else{
			

			if (!$this->validate($rules, $errors)) {


				$data['validation'] = $this->validator;
			} else {
				

				$cliuser = $model->where('cl_cont_email', $this->request->getVar('cl_cont_email'))
					->first();

				$this->setUserSession($cliuser);
				return redirect()->to('client/dashboard');
			}
		}
		}

		return $this->LoadView('clients/login', $data);
	}
	// Setting User Session
	private function setUserSession($cliuser)
	{
		$data = [
			'cl_id' => $cliuser['cl_id'],
			'cl_cont_email' => $cliuser['cl_cont_email'],
			'cl_cont_name' => $cliuser['cl_cont_name'],
			'cl_h_name' => $cliuser['cl_h_name'],
			'CliLoggedIn' => true,
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
		$data['o_pen'] = $model->where('ord_status', '1')->where('cl_id', session()->cl_id)->countAllResults();
		$data['o_pro'] = $model->where('ord_status', '2')->where('cl_id', session()->cl_id)->countAllResults();
		$data['o_con'] = $model->where('ord_status', '3')->where('cl_id', session()->cl_id)->countAllResults();
		$data['o_end'] = $model->where('ord_status', '4')->where('cl_id', session()->cl_id)->countAllResults();




		return $this->LoadView('clients/dashboard', $data);
	}

	

	public function logout()
	{
		// Unsetting a specific session
		session()->remove('CliLoggedIn');
		return redirect()->to('client/login');
	}

	public function pwdupd()
	{
		
		$data = [];
		$usrid = session()->cl_id;
		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'cl_cont_pwd' => ['label' => 'Password', 'rules' => 'required|min_length[8]|max_length[255]'],
				'password_confirm' => ['label' => 'Confirm Password', 'rules' => 'matches[cl_cont_pwd]'],
			];

			if (!$this->validate($rules)) {
				
				$data['validation'] = $this->validator;
			} else {
				//store this to database

				$model = new ClientModel();
				$newData = [
					
					'cl_cont_pwd' => $this->request->getVar('cl_cont_pwd'),
				];
				$model->update($usrid,$newData);
				$session = session();
				$session->setFlashdata('success', 'Password Updation Successful');
				return redirect()->to('client/pwdupd');
			}
		}

		return $this->LoadView('clients/changepwd', $data);
	}

	public function contracts()
	{
		$data = [];
		
		$model = new ordersModel();
		$data['order'] = $model->Join('clients', 'clients.cl_id = orders.cl_id')->where('orders.cl_id', session()->cl_id)->orderBy('orders.ord_created', 'DESC')->findAll();
		return $this->LoadView('clients/contracts', $data);
	}


	public function  canc_ord($coid = null)

	{
		$coid = decryptIt($coid);
		$model = new ordersModel();
		$del = $model->where('ord_id', $coid)->first();



		

			$newData = [
				'ord_cancel_bcl' => 1,

			];



			$model->update($coid, $newData);
			$session = session();
			$session->setFlashdata('success', 'Order Cancelled');
			return redirect()->to('client/orders');
		
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


	public function new_order()
	{

		$data = [];
		helper(['form']);
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		

		$model = new ordersModel();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				
				'ord_speciality' => ['label' => 'Speciality', 'rules' => 'required'],
				'ord_grade' => ['label' => 'Grade', 'rules' => 'required'],
				'ord_required_from' => ['label' => 'Required From', 'rules' => 'required'],
				'ord_required_to' => ['label' => 'Required To', 'rules' => 'required'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					
					'ord_speciality' => $this->request->getVar('ord_speciality'),
					'ord_grade' => $this->request->getVar('ord_grade'),
					'ord_required_from' => $this->request->getVar('ord_required_from'),
					'ord_required_to' => $this->request->getVar('ord_required_to'),
					'ord_status' => 1,
					'cl_id'=> session()->cl_id,
					


				];
				$model->insert($newData);
				$session = session();
				$session->setFlashdata('success', 'Order Successful Created');
				return redirect()->to('client/orders');
			}
		}


		return $this->LoadView('clients/new_order', $data);
	}

	public function order_edit($eoid = null)
	{
		$eoid = decryptIt($eoid);
		
		 
		$data = [];
		helper(['form']);
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		

		$model = new ordersModel();
		$data['e_ord'] = $model->where('ord_id', $eoid)->first();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				
				'ord_speciality' => ['label' => 'Speciality', 'rules' => 'required'],
				'ord_grade' => ['label' => 'Grade', 'rules' => 'required'],
				'ord_required_from' => ['label' => 'Required From', 'rules' => 'required'],
				'ord_required_to' => ['label' => 'Required To', 'rules' => 'required'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					
					'ord_speciality' => $this->request->getVar('ord_speciality'),
					'ord_grade' => $this->request->getVar('ord_grade'),
					'ord_required_from' => $this->request->getVar('ord_required_from'),
					'ord_required_to' => $this->request->getVar('ord_required_to'),
					
				];
				$model->update($eoid,$newData);
				$session = session();
				$session->setFlashdata('success', 'Order Successful Updated');
				return redirect()->to('client/orders');
			}
		}


		return $this->LoadView('clients/order_edit', $data);
	}


}
