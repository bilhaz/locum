<?php

namespace App\Controllers\client;



use App\Models\timesheetModel;
use App\Models\ClientModel;
use App\Models\gradeModel;
use App\Models\ordersModel;
use App\Models\specialityModel;
use App\Models\clRegModel;
use App\Models\notificationModel;
use DateTimeZone;

helper('email');

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
		$data['cli_user'] = $model->where('cl_usr', $this->request->getVar('cl_usr'))
		->first();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'cl_usr' => ['label' => 'Username', 'rules' => 'required'],
				'cl_cont_pwd' => ['label' => 'Password', 'rules' => 'required|validateCli[cl_usr,cl_cont_pwd]'],
			];

			$errors = [
				'cl_cont_pwd' => [
					'validateCli' => 'Username or Password don\'t match'
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
				

				$cliuser = $model->where('cl_usr', $this->request->getVar('cl_usr'))
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
			'cl_usr' => $cliuser['cl_usr'],
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
		$data['o_pen'] = $model->where('ord_status', '1')->where('cl_id', session()->cl_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_pro'] = $model->where('ord_status', '2')->where('cl_id', session()->cl_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_con'] = $model->where('ord_status', '3')->where('cl_id', session()->cl_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_end'] = $model->where('ord_status', '4')->where('cl_id', session()->cl_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();




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
		->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')
		->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')
		->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')
    ->Join('timesheets', 'timesheets.order_id = orders.ord_id','LEFT')
    ->where('orders.cl_id', session()->cl_id)
    ->groupBy('orders.ord_id')->orderBy('orders.ord_id','DESC')
    ->find();
		// dd($data['t_order']);
		// $data['ord_id'] = $data['t_order']['ord_id'];

		// $data['order'] = $model->Join('clients', 'clients.cl_id = orders.cl_id')->where('orders.cl_id', session()->cl_id)->orderBy('orders.ord_created', 'DESC')->findAll();


		return $this->LoadView('clients/contracts', $data);
	}

	public function  canc_ord($coid = null)

	{
		// $coid = decryptIt($coid);
		$cid = session()->cl_id;
		$link = "backend/order_view";
		$model = new ordersModel();
		$del = $model->where('ord_id', $coid)->first();
		$Nmodel = new notificationModel();
			$to = 'sralocum@sra.com';
			$cc = '';
			$subject = ''.session()->cl_h_name.' Cancelled Order';
			$message = '<html><body><p> Here is the Order Link</p><br><a target="_blank" href='.base_url('backend/order_view/'.encryptIt($coid)).' style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a></body</html>';
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
			$newdata2 = [
			'ord_id' => $coid,
			'emp_id' =>$cid,
			'link'	=> $link,
			'notification' => "Order Cancel by Client",
			'status' => "0",
			];
		}
			$model->update($coid, $newData);
			$Nmodel->insert($newdata2);
			$session = session();
			if (sendEmail($to, $cc, $subject, $message)) {
				$session->setFlashdata('success', 'Order Cancelled');
				return redirect()->to('client/orders');
				} else {
					return redirect()->to('client/orders');
				}	
			
		
	}
}

	public function timesheet($ord_id = null)
	{
        $ord_id = decryptIt($ord_id);
		$data = [];
		
		
		$model = new timesheetModel();
		$data['t_view'] = $model->where('order_id',$ord_id)->find();

		$model = new ordersModel();
		$data['e_ord'] = $model->join('clients','clients.cl_id = orders.cl_id','LEFT')->join('employee','employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $ord_id)->first();

		$data['start_date'] = $data['e_ord']['ord_process_details_from'];
		$data['end_date'] = $data['e_ord']['ord_process_details_to'];
		return $this->LoadView('clients/timesheet', $data);
	}

	public function timesheet_approve($id = null)
	{
        $id = decryptIt($id);
        $cid = session()->cl_id;
		$link = "backend/t-view";
		$data = [];
		$Nmodel = new notificationModel();
		$model = new ordersModel();
		$omodel = new ordersModel();
		$data['e_ord'] = $omodel->join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_id', $id)->first();
		// $data['e_ord'] = $model->where('ord_id', $id)->first();
			$to = 'sralocum@sra.com,'.$data['e_ord']['cl_cont_email'];
			$cc = '';
			$subject = ''.session()->cl_h_name.' Approved Timesheet';
			$message = '<html><body><p> Here is the Timesheet Link</p><br><a target="_blank" href='.base_url('backend/t-view/'.encryptIt($id)).' style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a></body</html>';

		$newData = [
			'ord_time_sheet_approved' => "Approved",

		];
        $newdata2 = [
			'ord_id' => $id,
			'emp_id' =>$cid,
			'link'	=> $link,
			'notification' => "Timsheet Approved by Client",
			'status' => "0",
			];


		$model->update($id, $newData);
		$Nmodel->insert($newdata2);
		$session = session();
		if (sendEmail($to, $cc, $subject, $message)) {
			$session->setFlashdata('success', 'Timesheet Approved');
		return redirect()->to('client/timesheet/'.encryptIt($data['e_ord']['ord_id']));
			} else {
				return redirect()->to('client/timesheet/'.encryptIt($data['e_ord']['ord_id']));
		}	
		

		
	}


	public function new_order()
	{
		$id = session()->cl_id;
		$link = "backend/order_view";
		$data = [];
		helper(['form']);
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		$clmodel = new ClientModel();
		$data['c_det'] = $clmodel->where('cl_id', $id)->first();
		$nmodel = new notificationModel();
		

		$model = new ordersModel();
		

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				
				'ord_speciality' => ['label' => 'Speciality', 'rules' => 'required'],
				'ord_grade' => ['label' => 'Grade', 'rules' => 'required'],
				'ord_required_from' => ['label' => 'Required From', 'rules' => 'required'],
				'ord_required_to' => ['label' => 'Required To', 'rules' => 'required'],
				'ord_datetime_detail' => ['label' => 'Date & Time Details', 'rules' => 'required'],

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
					'ord_datetime_detail' => $this->request->getVar('ord_datetime_detail'),
					'ord_status' => 1,
					'cl_id'=> session()->cl_id,
					
				];
				$model->insert($newData);
				$oid = $model->insertID;
			$to = 'sralocum@sra.com';
			$cc = '';
			$subject = ''.session()->cl_h_name.' Created New Order';
			$message = '<html><body><p> Here is the Order Link</p><br><a target="_blank" href='.base_url('backend/order-s1/'.encryptIt($oid)).' style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a></body</html>';
				$newdata2 = [
					'ord_id' => $oid,
					'emp_id' =>$id,
					'link'	=> $link,
					'notification' => "New Order Added by Client",
					'status' => "0",
					'ord_cancel_bcl' => "0",
				];
				$nmodel->insert($newdata2);
				$session = session();
				if (sendEmail($to, $cc, $subject, $message)) {
					$session->setFlashdata('success', 'Order Successful Created');
					return redirect()->to('client/orders');
					} else {
						return redirect()->to('client/orders');
					}	
				
			}
		}


		return $this->LoadView('clients/new_order', $data);
	}

	public function order_edit($eoid = null)
	{
		$eoid = decryptIt($eoid);
		
		$id = session()->cl_id;
		$link = "backend/order_view";
		$data = [];
		helper(['form']);
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		$Nmodel = new notificationModel();
			$to = 'sralocum@sra.com';
			$cc = '';
			$subject = ''.session()->cl_h_name.' Updated Order';
			$message = '<html><body><p> Here is the Order Link</p><br><a target="_blank" href='.base_url('backend/order-s1/'.encryptIt($eoid)).' style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a></body</html>';
		

		$model = new ordersModel();
		$data['e_ord'] = $model->where('ord_id', $eoid)->first();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			
			$rules = [
				
				'ord_speciality' => ['label' => 'Speciality', 'rules' => 'required'],
				'ord_grade' => ['label' => 'Grade', 'rules' => 'required'],
				'ord_required_from' => ['label' => 'Required From', 'rules' => 'required'],
				'ord_required_to' => ['label' => 'Required To', 'rules' => 'required'],
				'ord_datetime_detail' => ['label' => 'Date & Time Details', 'rules' => 'required'],


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
					'ord_datetime_detail' => $this->request->getVar('ord_datetime_detail'),
					
				];
				$newdata2 = [
					'ord_id' => $eoid,
					'emp_id' =>$id,
					'link'	=> $link,
					'notification' => "Order updated by Client",
					'status' => "0",
				];
				$model->update($eoid,$newData);
				$Nmodel->insert($newdata2);
				$session = session();
				if (sendEmail($to, $cc, $subject, $message)) {
					$session->setFlashdata('success', 'Order Successful Updated');
					return redirect()->to('client/orders');
					} else {
						return redirect()->to('client/orders');
					}	
				
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
				'cl_eircode' => ['label' => 'Eircode', 'rules' => 'required'],
				'cl_cont_name' => ['label' => 'Contact Personnel Name', 'rules' => 'required'],
				'cl_cont_phone' => ['label' => 'Contact No.', 'rules' => 'required|numeric'],
				'cl_address' => ['label' => 'Address', 'rules' => 'required'],
				'cl_cont_desig' => ['label' => 'Designation', 'rules' => 'required'],
				 'cl_cont_email' => ['label' => 'Email', 'rules' => 'required'],
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
					'cl_cont_email' => $this->request->getVar('cl_cont_email'),

				];
				$model->update($id, $newData);
				$session = session();
				$session->setFlashdata('success', 'Record Successful Saved');
				return redirect()->to('client/profile');
			}
		}


		return $this->LoadView('clients/profile', $data);
	}

	public function order_status($oid = null)
	{
		$oid = decryptIt($oid);
		$data = [];

		$e2model = new ordersModel();
		$data['em_2'] = $e2model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $oid)->first();


		return $this->LoadView('clients/order_status', $data);
	}

public function order_confirm($oid = null)
	{
		$oid = decryptIt($oid);
		$id = session()->cl_id;
		$link = "backend/order_view";
		$data = [];

		$e2model = new ordersModel();
		$Nmodel = new notificationModel();

			$to = 'sralocum@sra.com';
			$cc = '';
			$subject = ''.session()->cl_h_name.' Confirmed Order';
			$message = '<html><body><p> Here is the Order Link</p><br><a target="_blank" href='.base_url('backend/order-s1/'.encryptIt($oid)).' style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a></body</html>';


		$newData = [
			'ord_status' => 3,
		];
		$newdata2 = [
			'ord_id' => $oid,
			'emp_id' =>$id,
			'link'	=> $link,
			'notification' => "Locum Confirmed by Client",
			'status' => "0",
		];
		$e2model->update($oid, $newData);
		$Nmodel->insert($newdata2);
				$session = session();
				if (sendEmail($to, $cc, $subject, $message)) {
					$session->setFlashdata('success', 'Order Confirmed');
					return redirect()->to('client/orders');
					} else {
						return redirect()->to('client/orders');
					}	
				

		
	}
	
	public function pending_order()
	{

		$data = [];
		$id = session()->cl_id;
		$timestamp = \time();
		$dt = date('Y-m-d H:i:s', $timestamp);
		helper(['form']);
		$model = new ordersModel();
		$data['o_pen'] = $model->where('ord_status', '1')->where('ord_required_to >=', $dt)->countAllResults();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('orders.ord_status', '1')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('clients.cl_id', session()->cl_id)->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('clients/new_orders', $data);
	}
	public function cur_processed()
	{

		$data = [];
		$id = session()->cl_id;
		helper(['form']);
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_status', '2')->where('orders.ord_status', '2')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('clients.cl_id', session()->cl_id)->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('clients/cur_processed', $data);
	}

	public function confirmed_orders()
	{

		$data = [];
		$id = session()->cl_id;
		helper(['form']);
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_status', '3')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('clients.cl_id', session()->cl_id)->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('clients/confirmed_orders', $data);
	}

	public function completed_order()
	{

		$data = [];
		$id = session()->cl_id;
		helper(['form']);
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_status', '4')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('clients.cl_id', session()->cl_id)->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('clients/completed_order', $data);
	}

}
