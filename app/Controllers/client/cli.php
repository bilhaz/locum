<?php

namespace App\Controllers\client;



use App\Models\timesheetModel;
use App\Models\ClientModel;
use App\Models\gradeModel;
use App\Models\ordersModel;
use App\Models\specialityModel;
use App\Models\clRegModel;
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
		// $data['t_order'] = $model->Join('clients', 'clients.cl_id = orders.cl_id')->Join('timesheets', 'timesheets.order_id = orders.ord_id')->where('orders.cl_id', session()->cl_id)->distinct('timesheets.order_id')->findAll();
		$data['t_order'] = $model->Join('clients', 'clients.cl_id = orders.cl_id')
    ->Join('timesheets', 'timesheets.order_id = orders.ord_id','LEFT')
    ->where('orders.cl_id', session()->cl_id)
    ->groupBy('orders.ord_id')
    ->find();
		// dd($data['t_order']);
		// $data['ord_id'] = $data['t_order']['ord_id'];

		// $data['order'] = $model->Join('clients', 'clients.cl_id = orders.cl_id')->where('orders.cl_id', session()->cl_id)->orderBy('orders.ord_created', 'DESC')->findAll();


		return $this->LoadView('clients/contracts', $data);
	}

	public function  canc_ord($coid = null)

	{
		// $coid = decryptIt($coid);
		$model = new ordersModel();
		$del = $model->where('ord_id', $coid)->first();
		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'ord_cl_cremarks' => ['label' => 'Reason', 'rules' => 'required'],
			];

			if (!$this->validate($rules)) {
				
				$data['validation'] = $this->validator;
			} else {

			$newData = [
				'ord_cancel_bcl' => 1,
				'ord_cl_cremarks' => $this->request->getVar('ord_cl_cremarks'),

			];

		}
			$model->update($coid, $newData);
			$session = session();
			$session->setFlashdata('success', 'Order Cancelled');
			return redirect()->to('client/orders');
		
	}
}

	public function timesheet($ord_id = null)
	{
        $ord_id = decryptIt($ord_id);
		$data = [];
		
		
		$model = new timesheetModel();
		$data['t_view'] = $model->where('order_id',$ord_id)->find();

		$model = new ordersModel();
		$data['e_ord'] = $model->where('ord_id', $ord_id)->first();

		$data['start_date'] = $data['e_ord']['ord_process_details_from'];
		$data['end_date'] = $data['e_ord']['ord_process_details_to'];
		return $this->LoadView('clients/timesheet', $data);
	}

	public function timesheet_approve($id = null)
	{
        $id = decryptIt($id);
		$data = [];
		
		$model = new ordersModel();
		$data['e_ord'] = $model->where('ord_id', $id)->first();

		$newData = [
			'ord_time_sheet_approved' => "Approved",

		];



		$model->update($id, $newData);
		$session = session();
		$session->setFlashdata('success', 'Timesheet Approved');
		return redirect()->to('client/timesheet/'.encryptIt($data['e_ord']['ord_id']));

		
	}


	public function new_order()
	{
		$id = session()->cl_id;
		$data = [];
		helper(['form']);
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		$clmodel = new ClientModel();
		$data['c_det'] = $clmodel->where('cl_id', $id)->first();
		

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

	public function profile()
	{
		$id = session()->cl_id;
		$data = [];
		$clmodel = new clRegModel();
		$data['cl_cat'] = $clmodel->findAll();
		helper(['form']);
		$model = new ClientModel();
		$data['cli'] = $model->where('cl_id', $id)->first();
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'cl_h_name' => ['label' => 'Hospital Name', 'rules' => 'required'],
				'cl_reg_as' => ['label' => 'Register As', 'rules' => 'required'],
				'cl_county' => ['label' => 'County', 'rules' => 'required'],
				'cl_eircode' => ['label' => 'Eircode', 'rules' => 'required|numeric'],
				'cl_cont_name' => ['label' => 'Contact Personnel Name', 'rules' => 'required'],
				'cl_cont_phone' => ['label' => 'Contact No.', 'rules' => 'required|numeric'],
				'cl_address' => ['label' => 'Address', 'rules' => 'required'],
				'cl_cont_desig' => ['label' => 'Designation', 'rules' => 'required'],
				 'cl_gender' => ['label' => 'Gender', 'rules' => 'required'],
			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					'cl_h_name' => $this->request->getVar('cl_h_name'),
					'cl_reg_as' => $this->request->getVar('cl_reg_as'),
					'cl_county' => $this->request->getVar('cl_county'),
					'cl_eircode' => $this->request->getVar('cl_eircode'),
					'cl_cont_name' => $this->request->getVar('cl_cont_name'),
					'cl_cont_phone' => $this->request->getVar('cl_cont_phone'),
					'cl_address' => $this->request->getVar('cl_address'),
					'cl_cont_desig' => $this->request->getVar('cl_cont_desig'),
					'cl_gender' => $this->request->getVar('cl_gender'),

				];
				$model->update($id, $newData);
				$session = session();
				$session->setFlashdata('success', 'Record Successful Saved');
				return redirect()->to('client/profile');
			}
		}


		return $this->LoadView('clients/profile', $data);
	}




}
