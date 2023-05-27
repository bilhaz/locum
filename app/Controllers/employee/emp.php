<?php

namespace App\Controllers\employee;



use App\Helpers\EmailHelper;
use App\Models\EmpModel;
use App\Models\gradeModel;
use App\Models\ordersModel;
use App\Models\specialityModel;
use App\Models\timesheetModel;
use App\Models\formulaModel;
use App\Models\notificationModel;
use DateTimeZone;

helper('email');
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
				'emp_email' => ['label' => 'Email', 'rules' => 'required'],
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
			} else {


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
	// Loading Forgot Password page
	public function forgot_pass()
	{
		$data = [];
		helper('form');

		return $this->LoadView('employees/forgot-password', $data);
	}

	// method for reset password verification & send email
	public function passwordReset()
	{
		$data = [];
		// date_default_timezone_set('Asia/Karachi'); // setting riyadh timezone

		// checking if it is valid ajax request
		if (!$this->request->isAJAX()) {
			exit('No direct script access allowed');
		}

		$email = $this->request->getPost('email'); // email input

		$model = new EmpModel(); //
		$candidate = $model->where('emp_email', $email)->first();

		if (is_array($candidate)) {

			//generate reset token
			$reset_token = urlencode(md5(time() . 'emp_created' . rand(1000, 99999) . rand(100, 999)));

			// creating token expiry date
			$now = date("Y-m-d H:m:s");
			$expirydate = date("Y-m-d H:i:s", strtotime('+24 hours', strtotime($now)));

			$upd = array('Reset_Token' => $reset_token, 'Reset_Token_Expiry' => $expirydate); // preparing data for updation

			if ($model->update($candidate['emp_id'], $upd)) { // updating record
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
	public function resetPasswordRequest($reset_token = '')
	{
		// date_default_timezone_set("Asia/Karachi");


		if ($reset_token == '') {
			show_404();
		}

		$model = new EmpModel(); // loading model
		$result = $model->where('Reset_Token',  urldecode($reset_token))->first();

		$data['expired'] = false;

		// checking for token expiry
		$now = date("Y-m-d H:m:s");
		if (strtotime($result['Reset_Token_Expiry']) < strtotime($now)) {
			$data['expired'] = true;
		}

		$data['reset_token'] = urldecode($reset_token);
		return $this->LoadView('employees/reset-password', $data);
		// echo view('site/password-reset', $data);

	}
	public function changePassword_Request()
	{


		$rules = [
			'password' => 'trim|min_length[8]|required', // validation rules
			'confirm_password' => 'required|matches[password]'
		];

		$reset_token = $this->request->getPost('reset_token');  // getting token input

		if (!$this->validate($rules)) {
			$data['validation'] = $this->validator; // validating inputs
			session()->setFlashdata('requestMsgErr', $this->validator->listErrors()); // passing validation errors
			return redirect()->to('employee/resetPasswordRequest/' . $reset_token);
		}

		$model = new EmpModel(); // loading model
		//update password
		$data = array(
			'Reset_Token' => '',
			'Reset_Token_Expiry' => NULL,
			'emp_pwd' => $this->request->getPost('password')
		);
		$result = $model->where('Reset_Token', $reset_token)->set($data)->update();

		//        $result = $siteModel->query("UPDATE pmc_et_tbl_basicentries SET Reset_Token = '', Reset_Token_Expiry = NULL, entPassword = OLD_PASSWORD('".$data['entPassword']."') WHERE Reset_Token = '$reset_token'");
		if ($result) { // checking if password updated
			session()->setFlashdata('success', 'Password Changed Sucessfully');
		}
		return redirect()->to('employee/login');
	}
	// email template
	private function PasswordResetEmailTemplate($email = '', $reset_token = '')
	{

		$ctrl = 'employee';
		// preparing data for email content
		$data = array(
			'controller' => $ctrl,
			'username' => $email,
			'reset_token' => $reset_token,
			'string' => 'Dear ',
			'host' => $_SERVER['HTTP_HOST'],
			'tokken_link' => base_url('employee/resetPasswordRequest/' . $reset_token)
		);


		$parser = \Config\Services::parser(); // loading parse library
		$email_page = $parser->setData($data)->render('employees/emails/reset-password'); // rendering password reset html
		//send email
		$to = $email;
		$cc = '';
		$subject = 'SRA-Password Reset Request';
		$message = $email_page;
		return (sendEmail($to, $cc, $subject, $message));
	}
	public function dashboard()
	{
		$data = [];
		$timestamp = \time();
		$dt = date('Y-m-d H:i:s', $timestamp);
		$model = new ordersModel();
		$data['o_pen'] = $model->where('ord_status', '1')->where('emp_id', session()->emp_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_pro'] = $model->where('ord_status', '2')->where('emp_id', session()->emp_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_con'] = $model->where('ord_status', '3')->where('emp_id', session()->emp_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_end'] = $model->where('ord_status', '4')->where('emp_id', session()->emp_id)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();




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
				$model->update($usrid, $newData);
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
		$id = session()->emp_id;
		$emodel = new EmpModel();
		$data['e_doc'] = $emodel->where('emp_id', $id)->first();
		$model = new ordersModel();
		$data['order'] = $model->Join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->Join('timesheets', 'timesheets.order_id = orders.ord_id', 'LEFT')->where('orders.emp_id', session()->emp_id)->groupBy('orders.ord_id')->orderBy('ord_created', 'DESC')->findAll();

		return $this->LoadView('employees/contracts', $data);
	}

	public function order_view($oid = null)
	{
		$data = [];
		$oid = decryptIt($oid);

		$formula = new formulaModel();
		$data['forml'] = $formula->where('id', 1)->first();

		$ttmodel = new timesheetModel();
		$data['ord'] = $ttmodel->where('order_id', $oid)->first();

		$model = new ordersModel();
		$data['cont'] = $model->Join('clients', 'clients.cl_id = orders.cl_id')->Join('employee', 'employee.emp_id = orders.emp_id')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade')->where('ord_id', $oid)->first();

		return $this->LoadView('employees/order_view', $data);
	}

	public function upl_asses($asid = null)
	{
		$asid = decryptIt($asid);
		$id = session()->cl_id;
		$link = "backend/order_view";
		$data = [];
		helper(['form']);
		$Nmodel = new notificationModel();
		$model = new ordersModel();
		$data['e_ord'] = $model->where('ord_id', $asid)->first();
		$to = 'sralocum@sra.com';
		$cc = '';
		$subject = '' . session()->emp_email . ' Uploaded Assesment';
		$message = '<html><body><p> Here is the Assesment Link</p><br><a target="_blank" href=' . base_url('public/uploads/doc_assesment/' . encryptIt($data['e_ord']['ord_assignment'])) . ' style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a></body</html>';

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


				$newdata2 = [
					'ord_id' => $asid,
					'emp_id' => session()->emp_id,
					'link'	=> $link,
					'notification' => "Assesment uploaded by Employee",
					'status' => "0",
					'usr_type' => "admin",
				];

				$model->update($asid, $newData);
				$Nmodel->insert($newdata2);
				$session = session();
				if (sendEmail($to, $cc, $subject, $message)) {
					$session->setFlashdata('success', 'Assesment Successful Uploaded');
					return redirect()->to('employee/ord-view/' . encryptIt($asid));
				} else {
					return redirect()->to('employee/ord-view/' . encryptIt($asid));
				}
			}
		}


		return $this->LoadView('employees/upl_asses', $data);
	}



	public function timesheet($tid = null)
	{
		$tid = decryptIt($tid);
		$data = [];
		helper(['form']);

		$model = new ordersModel();
		$data['e_ord'] = $model->join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_id', $tid)->first();

		$data['start_date'] = $data['e_ord']['ord_process_details_from'];
		$data['end_date'] = $data['e_ord']['ord_process_details_to'];

		return $this->LoadView('employees/timesheet', $data);
	}

	public function timesheet_save($ord_id)
	{

		$ord_id = decryptIt($ord_id);
		$eid = session()->emp_id;
		$link = "backend/t-view";
		$model = new timesheetModel();
		$omodel = new ordersModel();
		$data['v_ordr'] = $omodel->join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_id', $ord_id)->first();
		$Nmodel = new notificationModel();
		$to = 'sralocum@sra.com,' . $data['v_ordr']['emp_email'];
		$cc = '';
		$subject = '' . session()->emp_email . 'Submitted Timesheet';
		$message = '<html><body><p> Here is the Timesheet Link</p><br><a target="_blank" href=' . base_url('backend/t-view/' . encryptIt($ord_id)) . ' style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a></body</html>';
		foreach ($_POST['status'] as $row => $key) {

			$model->insert(array('order_id' => $ord_id, 'dutyDate' => explode(',', $key)[0], 'dutyTime' => explode(',', $key)[1], 'siteStatus' => explode(',', $key)[2]));
		}
		$status = [
			'ord_time_sheet_mode' => 'online',
		];
		$newData = [
			'ord_id' => $ord_id,
			'emp_id' => $eid,
			'link'	=> $link,
			'notification' => "Timesheet submitted Online",
			'status' => "0",
			'usr_type' => "admin",
		];

		$Nmodel->save($newData);
		$omodel->update($ord_id, $status);
		$session = session();
		if (sendEmail($to, $cc, $subject, $message)) {
			$session->setFlashdata('success', 'TimeSheet Saved');
			return redirect()->to('employee/ord-view/' . encryptIt($ord_id));
		} else {
			return redirect()->to('employee/ord-view/' . encryptIt($ord_id));
		}
	}

	public function edit_timesheet($ord_id)
	{
		$data = [];

		$ord_id = decryptIt($ord_id);
		$model = new timesheetModel();
		$data['t_view'] = $model->where('order_id', $ord_id)->find();

		$model = new ordersModel();
		$data['e_ord'] = $model->join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_id', $ord_id)->first();

		$data['start_date'] = $data['e_ord']['ord_process_details_from'];
		$data['end_date'] = $data['e_ord']['ord_process_details_to'];


		return $this->LoadView('employees/edit_timesheet', $data);
	}

	public function timesheet_upd($ord_id)
	{
		$data = [];

		$ord_id = decryptIt($ord_id);
		$eid = session()->emp_id;
		$link = "backend/t-view";
		$model = new timesheetModel();
		$omodel = new ordersModel();
		$data['v_ordr'] = $omodel->join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_id', $ord_id)->first();
		$Nmodel = new notificationModel();
		$to = 'sralocum@sra.com,' . $data['v_ordr']['emp_email'];
		$cc = '';
		$subject = '' . session()->emp_email . ' Updated Timesheet';
		$message = '<html><body><p> Here is the Timesheet Link</p><br><a target="_blank" href=' . base_url('backend/t-view/' . encryptIt($ord_id)) . ' style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a></body</html>';
		// Delete all existing timesheet data for this order
		$model->where(['order_id' => $ord_id])->delete();

		// Insert the updated timesheet data
		foreach ($_POST['status'] as $row => $key) {
			$model->insert(['order_id' => $ord_id, 'dutyDate' => explode(',', $key)[0], 'dutyTime' => explode(',', $key)[1], 'siteStatus' => explode(',', $key)[2]]);
		}
		$newData = [
			'ord_id' => $ord_id,
			'emp_id' => $eid,
			'link'	=> $link,
			'notification' => "Timesheet was Updated",
			'status' => "0",
			'usr_type' => "admin"
		];
		$Nmodel->save($newData);
		$session = session();
		if (sendEmail($to, $cc, $subject, $message)) {
			$session->setFlashdata('success', 'TimeSheet Updated');
			return redirect()->to('employee/t-edit/' . encryptIt($ord_id));
		} else {
			return redirect()->to('employee/t-edit/' . encryptIt($ord_id));
		}
	}

	public function timesheet_view($ord_id)
	{
		$data = [];

		$ord_id = decryptIt($ord_id);
		$model = new timesheetModel();
		$data['t_view'] = $model->where('order_id', $ord_id)->find();

		$model = new ordersModel();
		$data['e_ord'] = $model->join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_id', $ord_id)->first();

		$data['start_date'] = $data['e_ord']['ord_process_details_from'];
		$data['end_date'] = $data['e_ord']['ord_process_details_to'];


		return $this->LoadView('employees/timesheet_view', $data);
	}


	public function profile()
	{

		$data = [];
		$spModel = new specialityModel();
		$data['spec'] = $spModel->findAll();

		$grModel = new gradeModel();
		$data['grade'] = $grModel->findAll();

		$id = session()->emp_id;
		helper(['form']);
		$model = new EmpModel();
		$data['emp'] = $model->where('emp_id', $id)->first();
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here

			$rules = [
				'emp_fname' => ['label' => 'First Name', 'rules' => 'required'],
				'emp_lname' => ['label' => 'Last Name', 'rules' => 'required'],
				'emp_spec1' => ['label' => 'Speciality 1', 'rules' => 'required'],
				'emp_grade1' => ['label' => 'Grade 1', 'rules' => 'required'],
				'emp_pps_no' => ['label' => 'PPS No.', 'rules' => 'required'],
				'emp_phone' => ['label' => 'Phone No.', 'rules' => 'required|numeric'],
				'emp_imcr_no' => ['label' => 'IMCR No.', 'rules' => 'required'],
				'emp_cv' => ['label' => 'CV', 'rules' => 'uploaded[emp_cv]|ext_in[emp_cv,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_cv,2048]'],
				'emp_imc_cert' => ['label' => 'IMC Certificate', 'rules' => 'uploaded[emp_imc_cert]|ext_in[emp_imc_cert,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_imc_cert,2048]'],
				'emp_gv_cert' => ['label' => 'Garda Vetting', 'rules' => 'uploaded[emp_gv_cert]|ext_in[emp_gv_cert,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_gv_cert,2048]'],
				'emp_rec_refer' => ['label' => 'Recent Reference', 'rules' => 'uploaded[emp_rec_refer]|ext_in[emp_rec_refer,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_rec_refer,2048]'],
				'emp_passport' => ['label' => 'Passport', 'rules' => 'uploaded[emp_passport]|ext_in[emp_passport,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_passport,2048]'],
				'emp_occup_health' => ['label' => 'Occupational Health', 'rules' => 'uploaded[emp_occup_health]|ext_in[emp_occup_health,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_occup_health,2048]'],
				'emp_work_permit' => ['label' => 'Work Permit', 'rules' => 'uploaded[emp_work_permit]|ext_in[emp_work_permit,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_work_permit,2048]'],
				'emp_gender' => ['label' => 'Gender', 'rules' => 'required'],
			];
			foreach (['emp_cv', 'emp_imc_cert', 'emp_gv_cert', 'emp_rec_refer', 'emp_passport', 'emp_occup_health', 'emp_work_permit'] as $field) {
				if (empty($_FILES[$field]['name'])) {
					unset($rules[$field]);
				}
			}


			$errors = [
				'emp_cv' => [
					'uploaded' => 'Can not upload, not a valid file',
					'max_size' => 'File size must be less than 2MB',
				],

				'emp_imc_cert' => [
					'uploaded' => 'Can not upload not a valid file',
					'max_size' => 'File size must be less than 2MB'
				],
				'emp_gv_cert' => [
					'uploaded' => 'Can not upload not a valid file',
					'max_size' => 'File size must be less than 2MB'
				],
				'emp_rec_refer' => [
					'uploaded' => 'Can not upload not a valid file',
					'max_size' => 'File size must be less than 2MB'
				],

				'emp_passport' => [
					'uploaded' => 'Can not upload not a valid file',
					'max_size' => 'File size must be less than 2MB'
				],

				'emp_occup_health' => [
					'uploaded' => 'Can not upload not a valid file',
					'max_size' => 'File size must be less than 2MB'
				],

				'emp_work_permit' => [
					'uploaded' => 'Can not upload not a valid file',
					'max_size' => 'File size must be less than 2MB'
				],

			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {


				$cv = $this->request->getFile('emp_cv');

				if ($cv->isValid() && !$cv->hasMoved()) {
					$cvname = encryptIt($cv->getName()) . '.' . pathinfo($_FILES['emp_cv']['name'], PATHINFO_EXTENSION);

					$cv->move('public/uploads/employee_attach/', $cvname, true);
				} else {
					$cv = $this->request->getPost('emp_cvv');
					$cvname = $cv;
				}

				$emp_imc_cert = $this->request->getFile('emp_imc_cert');

				if ($emp_imc_cert->isValid() && !$emp_imc_cert->hasMoved()) {
					$emp_imc_cert_name = encryptIt($emp_imc_cert->getName()) . '.' . pathinfo($_FILES['emp_imc_cert']['name'], PATHINFO_EXTENSION);

					$emp_imc_cert->move('public/uploads/employee_attach/', $emp_imc_cert_name, true);
				} else {
					$emp_imc_cert = $this->request->getPost('emp_imc_certt');
					$emp_imc_cert_name = $emp_imc_cert;
				}

				$emp_gv_cert = $this->request->getFile('emp_gv_cert');

				if ($emp_gv_cert->isValid() && !$emp_gv_cert->hasMoved()) {
					$emp_gv_cert_name = encryptIt($emp_gv_cert->getName()) . '.' . pathinfo($_FILES['emp_gv_cert']['name'], PATHINFO_EXTENSION);

					$emp_gv_cert->move('public/uploads/employee_attach/', $emp_gv_cert_name, true);
				} else {
					$emp_gv_cert = $this->request->getPost('emp_gv_certt');
					$emp_gv_cert_name = $emp_gv_cert;
				}

				$emp_rec_refer = $this->request->getFile('emp_rec_refer');

				if ($emp_rec_refer->isValid() && !$emp_rec_refer->hasMoved()) {
					$emp_rec_refer_name = encryptIt($emp_rec_refer->getName()) . '.' . pathinfo($_FILES['emp_rec_refer']['name'], PATHINFO_EXTENSION);

					$emp_rec_refer->move('public/uploads/employee_attach/', $emp_rec_refer_name, true);
				} else {
					$emp_rec_refer = $this->request->getPost('emp_rec_referr');
					$emp_rec_refer_name = $emp_rec_refer;
				}

				$emp_passport = $this->request->getFile('emp_passport');

				if ($emp_passport->isValid() && !$emp_passport->hasMoved()) {
					$emp_passport_name = encryptIt($emp_passport->getName()) . '.' . pathinfo($_FILES['emp_passport']['name'], PATHINFO_EXTENSION);

					$emp_passport->move('public/uploads/employee_attach/', $emp_passport_name, true);
				} else {
					$emp_passport = $this->request->getPost('emp_passportt');
					$emp_passport_name = $emp_passport;
				}

				$emp_occup_health = $this->request->getFile('emp_occup_health');

				if ($emp_occup_health->isValid() && !$emp_occup_health->hasMoved()) {
					$emp_occup_health_name = encryptIt($emp_occup_health->getName()) . '.' . pathinfo($_FILES['emp_occup_health']['name'], PATHINFO_EXTENSION);

					$emp_occup_health->move('public/uploads/employee_attach/', $emp_occup_health_name, true);
				} else {
					$emp_occup_health = $this->request->getPost('emp_occup_healthh');
					$emp_occup_health_name = $emp_occup_health;
				}

				$emp_work_permit = $this->request->getFile('emp_work_permit');

				if ($emp_work_permit->isValid() && !$emp_work_permit->hasMoved()) {
					$emp_work_permit_name = encryptIt($emp_work_permit->getName()) . '.' . pathinfo($_FILES['emp_work_permit']['name'], PATHINFO_EXTENSION);

					$emp_work_permit->move('public/uploads/employee_attach/', $emp_work_permit_name, true);
				} else {
					$emp_work_permit = $this->request->getPost('emp_work_permitt');
					$emp_work_permit_name = $emp_work_permit;
				}

				//store this to database

				$model = new EmpModel();
				$newData = [
					'emp_fname' => $this->request->getVar('emp_fname'),
					'emp_lname' => $this->request->getVar('emp_lname'),
					'emp_gender' => $this->request->getVar('emp_gender'),
					'emp_spec1' => $this->request->getVar('emp_spec1'),
					'emp_spec2' => $this->request->getVar('emp_spec2'),
					'emp_spec3' => $this->request->getVar('emp_spec3'),
					'emp_grade1' => $this->request->getVar('emp_grade1'),
					'emp_grade2' => $this->request->getVar('emp_grade2'),
					'emp_grade3' => $this->request->getVar('emp_grade3'),
					'emp_pps_no' => $this->request->getVar('emp_pps_no'),
					'emp_phone' => $this->request->getVar('emp_phone'),
					'emp_imcr_no' => $this->request->getVar('emp_imcr_no'),
					'emp_cv' => $cvname,
					'emp_imc_cert' => $emp_imc_cert_name,
					'emp_gv_cert' => $emp_gv_cert_name,
					'emp_rec_refer' => $emp_rec_refer_name,
					'emp_passport' => $emp_passport_name,
					'emp_occup_health' => $emp_occup_health_name,
					'emp_work_permit' => $emp_work_permit_name,


				];
				$model->update($id, $newData);
				$session = session();
				$session->setFlashdata('success', 'Data Successful Saved');
				return redirect()->to('employee/profile');
			}
		}


		return $this->LoadView('employees/profile', $data);
	}

	public function pending_assign()
	{

		$data = [];
		$id = session()->cl_id;
		$timestamp = \time();
		$dt = date('Y-m-d H:i:s', $timestamp);
		helper(['form']);
		$emodel = new EmpModel();
		$data['e_doc'] = $emodel->where('emp_id', $id)->first();
		$model = new ordersModel();
		$data['o_pen'] = $model->where('ord_status', '1')->where('ord_required_to >=', $dt)->countAllResults();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('orders.ord_status', '1')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('employee.emp_id', session()->emp_id)->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('employees/pending_assigment', $data);
	}
	public function processed_assign()
	{

		$data = [];
		$id = session()->cl_id;
		helper(['form']);
		$emodel = new EmpModel();
		$data['e_doc'] = $emodel->where('emp_id', $id)->first();
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_status', '2')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('employee.emp_id', session()->emp_id)->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('employees/processed_assign', $data);
	}

	public function confirmed_assign()
	{

		$data = [];
		$id = session()->cl_id;
		helper(['form']);
		$emodel = new EmpModel();
		$data['e_doc'] = $emodel->where('emp_id', $id)->first();
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_status', '3')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('employee.emp_id', session()->emp_id)->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('employees/confirmed_assign', $data);
	}

	public function completed_assign()
	{

		$data = [];
		$id = session()->cl_id;
		helper(['form']);
		$emodel = new EmpModel();
		$data['e_doc'] = $emodel->where('emp_id', $id)->first();
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')->where('ord_status', '4')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->where('employee.emp_id', session()->emp_id)->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('employees/completed_assign', $data);
	}
	public function advt_apply($id = null)
	{
		$id = decryptIt($id);
		$link = "backend/order_view";
		$data = [];
		$eid = session()->emp_id;
		helper(['form']);
		$Nmodel = new notificationModel();
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id', 'LEFT')->Join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality', 'LEFT')->Join('emp_grade', 'emp_grade.grade_id = orders.ord_grade', 'LEFT')
			->where('orders.ord_id', $id)
			->orderBy('orders.ord_updated', 'DESC')
			->first();

		$to = 'sralocum@sra.com';
		$cc = '';
		$subject = '' . session()->emp_email . ' Applied for Locum';
		$message = $this->LoadView('employees/emails/advt_apply', $data);

		$session = session();
		if (sendEmail($to, $cc, $subject, $message)) {
			$newdata2 = [
				'ord_id' => $id,
				'emp_id' => $eid,
				'link'	=> $link,
				'notification' => "" . session()->emp_fname . '' . session()->emp_lname . " Applied For Locum",
				'status' => "0",
				'usr_type' => "admin",
			];
			$Nmodel->insert($newdata2);
			return redirect()->to('employee/advt_applied');
		} else {
			$session->setFlashdata('error', 'Apply Failed');
			return redirect()->to('employee/orders');
		}
	}
	public function advt_applied($id = null)
	{

		$to = session()->emp_email;
		$cc = '';
		$subject = 'Applied Successfully for Locum';
		$message = $this->LoadView('employees/emails/advt_applied');

		$session = session();
		if (sendEmail($to, $cc, $subject, $message)) {
			$session->setFlashdata('success', 'Applied for Locum Successfully');
			return redirect()->to('employee/orders');
		} else {
			$session->setFlashdata('error', 'Apply Failed');
			return redirect()->to('employee/orders');
		}
	}

	public function get_notif()
	{
		$data = [];
		$model = new notificationModel();
		// fetch live data from the database and store it in $data
		$data = $model->where('emp_id', session()->emp_id)->where('usr_type', 'employee')->orderBy('status', 'ASC')->orderBy('created_at', 'DESC')->limit(8)->find(); // your database query here
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
		$data = $model->where('usr_type', 'employee')->where('status', '0')->orderBy('created_at', 'DESC')->limit(8)->find(); // your database query here

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
		$count = $model->where('emp_id', session()->emp_id)->where('status', 0)->where('usr_type', 'employee')->countAllResults();
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
}
