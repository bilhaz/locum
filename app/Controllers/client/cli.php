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
	// Loading Forgot Password page
	public function forgot_pass() {
		$data = [];
		helper('form');

		return $this->LoadView('clients/forgot-password', $data);
	}
	// method for reset password verification & send email
    public function passwordReset() {
		$data = [];
        // date_default_timezone_set('Asia/Karachi'); // setting riyadh timezone
        
        // checking if it is valid ajax request
        if (!$this->request->isAJAX()) {
            exit('No direct script access allowed');
        }

        $email = $this->request->getPost('email'); // email input

        $model = new ClientModel(); //
        $candidate = $model->where('cl_cont_email', $email)->first();

        if (is_array($candidate)) {

            //generate reset token
            $reset_token = urlencode(md5(time() . 'cl_created' . rand(1000, 99999) . rand(100, 999)));
            
            // creating token expiry date
            $now = date("Y-m-d H:m:s");
            $expirydate = date("Y-m-d H:i:s", strtotime('+24 hours', strtotime($now))); 

            $upd = array('Reset_Token' => $reset_token,'Reset_Token_Expiry'=>$expirydate); // preparing data for updation

            if ($model->update($candidate['cl_id'], $upd)) { // updating record
                if ($this->PasswordResetEmailTemplate($email, $reset_token)) { // sending email
                    echo json_encode(array('info' => '1', 'msg' => 'email sent successfully')); // success msg
                } else {

                    echo json_encode(array('info' => '0', 'msg' => 'email not sent')); // error msg
                }
            } else {
                return json_encode(array('info' => '0', 'msg' => 'Error')); // error msg
            }
        } else {
            echo json_encode(array('info' => '0', 'msg' => 'Email not registered')); // // error msg
        }
		
    }
	// method to load password-reset view
    public function resetPasswordRequest($reset_token = '') {
        // date_default_timezone_set("Asia/Karachi");
        
		
        if ($reset_token == '') {
            show_404();
        }
        
        $model = new ClientModel(); // loading model
        $result = $model->where('Reset_Token',  urldecode($reset_token))->first();
        
        $data['expired'] = false ;
        
        // checking for token expiry
        $now = date("Y-m-d H:m:s");
        if(strtotime($result['Reset_Token_Expiry']) < strtotime($now)){
            $data['expired'] = true ;
        }
        
        $data['reset_token'] = urldecode($reset_token);
		return $this->LoadView('clients/reset-password', $data);
        // echo view('site/password-reset', $data);
        
    }
	public function changePassword_Request() {


        $rules = [
			'password' => 'trim|min_length[8]|required', // validation rules
            'confirm_password' => 'required|matches[password]'
		];

        $reset_token = $this->request->getPost('reset_token');  // getting token input

        if (!$this->validate($rules)) {
			$data['validation'] = $this->validator;// validating inputs
            session()->setFlashdata('requestMsgErr', $this->validator->listErrors()); // passing validation errors
            return redirect()->to('client/resetPasswordRequest/' . $reset_token);
        }

        $model = new ClientModel(); // loading model
        //update password
        $data = array(
            'Reset_Token' => '',
            'Reset_Token_Expiry' => NULL,
            'cl_cont_pwd' => $this->request->getPost('password')
        );
        $result = $model->where('Reset_Token', $reset_token)->set($data)->update();

//        $result = $siteModel->query("UPDATE pmc_et_tbl_basicentries SET Reset_Token = '', Reset_Token_Expiry = NULL, entPassword = OLD_PASSWORD('".$data['entPassword']."') WHERE Reset_Token = '$reset_token'");
        if ($result) { // checking if password updated
            session()->setFlashdata('success', 'Password Changed Sucessfully');
        }
        return redirect()->to('client/login');
    }
	 // email template
	 private function PasswordResetEmailTemplate($email = '', $reset_token = '') {

        $ctrl = 'client';
        // preparing data for email content
        $data = array(
            'controller' => $ctrl,
            'username' => $email,
            'reset_token' => $reset_token,
            'string' => 'Dear ',
            'host' => $_SERVER['HTTP_HOST'],
            'tokken_link' => base_url('client/resetPasswordRequest/' . $reset_token)
        );


        $parser = \Config\Services::parser(); // loading parse library
        $email_page = $parser->setData($data)->render('clients/emails/reset-password'); // rendering password reset html
        //send email
        $to = $email;
		$cc = '';
		$subject = 'SRA-Password Reset Request';
		$message = $email_page;
		$emLog = [
			'em_to' => $to,
			'em_subject' => $subject,
			'em_body' => $message,
			'row_id' => 'NULL',
			'action_table' => 'clients',
			'em_status' => '1' ,
	];
	em_log($emLog);
        return(sendEmail($to, $cc, $subject, $message));
    }

	public function dashboard()
	{
		$data = [];
		$timestamp = \time();
		$dt = date('Y-m-d H:i:s', $timestamp);
		$model = new ordersModel();
		$data['o_pen'] = $model->where('ord_status', '1')->where('cl_id', session()->cl_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('ord_required_to >=', $dt)->orWhere('ord_status', NULL)->where('cl_id', session()->cl_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('ord_required_to >=', $dt)->countAllResults();
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
			$to = 'info@sralocum.com';
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
			cursor: pointer;">Click to View</a><h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter`s, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p></body</html>';
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
			'usr_type' => "admin",
			];
		}
			$model->update($coid, $newData);
			$Nmodel->insert($newdata2);
			$session = session();
			if (sendEmail($to, $cc, $subject, $message)) {
				$emLog = [
					'em_to' => $to,
					'em_subject' => $subject,
					'em_body' => $message,
					'row_id' => $coid,
					'action_table' => 'Orders',
					'em_status' => '1' ,
			];
			em_log($emLog);
				$session->setFlashdata('success', 'Order Cancelled');
				return redirect()->to('client/orders');
				} else {
					$emLog = [
						'em_to' => $to,
						'em_subject' => $subject,
						'em_body' => $message,
						'row_id' => $coid,
						'action_table' => 'Orders',
						'em_status' => '0' ,
				];
				em_log($emLog);
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
			$to = $data['e_ord']['emp_email'];
			$cc = 'info@sralocum.com';
			$subject = ''.session()->cl_h_name.' Approved your Timesheet';
			$message = $this->LoadView('clients/emails/timesheetApproved_emp', $data);

		$newData = [
			'ord_time_sheet_approved' => "Approved",

		];
        $newdata2 = [
			'ord_id' => $id,
			'emp_id' =>$cid,
			'link'	=> $link,
			'notification' => "Timsheet Approved by Client",
			'status' => "0",
			'usr_type' => "admin",
			];


		$model->update($id, $newData);
		$Nmodel->insert($newdata2);
		$session = session();
		if (sendEmail($to, $cc, $subject, $message)) {
			$session->setFlashdata('success', 'Timesheet Approved');
			$emLog = [
				'em_to' => $to,
				'em_subject' => $subject,
				'em_body' => $message,
				'row_id' => $id,
				'action_table' => 'Orders',
				'em_status' => '1' ,
		];
		em_log($emLog);
		return redirect()->to('client/timesheet/'.encryptIt($data['e_ord']['ord_id']));
			} else {
				$emLog = [
					'em_to' => $to,
					'em_subject' => $subject,
					'em_body' => $message,
					'row_id' => $id,
					'action_table' => 'Orders',
					'em_status' => '0' ,
			];
			em_log($emLog);
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
					'cl_id'=> session()->cl_id,
					
				];
				$model->insert($newData);
				$oid = $model->insertID;
			$to = 'info@sralocum.com';
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
			cursor: pointer;">Click to View</a><h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter`s, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p></body></html>';
				$newdata2 = [
					'ord_id' => $oid,
					'emp_id' =>$id,
					'link'	=> $link,
					'notification' => "New Order Added by Client",
					'status' => "0",
					'usr_type' => "admin",
				];
				$nmodel->insert($newdata2);
				$session = session();
				if (sendEmail($to, $cc, $subject, $message)) {
					$session->setFlashdata('success', 'Order Successful Created');
					$emLog = [
						'em_to' => $to,
						'em_subject' => $subject,
						'em_body' => $message,
						'row_id' => $oid,
						'action_table' => 'Orders',
						'em_status' => '1' ,
				];
				em_log($emLog);
					return redirect()->to('client/orders');
					} else {
						$emLog = [
							'em_to' => $to,
							'em_subject' => $subject,
							'em_body' => $message,
							'row_id' => $oid,
							'action_table' => 'Orders',
							'em_status' => '0' ,
					];
					em_log($emLog);
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
		$model = new ordersModel();
		$data['e_ord'] = $model->join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->where('ord_id', $eoid)->first();
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		$Nmodel = new notificationModel();
			$to = 'info@sralocum.com';
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
			cursor: pointer;">Click to View</a><h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter`s, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p></body</html>';
		

		

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
					'usr_type' => "admin",
				];
				$model->update($eoid,$newData);
				$Nmodel->insert($newdata2);
				$session = session();
				if (sendEmail($to, $cc, $subject, $message)) {
					$session->setFlashdata('success', 'Order Successful Updated');
					$emLog = [
						'em_to' => $to,
						'em_subject' => $subject,
						'em_body' => $message,
						'row_id' => $eoid,
						'action_table' => 'Orders',
						'em_status' => '1' ,
				];
				em_log($emLog);
					return redirect()->to('client/orders');
					} else {
						$emLog = [
							'em_to' => $to,
							'em_subject' => $subject,
							'em_body' => $message,
							'row_id' => $eoid,
							'action_table' => 'Orders',
							'em_status' => '0' ,
					];
					em_log($emLog);
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
		$data['e_ord'] = $e2model->join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_id', $oid)->first();
		$Nmodel = new notificationModel();

			$to = 'info@sralocum.com';
			$cc = '';
			$subject = ''.session()->cl_h_name.' Confirmed Order';
			$message = '<html><body><p> Here is the Order Link</p><br><a target="_blank" href='.base_url('backend/order-s4/'.encryptIt($oid)).' style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a><h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter`s, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p></body></html>';

            $newData1 = [
                'ord_client_confirnFlag' => '1',
                ];
		
		$newdata2 = [
			'ord_id' => $oid,
			'emp_id' =>$id,
			'link'	=> $link,
			'notification' => "Locum Confirmed by Client",
			'status' => "0",
			'usr_type' => "admin",
		];
		$Nmodel->insert($newdata2);
		$e2model->update($oid,$newData1);
				$session = session();
				if (sendEmail($to, $cc, $subject, $message)) {
					$session->setFlashdata('success', 'Order Confirmed');
					$emLog = [
						'em_to' => $to,
						'em_subject' => $subject,
						'em_body' => $message,
						'row_id' => $oid,
						'action_table' => 'Orders',
						'em_status' => '1' ,
				];
				em_log($emLog);
					return redirect()->to('client/orders');
					} else {
						$emLog = [
							'em_to' => $to,
							'em_subject' => $subject,
							'em_body' => $message,
							'row_id' => $oid,
							'action_table' => 'Orders',
							'em_status' => '0' ,
					];
					em_log($emLog);
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
		$data['o_pen'] = $model->where('ord_status', '1')->where('ord_required_to >=', $dt)->orwhere('ord_status', NULL)->where('ord_required_to >=', $dt)->countAllResults();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('orders.ord_status', '1')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('clients.cl_id', session()->cl_id)->where('ord_required_to >=', $dt)->orWhere('orders.ord_status', NULL)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('clients.cl_id', session()->cl_id)->where('ord_required_to >=', $dt)->orderBy('ord_updated', 'DESC')->findAll();

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

public function get_notif()
	{
		$data = [];
		$model = new notificationModel();
		// fetch live data from the database and store it in $data
		$data = $model->where('emp_id', session()->cl_id)->where('usr_type','client')->orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->limit(8)->find(); // your database query here
		// fetch the count of unseen notifications
		$count = $model->where('status', 0)->countAllResults();

		foreach ($data as $row) {
			$url = base_url($row['link'] . '/' . encryptIt($row['ord_id']));
			echo '<li class="d-flex">
				<div class="feeds-left"><i class="fa fa-calendar"></i></div>
				<div class="feeds-body flex-grow-1">
					<h6 class="mb-1" >' . $row['notification'] . '<small class="float-end text-muted small">' . date("d-m-y", strtotime($row['created_at'])) . '</small><br></h6>
					<span class="text-muted"><a class="notification" href="#!" onclick="seenaa(' . $row['id'] . ',\'' . $url . '\')" >Click here to view</a> <b style="float:right;">' . ($row['status'] == 1 ? 'Seen' : '') . '</b></span>
				</div>
			</li>';
		}

		// return the data as JSON
		// return $this->response->setJSON(['count' => $count]);
	}
	public function show_notif()
	{
		$data = [];
		$model = new notificationModel();
		// fetch live data from the database and store it in $data
		$data = $model->where('usr_type', 'client')->where('status', '0')->orderBy('created_at', 'DESC')->limit(8)->find(); // your database query here

		foreach ($data as &$notification) {
			$notification['ord_id'] = encryptIt($notification['ord_id']);
		}
		// Return the JSON and HTML data
		echo json_encode($data);
	}
	public function get_notifcount()
	{
		$data = [];
		$model = new notificationModel();
		// fetch the count of unseen notifications
		$count = $model->where('status', 0)->where('usr_type', 'client')->where('emp_id', session()->cl_id)->countAllResults();
		echo $count;
		// return the count as JSON
		// return $this->response->setJSON(['count' => $count]);
	}
	public function notif_seen()
	{

		$data = [];
		$id = $this->request->getPost('id');
		$model = new notificationModel();
		$data['notif_id'] = $model->where('id', $id)->first();
		// 		$notid = $data['notif_id']['id'];
		$newdata = [
			'status' => '1',
		];

		$model->update($id, $newdata);
		// return the data as JSON



		// $model = new NotificationModel();
		// $model->update($id, ['status' => 1]);
		return json_encode(['success' => true]); // return JSON response

	}
	public function await_timesheet()
	{

		$data = [];

		$model = new ordersModel();
		$data['t_order'] = $model->Join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')
			->Join('timesheets', 'timesheets.order_id = orders.ord_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')
			->where('ord_status >', '3')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('ord_time_sheet_approved', 'Sent_for_verification')->where('orders.cl_id', session()->cl_id)->groupBy('orders.ord_id')->orderBy('orders.ord_id', 'DESC')
			->findAll();

		return $this->LoadView('clients/await_rimesheets', $data);
	}
}