<?php

namespace App\Controllers\admin;


use App\Helpers\EmailHelper;
use App\Models\UserModel;
use App\Models\EmpModel;
use App\Models\ClientModel;
use App\Models\gradeModel;
use App\Models\ordersModel;
use App\Models\specialityModel;
use App\Models\clRegModel;
use App\Models\formulaModel;
use App\Models\usrgrpModel;
use App\Models\timesheetModel;
use App\Models\notificationModel;

class Backend extends BEBaseController
{
	public static $allowedRoles = [
	    'index' => ['super_admin', 'admin', 'user'],
	    'login' => ['super_admin', 'admin', 'user'],
	    'backend' => ['super_admin', 'admin', 'user'],
		'dashboard' => ['super_admin', 'admin', 'user'],
		'destroy' => ['super_admin', 'admin', 'user'],
		'pwdupd' => ['super_admin', 'admin', 'user'],
		'employees' => ['super_admin', 'admin', 'user'],
		'reg_emp' => ['super_admin', 'admin', 'user'],
		'emp_details' => ['super_admin', 'admin', 'user'],
		'emp_edit' => ['super_admin', 'admin', 'user'],
		'emp_block' => ['super_admin', 'admin', 'user'],
		'emp_unblock' => ['super_admin', 'admin', 'user'],
		'block_employees' => ['super_admin', 'admin', 'user'],
		'employee-pwd' => ['super_admin'],
		'clients' => ['super_admin', 'admin', 'user'],
		'reg_client' => ['super_admin', 'admin', 'user'],
		'client_details' => ['super_admin', 'admin', 'user'],
		'client_edit' => ['super_admin', 'admin', 'user'],
		'client_block' => ['super_admin', 'admin', 'user'],
		'client_unblock' => ['super_admin', 'admin', 'user'],
		'block_clients' => ['super_admin', 'admin', 'user'],
		'client-pwd' => ['super_admin'],
		'orders' => ['super_admin', 'admin', 'user'],
		'new_order_old' => ['super_admin', 'admin', 'user'],
		'new-order' => ['super_admin', 'admin', 'user'],
		'order-s1' => ['super_admin', 'admin', 'user'],
		'order-s2' => ['super_admin', 'admin', 'user'],
		'order-s3' => ['super_admin', 'admin', 'user'],
		'order-s4' => ['super_admin', 'admin', 'user'],
		'sFirstR' => ['super_admin', 'admin', 'user'],
		'sSecondR' => ['super_admin', 'admin', 'user'],
		'sThirdR' => ['super_admin', 'admin', 'user'],
		'sFourthR' => ['super_admin', 'admin', 'user'],
		'order_view' => ['super_admin', 'admin', 'user'],
		'order_edit' => ['super_admin', 'admin', 'user'],
		'ord_status' => ['super_admin', 'admin', 'user'],
		'email-1' => ['super_admin', 'admin', 'user'],
		'email-2' => ['super_admin', 'admin', 'user'],
		'email-3' => ['super_admin', 'admin', 'user'],
		'email-4' => ['super_admin', 'admin', 'user'],
		'contract' => ['super_admin', 'admin', 'user'],
		'pending_order' => ['super_admin', 'admin', 'user'],
		'cancelled_order' => ['super_admin', 'admin', 'user'],
		'confirm_order' => ['super_admin', 'admin', 'user'],
		'ended_order' => ['super_admin', 'admin', 'user'],
		'expired-orders' => ['super_admin', 'admin', 'user'],
		'expired-orders' => ['super_admin', 'admin', 'user'],
		'timesheet' => ['super_admin', 'admin', 'user'],
		't-fill' => ['super_admin', 'admin', 'user'],
		't-edit' => ['super_admin', 'admin', 'user'],
		't-view' => ['super_admin', 'admin', 'user'],
		't-upd' => ['super_admin', 'admin', 'user'],
		'timesheet_save' => ['super_admin', 'admin', 'user'],
		'timesheet-approve' => ['super_admin', 'admin', 'user'],
		'speciality' => ['super_admin', 'admin'],
		'new_spec' => ['super_admin', 'admin'],
		'edit_spec' => ['super_admin', 'admin'],
		'del_spec' => ['super_admin'],
		'grade' => ['super_admin', 'admin'],
		'new_grade' => ['super_admin', 'admin'],
		'edit_grade' => ['super_admin', 'admin'],
		'del_grade' => ['super_admin'],
		'cat' => ['super_admin', 'admin'],
		'new_cat' => ['super_admin', 'admin'],
		'edit_cat' => ['super_admin', 'admin'],
		'del_cat' => ['super_admin'],
		'users' => ['super_admin'],
		'createuser' => ['super_admin'],
		'edit-user' => ['super_admin'],
		'b-userp' => ['super_admin'],
		'change_doctor_cancelled_order' => ['super_admin','admin'],
		'formula' => ['super_admin', 'admin'],
		'edit-formula' => ['super_admin', 'admin'],
		'get_notif' => ['super_admin', 'admin', 'user'],
		'notif-seen' => ['super_admin', 'admin', 'user'],
		'notif-count' => ['super_admin', 'admin', 'user'],





	];
	public function login()
	{
		$data = [];
		helper(['form']);
		$validation = \Config\Services::validation();
		$model = new UserModel();
		$data['c_user'] = $model->where('usr_email', $this->request->getVar('usr_email'))
			->first();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'usr_email' => ['label' => 'Email', 'rules' => 'required|valid_email'],
				'usr_pwd' => ['label' => 'Password', 'rules' => 'required|validateAdmUser[usr_email,usr_pwd]'],
			];

			$errors = [
				'usr_pwd' => [
					'validateAdmUser' => 'Email or Password don\'t match'
				],

			];

			if (isset($data['c_user']['usr_status']) && $data['c_user']['usr_status'] == 0) {
				$session = session();
				$session->setFlashdata('error', 'Your Account is Disabled');
				return redirect()->to('backend/login');
			} else {


				if (!$this->validate($rules, $errors)) {


					$data['validation'] = $this->validator;
				} else {


					$admuser = $model->where('usr_email', $this->request->getVar('usr_email'))
						->first();

					$this->setUserSession($admuser);
					return redirect()->to('backend/dashboard');
				}
			}
		}

		return $this->LoadView('admin/login', $data);
	}

	public function forbidden()
	{
		return view('forbidden');
	}

	// Setting User Session
	private function setUserSession($admuser)
	{
		$data = [
			'usr_id' => $admuser['usr_id'],
			'grp_id' => $admuser['grp_id'],
			'usr_email' => $admuser['usr_email'],
			'usr_name' => $admuser['usr_name'],
			'usr_designation' => $admuser['usr_designation'],
			'ALoggedIn' => true,
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
		$data['o_pen'] = $model->where('ord_status', '1')->where('ord_required_to >=', $dt)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_pro'] = $model->where('ord_status', '2')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_con'] = $model->where('ord_status', '3')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_end'] = $model->where('ord_status', '4')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_exp'] = $model->where('ord_required_to <=', $dt)->where('ord_status', '1')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->countAllResults();
		$data['o_canc'] = $model->where('ord_cancel_bcl', '1')->orWhere('ord_cancel_bdr', '1')->countAllResults();




		return $this->LoadView('admin/dashboard', $data);
	}

	public function users()
	{
		$data = [];

		helper(['form']);
		$user = new UserModel();
		$data['usr_row'] = $user->findAll();

		return $this->LoadView('admin/users', $data);
	}

	public function register()
	{
		$data = [];
		$grps = new usrgrpModel();
		$data['grp'] = $grps->findAll();
		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'usr_email' => ['label' => 'Email', 'rules' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[users.usr_email]'],
				'usr_pwd' => ['label' => 'password', 'rules' => 'required|min_length[8]|max_length[25]'],
				'password_confirm' => ['label' => 'Confirm Password', 'rules' => 'matches[usr_pwd]'],
				'usr_name' => ['label' => 'Name', 'rules' => 'required'],
				'usr_designation' => ['label' => 'Designation', 'rules' => 'required'],
				'grp_id' => ['label' => 'Group', 'rules' => 'required'],
				'usr_status' => ['label' => 'Status', 'rules' => 'required'],


			];
			$errors = [
				'usr_pwd' => [
					'validateUser' => 'Password field does\'t match'
				],
				'usr_email' => [
					'validateUser' => 'email is not valid and it\'s required',
					'is_unique' => 'This email is already Registered'
				],
				
			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				//store this to database

				$model = new UserModel();
				$newData = [
					'usr_email' => $this->request->getVar('usr_email'),
					'usr_pwd' => $this->request->getVar('usr_pwd'),
					'usr_name' => $this->request->getVar('usr_name'),
					'usr_designation' => $this->request->getVar('usr_designation'),
					'grp_id' => $this->request->getVar('grp_id'),
					'usr_status' => $this->request->getVar('usr_status'),

				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Registration Successful');
				return redirect()->to('backend/users');
			}
		}

		return $this->LoadView('admin/new_user', $data);
	}

	public function edit_user($uid = null)
	{
		$uid = decryptIt($uid);
		$data = [];
		$grps = new usrgrpModel();
		$data['grp'] = $grps->findAll();

		$model = new UserModel();
		$data['euser'] = $model->where('usr_id', $uid)->first();

		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'usr_email' => ['label' => 'Email', 'rules' => 'required|min_length[8]|max_length[50]|valid_email'],
				'usr_name' => ['label' => 'Name', 'rules' => 'required'],
				'usr_designation' => ['label' => 'Designation', 'rules' => 'required'],
				'grp_id' => ['label' => 'Group', 'rules' => 'required'],
				'usr_status' => ['label' => 'Status', 'rules' => 'required'],


			];


			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {
				//store this to database


				$newData = [
					'usr_email' => $this->request->getVar('usr_email'),
					'usr_name' => $this->request->getVar('usr_name'),
					'usr_designation' => $this->request->getVar('usr_designation'),
					'grp_id' => $this->request->getVar('grp_id'),
					'usr_status' => $this->request->getVar('usr_status'),

				];
				$model->update($uid, $newData);
				$session = session();
				$session->setFlashdata('success', 'Updated Successful');
				return redirect()->to('backend/users');
			}
		}

		return $this->LoadView('admin/edit_user', $data);
	}

	public function buser($bid = null)
	{
		$bid = decryptIt($bid);
		$data = [];
		$model = new UserModel();
		$data['buser_p'] = $model->where('usr_id', $bid)->first();
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


				$newData = [

					'usr_pwd' => $this->request->getVar('usr_pwd'),
				];
				$model->update($bid, $newData);
				$session = session();
				$session->setFlashdata('success', 'Password Updated Successfully');
				return redirect()->to('backend/users');
			}
		}

		return $this->LoadView('admin/buserp', $data);
	}

	public function logout()
	{
		// Unsetting a specific session
		session()->remove('ALoggedIn');
		return redirect()->to('backend/login');
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
				$model->update($usrid, $newData);
				$session = session();
				$session->setFlashdata('success', 'Password Updated Successfully');
				return redirect()->to('backend/pwdupd');
			}
		}

		return $this->LoadView('admin/changepwd', $data);
	}

	public function employees()
	{

		$data = [];
		helper(['form']);
		$model = new EmpModel();
		$data['emp_row'] = $model->join('emp_speciality','emp_speciality.spec_id = employee.emp_spec1','LEFT')->find();

		return $this->LoadView('admin/employees', $data);
	}

	public function reg_emp()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'emp_email' => ['label' => 'Email', 'rules' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[employee.emp_email]'],
				'emp_pwd' => ['label' => 'password', 'rules' => 'required|min_length[8]|max_length[25]'],
				'cnfrm_pwd' => ['label' => 'Confirm Password', 'rules' => 'matches[emp_pwd]'],

			];
			$errors = [
				'emp_pwd' => [
					'validateUser' => 'Password field does\'t match'
				],
				'emp_email' => [
					'validateUser' => 'email is not valid and it\'s required'
				],
				'emp_email' => [
					'is_unique' => 'This email is already Registered'
				]
			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				//store this to database

				$model = new EmpModel();
				$newData = [
					'emp_email' => $this->request->getVar('emp_email'),
					'emp_pwd' => $this->request->getVar('emp_pwd'),
					'emp_status' => 1,


				];
				$model->save($newData);
				$id = $model->insertID;
				$session = session();
				$session->setFlashdata('success', 'Doctor Registered, Complete the Registration Form');
				return redirect()->to('backend/emp_details/' . encryptIt($id));
			}
		}


		return $this->LoadView('admin/reg_emp', $data);
	}

	public function emp_details($id = null)
	{

		$data = [];
		$spModel = new specialityModel();
		$data['spec'] = $spModel->findAll();

		$grModel = new gradeModel();
		$data['grade'] = $grModel->findAll();

		$id = decryptIt($id);
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
				'emp_imcr_no' => ['label' => 'IMCR No.', 'rules' => 'required|numeric'],
				'emp_gender' => ['label' => 'Gender', 'rules' => 'required'],
				'emp_cv' => ['label' => 'CV', 'rules' => 'uploaded[emp_cv]|ext_in[emp_cv,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_cv,2048]'],
				'emp_imc_cert' => ['label' => 'IMC Certificate', 'rules' => 'uploaded[emp_imc_cert]|ext_in[emp_imc_cert,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_imc_cert,2048]'],
				'emp_gv_cert' => ['label' => 'Garda Vetting', 'rules' => 'uploaded[emp_gv_cert]|ext_in[emp_gv_cert,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_gv_cert,2048]'],
				'emp_rec_refer' => ['label' => 'Recent Reference', 'rules' => 'uploaded[emp_rec_refer]|ext_in[emp_rec_refer,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_rec_refer,2048]'],
				'emp_passport' => ['label' => 'Passport', 'rules' => 'uploaded[emp_passport]|ext_in[emp_passport,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_passport,2048]'],
				'emp_occup_health' => ['label' => 'Occupational Health', 'rules' => 'uploaded[emp_occup_health]|ext_in[emp_occup_health,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_occup_health,2048]'],
				'emp_work_permit' => ['label' => 'Work Permit', 'rules' => 'uploaded[emp_work_permit]|ext_in[emp_work_permit,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_work_permit,2048]'],
				
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
				}

				$emp_imc_cert = $this->request->getFile('emp_imc_cert');

				if ($emp_imc_cert->isValid() && !$emp_imc_cert->hasMoved()) {
					$emp_imc_cert_name = encryptIt($emp_imc_cert->getName()) . '.' . pathinfo($_FILES['emp_imc_cert']['name'], PATHINFO_EXTENSION);

					$emp_imc_cert->move('public/uploads/employee_attach/', $emp_imc_cert_name, true);
				}

				$emp_gv_cert = $this->request->getFile('emp_gv_cert');

				if ($emp_gv_cert->isValid() && !$emp_gv_cert->hasMoved()) {
					$emp_gv_cert_name = encryptIt($emp_gv_cert->getName()) . '.' . pathinfo($_FILES['emp_gv_cert']['name'], PATHINFO_EXTENSION);

					$emp_gv_cert->move('public/uploads/employee_attach/', $emp_gv_cert_name, true);
				}

				$emp_rec_refer = $this->request->getFile('emp_rec_refer');

				if ($emp_rec_refer->isValid() && !$emp_rec_refer->hasMoved()) {
					$emp_rec_refer_name = encryptIt($emp_rec_refer->getName()) . '.' . pathinfo($_FILES['emp_rec_refer']['name'], PATHINFO_EXTENSION);

					$emp_rec_refer->move('public/uploads/employee_attach/', $emp_rec_refer_name, true);
				}

				$emp_passport = $this->request->getFile('emp_passport');

				if ($emp_passport->isValid() && !$emp_passport->hasMoved()) {
					$emp_passport_name = encryptIt($emp_passport->getName()) . '.' . pathinfo($_FILES['emp_passport']['name'], PATHINFO_EXTENSION);

					$emp_passport->move('public/uploads/employee_attach/', $emp_passport_name, true);
				}

				$emp_occup_health = $this->request->getFile('emp_occup_health');

				if ($emp_occup_health->isValid() && !$emp_occup_health->hasMoved()) {
					$emp_occup_health_name = encryptIt($emp_occup_health->getName()) . '.' . pathinfo($_FILES['emp_occup_health']['name'], PATHINFO_EXTENSION);

					$emp_occup_health->move('public/uploads/employee_attach/', $emp_occup_health_name, true);
				}

				$emp_work_permit = $this->request->getFile('emp_work_permit');

				if ($emp_work_permit->isValid() && !$emp_work_permit->hasMoved()) {
					$emp_work_permit_name = encryptIt($emp_work_permit->getName()) . '.' . pathinfo($_FILES['emp_work_permit']['name'], PATHINFO_EXTENSION);

					$emp_work_permit->move('public/uploads/employee_attach/', $emp_work_permit_name, true);
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
					'emp_gv_cert' => isset($emp_gv_cert_name) ? $emp_gv_cert_name : $this->request->getVar('emp_gv_cert_hidden'),
				'emp_rec_refer' => isset($emp_rec_refer_name) ? $emp_rec_refer_name : $this->request->getVar('emp_rec_refer_hidden'),
				'emp_passport' => isset($emp_passport_name) ? $emp_passport_name : $this->request->getVar('emp_passport_hidden'),
				'emp_occup_health' => isset($emp_occup_health_name) ? $emp_occup_health_name : $this->request->getVar('emp_occup_health_hidden'),
				'emp_work_permit' => isset($emp_work_permit_name) ? $emp_work_permit_name : $this->request->getVar('emp_work_permit_hidden'),
					// 'emp_gv_cert' => $emp_gv_cert_name,
					// 'emp_rec_refer' => $emp_rec_refer_name,
					// 'emp_passport' => $emp_passport_name,
					// 'emp_occup_health' => $emp_occup_health_name,
					// 'emp_work_permit' => $emp_work_permit_name,
				];

				$model->update($id, $newData);
				$session = session();
				$session->setFlashdata('success', 'Record Successfully Saved');
				return redirect()->to('backend/employees');
			}
		}


		return $this->LoadView('admin/emp_details', $data);
	}

	public function emp_edit($id = null)
	{
		$id = decryptIt($id);
		$data = [];
		$spModel = new specialityModel();
		$data['spec'] = $spModel->findAll();

		$grModel = new gradeModel();
		$data['grade'] = $grModel->findAll();
		helper(['form']);
		$model = new EmpModel();
		$data['ed_emp'] = $model->where('emp_id', $id)->first();
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'emp_fname' => ['label' => 'First Name', 'rules' => 'required'],
				'emp_lname' => ['label' => 'Last Name', 'rules' => 'required'],
				'emp_spec1' => ['label' => 'Speciality 1', 'rules' => 'required'],
				'emp_grade1' => ['label' => 'Grade 1', 'rules' => 'required'],
				'emp_pps_no' => ['label' => 'PPS No.', 'rules' => 'required'],
				'emp_phone' => ['label' => 'Phone No.', 'rules' => 'required|numeric'],
				'emp_imcr_no' => ['label' => 'IMCR No.', 'rules' => 'required|numeric'],
				'emp_gender' => ['label' => 'Gender', 'rules' => 'required'],
				'emp_cv' => ['label' => 'CV', 'rules' => 'uploaded[emp_cv]|ext_in[emp_cv,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_cv,2048]'],
				'emp_imc_cert' => ['label' => 'IMC Certificate', 'rules' => 'uploaded[emp_imc_cert]|ext_in[emp_imc_cert,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_imc_cert,2048]'],
				'emp_gv_cert' => ['label' => 'Garda Vetting', 'rules' => 'uploaded[emp_gv_cert]|ext_in[emp_gv_cert,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_gv_cert,2048]'],
				'emp_rec_refer' => ['label' => 'Recent Reference', 'rules' => 'uploaded[emp_rec_refer]|ext_in[emp_rec_refer,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_rec_refer,2048]'],
				'emp_passport' => ['label' => 'Passport', 'rules' => 'uploaded[emp_passport]|ext_in[emp_passport,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_passport,2048]'],
				'emp_occup_health' => ['label' => 'Occupational Health', 'rules' => 'uploaded[emp_occup_health]|ext_in[emp_occup_health,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_occup_health,2048]'],
				'emp_work_permit' => ['label' => 'Work Permit', 'rules' => 'uploaded[emp_work_permit]|ext_in[emp_work_permit,doc,docx,png,PNG,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_work_permit,2048]'],
				
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

			if (!$this->validate($rules)) {
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
				$session->setFlashdata('success', 'Record Successfully Updated');
				return redirect()->to('backend/emp_edit/' . encryptIt($id));
			}
		}


		return $this->LoadView('admin/emp_edit', $data);
	}

	public function employee_pwd($emid = null)
	{
		$emid = decryptIt($emid);
		$data = [];
		$model = new EmpModel();
		$data['e_up'] = $model->where('emp_id', $emid)->first();
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


				$newData = [

					'emp_pwd' => $this->request->getVar('emp_pwd'),
				];
				$model->update($emid, $newData);
				$session = session();
				$session->setFlashdata('success', 'Password Updated Successfully for ' . $data['e_up']['emp_email']);
				return redirect()->to('backend/employees');
			}
		}

		return $this->LoadView('admin/employee_pwd', $data);
	}


	public function emp_block($id = null)
	{
		$id = decryptIt($id);
		$model = new EmpModel();
		$del = $model->where('emp_id', $id)->first();



		if ($del['emp_status'] == 1) {

			$newData = [
				'emp_status' => 0,

			];



			$model->update($id, $newData);

			$session = session();
			$session->setFlashdata('success', 'Employee Blocked');
			return redirect()->to('backend/employees');
		}
	}


	public function block_employees()
	{

		$data = [];
		helper(['form']);
		$model = new EmpModel();
		$data['bemp_row'] = $model->where('emp_status', 0)->find();

		return $this->LoadView('admin/block_employees', $data);
	}

	public function emp_unblock($id = null)
	{
		$id = decryptIt($id);
		$model = new EmpModel();
		$del = $model->where('emp_id', $id)->first();



		if ($del['emp_status'] == 0) {

			$newData = [
				'emp_status' => 1,

			];



			$model->update($id, $newData);

			$session = session();
			$session->setFlashdata('success', 'Employee Unblocked');
			return redirect()->to('backend/block_employees');
		}
	}


	public function clients()
	{

		$data = [];
		helper(['form']);
		$model = new ClientModel();
		$data['cl_row'] = $model->orderBy('cl_created','DESC')->find();

		return $this->LoadView('admin/clients', $data);
	}


	public function reg_client()
	{

		$data = [];
		helper(['form']);
		helper(['email']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'cl_cont_email' => ['label' => 'Email', 'rules' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[clients.cl_cont_email]'],
				'cl_usr' => ['label' => 'Username', 'rules' => 'required|min_length[8]|max_length[50]|is_unique[clients.cl_usr]'],
				'cl_cont_pwd' => ['label' => 'password', 'rules' => 'required|min_length[8]|max_length[25]'],
				'cnfrm_pwd' => ['label' => 'Confirm Password', 'rules' => 'matches[cl_cont_pwd]'],

			];
			$errors = [
				'cl_cont_pwd' => [
					'validateUser' => 'Password field does\'t match'
				],
				'cl_cont_email' => [
					'validateUser' => 'email is not valid and it\'s required'
				],
				'cl_cont_email' => [
					'is_unique' => 'This email is already Registered'
				]
			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				//store this to database

				$model = new ClientModel();
				$newData = [
					'cl_cont_email' => $this->request->getVar('cl_cont_email'),
					'cl_usr' => $this->request->getVar('cl_usr'),
					'cl_cont_pwd' => $this->request->getVar('cl_cont_pwd'),
					'cl_status' => 1,


				];
				$model->save($newData);
				$id = $model->insertID;
				$data['clr'] = $model->where('cl_id',$id)->first();
				$to = $data['clr']['cl_cont_email'];
				$subject = 'SRA Client Registration';
				$message = '<p>Dear &nbsp;'.$data['clr']['cl_usr'].' Your account has been succesfully registered on our platform</p><br>
				<p>Please Make sure to complete your client Profile when you login to <b>SRA Locum</b> on this URL: '.base_url('client/login').'</p><br>
				<h3>Thank You</h3>';
				$session = session();
				if (EmailHelper::sendEmail($to, $subject, $message)) {
				$session->setFlashdata('success', 'Client Registered, Complete the Registration Form');
				return redirect()->to('backend/client_details/' . encryptIt($id));
				}else{
					$session->setFlashdata('success', 'Client Registered, Completed But Email Failed');
				return redirect()->to('backend/client_details/' . encryptIt($id));
				}
			}
		}


		return $this->LoadView('admin/reg_client', $data);
	}

	public function client_details($id = null)
	{
		$id = decryptIt($id);
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
				$session->setFlashdata('success', 'Record Successfully Saved');
				return redirect()->to('backend/clients');
			}
		}


		return $this->LoadView('admin/client_details', $data);
	}

	public function client_edit($id = null)
	{
		$id = decryptIt($id);
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
				$session->setFlashdata('success', 'Record Successfully Saved');
				return redirect()->to('backend/clients');
			}
		}


		return $this->LoadView('admin/client_edit', $data);
	}

	public function client_pwd($ccid = null)
	{
		$ccid = decryptIt($ccid);
		$data = [];
		$model = new ClientModel();
		$data['p_up'] = $model->where('cl_id', $ccid)->first();
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


				$newData = [

					'cl_cont_pwd' => $this->request->getVar('cl_cont_pwd'),
				];
				$model->update($ccid, $newData);
				$session = session();
				$session->setFlashdata('success', 'Password Updated Successfully for ' . $data['p_up']['cl_cont_email']);
				return redirect()->to('backend/clients');
			}
		}

		return $this->LoadView('admin/client_pwd', $data);
	}

	public function client_block($id = null)
	{
		$id = decryptIt($id);
		$model = new ClientModel();
		$del = $model->where('cl_id', $id)->first();



		if ($del['cl_status'] == 1) {

			$newData = [
				'cl_status' => 0,

			];



			$model->update($id, $newData);

			$session = session();
			$session->setFlashdata('success', 'Client Blocked');
			return redirect()->to('backend/clients');
		}
	}

	public function client_unblock($id = null)
	{
		$id = decryptIt($id);
		$model = new ClientModel();
		$del = $model->where('cl_id', $id)->first();



		if ($del['cl_status'] == 0) {

			$newData = [
				'cl_status' => 1,

			];



			$model->update($id, $newData);

			$session = session();
			$session->setFlashdata('success', 'Client Unblocked');
			return redirect()->to('backend/block_clients');
		}
	}

	public function block_clients()
	{

		$data = [];
		helper(['form']);
		$model = new ClientModel();
		$data['cl_row'] = $model->where('cl_status', 0)->find();

		return $this->LoadView('admin/block_clients', $data);
	}

	public function orders()
	{

		$data = [];
		$timestamp = \time();
		$dt = date('Y-m-d H:i:s', $timestamp);
		helper(['form']);
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id', 'LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->orderBy('orders.ord_created', 'DESC')->findAll();

		return $this->LoadView('admin/orders', $data);
	}

	public function new_order_old()
	{

		$data = [];
		helper(['form']);
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		$Emodel = new EmpModel();
		$data['emp_row'] = $Emodel->where('emp_status', 1)->where('emp_fname !=', Null)->find();
		$Cmodel = new ClientModel();
		$data['cli_row'] = $Cmodel->where('cl_status', 1)->where('cl_h_name !=', Null)->where('cl_cont_name !=', Null)->find();

		$model = new ordersModel();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			

				

			


				//store this to database


				$newData = [

					'ord_speciality' => $this->request->getVar('ord_speciality'),
					'ord_grade' => $this->request->getVar('ord_grade'),
					'cl_id' => $this->request->getVar('cl_id'),
					'emp_id' => $this->request->getVar('emp_id'),
					'ord_required_from' => $this->request->getVar('ord_required_from'),
					'ord_required_to' => $this->request->getVar('ord_required_to'),
					'ord_process_date' => $this->request->getVar('ord_process_date'),
					'ord_process_details_from' => $this->request->getVar('ord_process_details_from'),
					'ord_process_details_to' => $this->request->getVar('ord_process_details_to'),
					'ord_confirmation_date' => $this->request->getVar('ord_confirmation_date'),
					'ord_invoice_id' => $this->request->getVar('ord_invoice_id'),
					'ord_normal_hrs' => $this->request->getVar('ord_normal_hrs'),
					'ord_on_call_hrs' => $this->request->getVar('ord_on_call_hrs'),
					'ord_total_hrs' => $this->request->getVar('ord_total_hrs'),
					'ord_approx_cost' => $this->request->getVar('ord_approx_cost'),
					'ord_pay_to_dr' => $this->request->getVar('ord_pay_to_dr'),
					'ord_admin_charges' => $this->request->getVar('ord_admin_charges'),
					'ord_diff_profit_admin' => $this->request->getVar('ord_diff_profit_admin'),
					'ord_time_sheet_rcvd' => $this->request->getVar('ord_time_sheet_rcvd'),
					'ord_time_sheet_mode' => $this->request->getVar('ord_time_sheet_mode'),
					'ord_time_sheet_process' => $this->request->getVar('ord_time_sheet_process'),
					'ord_time_sheet_approved' => $this->request->getVar('ord_time_sheet_approved'),
					'ord_comment1' => $this->request->getVar('ord_comment1'),
					'ord_invoice_refer' => $this->request->getVar('ord_invoice_refer'),
					'ord_invoice_date' => $this->request->getVar('ord_invoice_date'),
					'ord_invoice_by' => $this->request->getVar('ord_invoice_by'),
					'ord_sage_refer_no' => $this->request->getVar('ord_sage_refer_no'),
					'ord_paymnt_rcvd_date' => $this->request->getVar('ord_paymnt_rcvd_date'),
					'ord_pay_to_dr_date' => $this->request->getVar('ord_pay_to_dr_date'),
					'ord_case_status' => $this->request->getVar('ord_case_status'),
					'ord_payment_status' => $this->request->getVar('ord_payment_status'),
					'ord_comment2' => $this->request->getVar('ord_comment2'),
					'ord_status' => $this->request->getVar('ord_status'),
					'ord_datetime_detail' => $this->request->getVar('ord_datetime_detail'),
					'ord_prosdatetime_detail' => $this->request->getVar('ord_prosdatetime_detail'),
					'ord_cancel_bcl' => "0",
					'ord_ref_no' => $this->request->getVar('ord_ref_no'),
					'ord_vat_sale' => $this->request->getVar('ord_vat_sale'),
					'ord_vat_purch' => $this->request->getVar('ord_vat_purch'),
					'ord_vat_save' => $this->request->getVar('ord_vat_save'),
					'ord_hosp_earn' => $this->request->getVar('ord_hosp_earn'),
					'ord_paying_to_dr' => $this->request->getVar('ord_paying_to_dr'),
					'ord_adminchrg_intern' => $this->request->getVar('ord_adminchrg_intern'),



				];
				$model->insert($newData);
				$session = session();
				$session->setFlashdata('success', 'Order Successfully Added');
				return redirect()->to('backend/orders');
			
		}


		return $this->LoadView('admin/new_order', $data);
	}

	public function order_edit($eid = null)
	{
		$eid = decryptIt($eid);
		$data = [];
		helper(['form']);
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		$Emodel = new EmpModel();
		$data['emp_row'] = $Emodel->where('emp_status', 1)->where('emp_fname !=', Null)->find();
		$Cmodel = new ClientModel();
		$data['cli_row'] = $Cmodel->where('cl_status', 1)->where('cl_h_name !=', Null)->where('cl_cont_name !=', Null)->find();

		$model = new ordersModel();
		$data['eord_row'] = $model->where('ord_id', $eid)->first();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			

			

				$DA = $this->request->getFile('ord_assignment');

				if ($DA->isValid() && !$DA->hasMoved()) {
					$DAname = encryptIt($DA->getName()) . '.' . pathinfo($_FILES['ord_assignment']['name'], PATHINFO_EXTENSION);

					$DA->move('public/uploads/doc_assesment/', $DAname, true);
				} else {
					$DA = $this->request->getPost('ord_assignmentt');
					$DAname = $DA;
				}


				//store this to database


				$newData = [

					'ord_speciality' => $this->request->getVar('ord_speciality'),
					'ord_grade' => $this->request->getVar('ord_grade'),
					'cl_id' => $this->request->getVar('cl_id'),
					'emp_id' => decryptIt($this->request->getVar('emp_id')),
					'ord_required_from' => $this->request->getVar('ord_required_from'),
					'ord_required_to' => $this->request->getVar('ord_required_to'),
					'ord_process_date' => $this->request->getVar('ord_process_date'),
					'ord_process_details_from' => $this->request->getVar('ord_process_details_from'),
					'ord_process_details_to' => $this->request->getVar('ord_process_details_to'),
					'ord_confirmation_date' => $this->request->getVar('ord_confirmation_date'),
					'ord_invoice_id' => $this->request->getVar('ord_invoice_id'),
					'ord_normal_hrs' => $this->request->getVar('ord_normal_hrs'),
					'ord_on_call_hrs' => $this->request->getVar('ord_on_call_hrs'),
					'ord_total_hrs' => $this->request->getVar('ord_total_hrs'),
					'ord_approx_cost' => $this->request->getVar('ord_approx_cost'),
					'ord_pay_to_dr' => $this->request->getVar('ord_pay_to_dr'),
					'ord_admin_charges' => $this->request->getVar('ord_admin_charges'),
					'ord_diff_profit_admin' => $this->request->getVar('ord_diff_profit_admin'),
					'ord_time_sheet_rcvd' => $this->request->getVar('ord_time_sheet_rcvd'),
					'ord_time_sheet_mode' => $this->request->getVar('ord_time_sheet_mode'),
					'ord_time_sheet_process' => $this->request->getVar('ord_time_sheet_process'),
					'ord_time_sheet_approved' => $this->request->getVar('ord_time_sheet_approved'),
					'ord_comment1' => $this->request->getVar('ord_comment1'),
					'ord_invoice_refer' => $this->request->getVar('ord_invoice_refer'),
					'ord_invoice_date' => $this->request->getVar('ord_invoice_date'),
					'ord_invoice_by' => $this->request->getVar('ord_invoice_by'),
					'ord_sage_refer_no' => $this->request->getVar('ord_sage_refer_no'),
					'ord_paymnt_rcvd_date' => $this->request->getVar('ord_paymnt_rcvd_date'),
					'ord_pay_to_dr_date' => $this->request->getVar('ord_pay_to_dr_date'),
					'ord_case_status' => $this->request->getVar('ord_case_status'),
					'ord_payment_status' => $this->request->getVar('ord_payment_status'),
					'ord_comment2' => $this->request->getVar('ord_comment2'),
					'ord_assignment' => $DAname,
					'ord_status' => $this->request->getVar('ord_status'),
					'ord_cancel_bdr' => $this->request->getVar('ord_cancel_bdr'),
					'ord_cancel_bcl' => $this->request->getVar('ord_cancel_bcl'),
					'ord_datetime_detail' => $this->request->getVar('ord_datetime_detail'),
					'ord_prosdatetime_detail' => $this->request->getVar('ord_prosdatetime_detail'),
					'ord_ref_no' => $this->request->getVar('ord_ref_no'),
					'ord_vat_sale' => $this->request->getVar('ord_vat_sale'),
					'ord_vat_purch' => $this->request->getVar('ord_vat_purch'),
					'ord_vat_save' => $this->request->getVar('ord_vat_save'),
                    'ord_hosp_earn' => $this->request->getVar('ord_hosp_earn'),
					'ord_paying_to_dr' => $this->request->getVar('ord_paying_to_dr'),
					'ord_adminchrg_intern' => $this->request->getVar('ord_adminchrg_intern'),

				];
				$model->update($eid, $newData);
				$session = session();
				$session->setFlashdata('success', 'Order Successfully Updated');
				return redirect()->to('backend/orders');
			
		}


		return $this->LoadView('admin/order_edit', $data);
	}

	public function order_view($oid = null)
	{
		$data = [];
		$oid = decryptIt($oid);
		$model = new ordersModel();
		$data['ordr_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $oid)->first();
		// $data['ordr_row'] = $model->where('ord_id',$oid)->findAll();

		return $this->LoadView('admin/order_view', $data);
	}

	public function change_doctor_cancelled_order($oid, $doc_id)
	{
		$oid = decryptIt($oid);
		$doc_id = decryptIt($doc_id);
		$model = new ordersModel();
		$ordr_row = $model->where('ord_id', $oid)->first();
		$ordr_row['emp_id'] = $doc_id;
		$ordr_row['ord_cancel_bdr'] = 0;
		unset($ordr_row['ord_id']);
		if ($id = $model->insert($ordr_row)) {
			session()->setFlashdata('success', 'Doctor Changed and Order status has been set to active.');
			return redirect()->to('backend/order_edit/' . encryptIt($id));
		} else {
			session()->setFlashdata('success', 'Something went wrong!');
			return redirect()->to('backend/order_edit/' . encryptIt($oid));
		}


	}


	public function processed_order()
	{

		$data = [];
		helper(['form']);
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_cancel_bcl', '1')->orWhere('ord_cancel_bdr', '1')->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('admin/processed_order', $data);
	}
	public function cancelled_order()
	{

		$data = [];
		helper(['form']);
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_cancel_bcl', '1')->orWhere('ord_cancel_bdr', '1')->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('admin/cancelled_order', $data);
	}

	public function pending_order()
	{

		$data = [];
		$timestamp = \time();
		$dt = date('Y-m-d H:i:s', $timestamp);
		helper(['form']);
		$model = new ordersModel();
		$data['o_pen'] = $model->where('ord_status', '1')->where('ord_required_to >=', $dt)->countAllResults();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_status', '1')->where('ord_required_to >=', $dt)->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('admin/pending_order', $data);
	}

	// public function closed_order()
	// {

	// 	$data = [];
	// 	helper(['form']);
	// 	$model = new ordersModel();
	// 	$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id')->Join('employee', 'employee.emp_id = orders.emp_id')->where('ord_case_status', 'Closed')->orderBy('ord_updated', 'DESC')->findAll();

	// 	return $this->LoadView('admin/closed_order', $data);
	// }

	public function ended_order()
	{

		$data = [];
		helper(['form']);
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_status', '4')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('admin/ended_order', $data);
	}

	public function confirm_order()
	{

		$data = [];
		helper(['form']);
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_status', '3')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('admin/confirm_order', $data);
	}

	public function expired_orders()
	{

		$data = [];
		$timestamp = \time();
		$dt = date('Y-m-d H:i:s', $timestamp);
		helper(['form']);
		$model = new ordersModel();
		$data['ord_row'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_required_to <=', $dt)->where('ord_status', '1')->where('ord_cancel_bcl', '0')->where('ord_cancel_bdr', '0')->orderBy('ord_updated', 'DESC')->findAll();

		return $this->LoadView('admin/expired_orders', $data);
	}

	public function ord_status($ordid = null)
	{
		$ordid = decryptIt($ordid);
		$data = [];
		helper(['form']);
		$model = new ordersModel();
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$newData = [
				'ord_status' => $this->request->getVar('ord_status'),
			];
			$model->update($ordid, $newData);
			$session = session();
			$session->setFlashdata('success', 'Case Status Updated');
			return redirect()->to('backend/orders');
		}
	}

	public function specialities()
	{

		$data = [];
		helper(['form']);
		$model = new specialityModel();
		$data['special'] = $model->findAll();

		return $this->LoadView('admin/specialities', $data);
	}

	public function new_spec()
	{

		$data = [];
		helper(['form']);
		$model = new specialityModel();
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'spec_name' => ['label' => 'Speciality', 'rules' => 'required'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					'spec_name' => $this->request->getVar('spec_name'),


				];
				$model->insert($newData);
				$session = session();
				$session->setFlashdata('success', 'Speciality Successfully Added');
				return redirect()->to('backend/speciality');
			}


		}

		return $this->LoadView('admin/new_spec', $data);
	}

	public function edit_spec($sid = null)
	{

		$sid = decryptIt($sid);
		$data = [];
		helper(['form']);
		$smodel = new specialityModel();
		$data['sp_row'] = $smodel->where('spec_id', $sid)->first();
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'spec_name' => ['label' => 'Speciality', 'rules' => 'required'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					'spec_name' => $this->request->getVar('spec_name'),


				];
				$smodel->update($sid, $newData);
				$session = session();
				$session->setFlashdata('success', 'Speciality Successfully Updated');
				return redirect()->to('backend/speciality');
			}

		}
		return $this->LoadView('admin/edit_spec', $data);
	}

	public function del_spec($ssid = null)
	{
		$ssid = decryptIt($ssid);
		$data = [];
		helper(['form']);
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->where('spec_id', $ssid)->delete();

		$session = session();
		$session->setFlashdata('error', 'Speciality Successfully Deleted');
		return redirect()->to('backend/speciality');
	}

	public function grade()
	{

		$data = [];
		helper(['form']);
		$model = new gradeModel();
		$data['grade'] = $model->findAll();

		return $this->LoadView('admin/grade', $data);
	}


	public function new_grade()
	{

		$data = [];
		helper(['form']);
		$model = new gradeModel();
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'grade_name' => ['label' => 'Grade', 'rules' => 'required'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					'grade_name' => $this->request->getVar('grade_name'),


				];
				$model->insert($newData);
				$session = session();
				$session->setFlashdata('success', 'Grade Successfully Added');
				return redirect()->to('backend/grade');
			}


		}

		return $this->LoadView('admin/new_grade', $data);
	}

	public function edit_grade($gid = null)
	{
		$gid = decryptIt($gid);
		$data = [];
		helper(['form']);
		$model = new gradeModel();
		$data['gr_row'] = $model->where('grade_id', $gid)->first();
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'grade_name' => ['label' => 'Grade', 'rules' => 'required'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					'grade_name' => $this->request->getVar('grade_name'),


				];
				$model->update($gid, $newData);
				$session = session();
				$session->setFlashdata('success', 'Grade Successfully Updated');
				return redirect()->to('backend/grade');
			}


		}

		return $this->LoadView('admin/edit_grade', $data);
	}

	public function del_grade($gid = null)
	{
		$gid = decryptIt($gid);
		$data = [];
		helper(['form']);
		$Smodel = new gradeModel();
		$data['gr_row'] = $Smodel->where('grade_id', $gid)->delete();

		$session = session();
		$session->setFlashdata('error', 'Grade Successfully Deleted');
		return redirect()->to('backend/grade');
	}

	public function cl_cat()
	{

		$data = [];
		helper(['form']);
		$model = new clRegModel();
		$data['cl_reg'] = $model->findAll();

		return $this->LoadView('admin/cl_cat', $data);
	}

	public function new_cl_cat()
	{

		$data = [];
		helper(['form']);
		$model = new clRegModel();
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'reg_cat_name' => ['label' => 'Category Name', 'rules' => 'required'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					'reg_cat_name' => $this->request->getVar('reg_cat_name'),


				];
				$model->insert($newData);
				$session = session();
				$session->setFlashdata('success', 'Category Successfully Added');
				return redirect()->to('backend/cat');
			}


		}

		return $this->LoadView('admin/new_cl_cat', $data);
	}

	public function edit_cl_cat($idcl = null)
	{
		$idcl = decryptIt($idcl);
		$data = [];
		helper(['form']);
		$model = new clRegModel();
		$data['ecl'] = $model->where('reg_cat_id', $idcl)->first();
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'reg_cat_name' => ['label' => 'Grade', 'rules' => 'required'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					'reg_cat_name' => $this->request->getVar('reg_cat_name'),


				];
				$model->update($idcl, $newData);
				$session = session();
				$session->setFlashdata('success', 'Category Successfully Updated');
				return redirect()->to('backend/cat');
			}


		}

		return $this->LoadView('admin/edit_cl_cat', $data);
	}

	public function del_cl_cat($cid = null)
	{
		$cid = decryptIt($cid);
		$data = [];
		helper(['form']);
		$Smodel = new clRegModel();
		$data['gr_row'] = $Smodel->where('reg_cat_id', $cid)->delete();

		$session = session();
		$session->setFlashdata('error', 'Category Successfully Deleted');
		return redirect()->to('backend/cat');
	}

	public function email_1($e1id = null)
	{
		$e1id = decryptIt($e1id);
		$data = [];
		helper(['form']);
		$model = new ordersModel();
		$data['em_1'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $e1id)->first();


		return $this->LoadView('admin/email-1', $data);
	}

	public function email_2($e2id = null)
	{
		$e2id = decryptIt($e2id);
		$data = [];

		$e2model = new ordersModel();
		$data['em_2'] = $e2model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $e2id)->first();


		return $this->LoadView('admin/email-2', $data);
	}

	public function email_3($e3id = null)
	{
		$e3id = decryptIt($e3id);
		$data = [];

		$e3mdoel = new ordersModel();
		$data['em_3'] = $e3mdoel->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $e3id)->first();


		return $this->LoadView('admin/email-3', $data);
	}

	public function email_4($e4id = null)
	{
		$e4id = decryptIt($e4id);
		$data = [];

		$e3mdoel = new ordersModel();
		$data['em_4'] = $e3mdoel->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $e4id)->first();


		return $this->LoadView('admin/email-4', $data);
	}

	public function contract($conid = null)
	{
		$conid = decryptIt($conid);
		$data = [];

		$formula = new formulaModel();
		$data['forml'] = $formula->where('id', 1)->first();

		$e3mdoel = new ordersModel();
		$data['cont'] = $e3mdoel->Join('clients', 'clients.cl_id = orders.cl_id')->Join('employee', 'employee.emp_id = orders.emp_id')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade')->where('ord_id', $conid)->first();


		return $this->LoadView('admin/contract', $data);
	}

	public function timesheet()
	{
		$data = [];


		$model = new ordersModel();
		$data['t_order'] = $model->Join('clients', 'clients.cl_id = orders.cl_id','LEFT')
			->Join('timesheets', 'timesheets.order_id = orders.ord_id', 'LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')
			->where('ord_status >','2')->where('ord_cancel_bcl','0')->where('ord_cancel_bdr','0')->groupBy('orders.ord_id')->orderBy('orders.ord_id', 'DESC')
			->findAll();





		return $this->LoadView('admin/timesheet', $data);
	}

	public function fill_timesheet($tid = null)
	{
		$tid = decryptIt($tid);
		$data = [];
		helper(['form']);

		$model = new ordersModel();
		$data['e_ord'] = $model->join('clients','clients.cl_id = orders.cl_id','LEFT')->join('employee','employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $tid)->first();

		$data['start_date'] = $data['e_ord']['ord_process_details_from'];
		$data['end_date'] = $data['e_ord']['ord_process_details_to'];

		return $this->LoadView('admin/fill_timesheet', $data);
	}

	public function timesheet_save($ord_id)
	{

		$ord_id = decryptIt($ord_id);
		$model = new timesheetModel();
		foreach ($_POST['status'] as $row => $key) {
			$model->insert(array('order_id' => $ord_id, 'dutyDate' => explode(',', $key)[0], 'dutyTime' => explode(',', $key)[1], 'siteStatus' => explode(',', $key)[2]));

		}
		$session = session();
		$session->setFlashdata('success', 'TimeSheet Saved');
		return redirect()->to('backend/timesheet');
	}

	public function edit_timesheet($ord_id)
	{
		$data = [];

		$ord_id = decryptIt($ord_id);
		$model = new timesheetModel();
		$data['t_view'] = $model->where('order_id', $ord_id)->find();

		$model = new ordersModel();
		$data['e_ord'] = $model->join('clients','clients.cl_id = orders.cl_id','LEFT')->join('employee','employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $ord_id)->first();

		$data['start_date'] = $data['e_ord']['ord_process_details_from'];
		$data['end_date'] = $data['e_ord']['ord_process_details_to'];


		return $this->LoadView('admin/timesheet_edit', $data);

	}

	public function upd_timesheet($ord_id)
	{
		$data = [];

		$ord_id = decryptIt($ord_id);
		$model = new timesheetModel();

		// Delete all existing timesheet data for this order
		$model->where(['order_id' => $ord_id])->delete();

		// Insert the updated timesheet data
		foreach ($_POST['status'] as $row => $key) {
			$model->insert(['order_id' => $ord_id, 'dutyDate' => explode(',', $key)[0], 'dutyTime' => explode(',', $key)[1], 'siteStatus' => explode(',', $key)[2]]);
		}

		$session = session();
		$session->setFlashdata('success', 'TimeSheet Updated');
		return redirect()->to('backend/timesheet');

	}

	public function timesheet_view($ord_id)
	{
		$data = [];

		$ord_id = decryptIt($ord_id);
		$model = new timesheetModel();
		$data['t_view'] = $model->where('order_id', $ord_id)->find();

		$model = new ordersModel();
		$data['e_ord'] = $model->join('clients','clients.cl_id = orders.cl_id','LEFT')->join('employee','employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality', 'emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade', 'emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id', $ord_id)->first();

		$data['start_date'] = $data['e_ord']['ord_process_details_from'];
		$data['end_date'] = $data['e_ord']['ord_process_details_to'];


		return $this->LoadView('admin/timesheet_view', $data);

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
		return redirect()->to('backend/t-view/' . encryptIt($data['e_ord']['ord_id']));


	}
	public function formula()
	{

		$data = [];
		helper(['form']);
		$model = new formulaModel();
		$data['form'] = $model->findAll();

		return $this->LoadView('admin/formula', $data);
	}

	public function edit_formula($id = null)
	{
		$id = decryptIt($id);
		$data = [];
		helper(['form']);
		$model = new formulaModel();
		$data['form'] = $model->where('id', $id)->first();
		if ($this->request->getMethod() == 'post') {
			$rules = [
				'formula' => ['label' => 'Formula', 'rules' => 'required'],

			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			} else {


				//store this to database


				$newData = [
					'formula' => $this->request->getVar('formula'),


				];
				$model->update($id, $newData);
				$session = session();
				$session->setFlashdata('success', 'Formula Successfully Updated');
				return redirect()->to('backend/formula');
			}


		}

		return $this->LoadView('admin/edit_formula', $data);
	}
	public function get_notif()
	{
		$data = [];
		$model = new notificationModel();
		// fetch live data from the database and store it in $data
		$data = $model->orderBy('status','ASC')->orderBy('created_at','DESC')->limit(8)->find(); // your database query here
		// fetch the count of unseen notifications
		$count = $model->where('status', 0)->countAllResults();
		
		foreach ($data as $row) {
			$url = base_url($row['link'].'/'.encryptIt($row['ord_id']));
			echo '<li class="d-flex">
				<div class="feeds-left"><i class="fa fa-calendar"></i></div>
				<div class="feeds-body flex-grow-1">
					<h6 class="mb-1" >'.$row['notification'].'<small class="float-end text-muted small">'.date("d-m-y", strtotime($row['created_at'])).'</small><br></h6>
					<span class="text-muted"><a class="notification" href="#!" onclick="seenaa('.$row['id'].',\''.$url.'\')" >Click here to view</a> <b style="float:right;">'.($row['status'] == 1 ? 'Seen' : '').'</b></span>
				</div>
			</li>';
		}

		// return the data as JSON
		// return $this->response->setJSON(['count' => $count]);
	}
	public function get_notifcount()
	{
		$data = [];
		$model = new notificationModel();
		// fetch the count of unseen notifications
		$count = $model->where('status', 0)->countAllResults();
		echo $count;
		// return the count as JSON
		// return $this->response->setJSON(['count' => $count]);
	}
	public function notif_seen()
	{
		
		$data = [];
		$id = $this->request->getPost('id');
		$model = new notificationModel();
		$data['notif_id'] = $model->where('id',$id)->first();
// 		$notid = $data['notif_id']['id'];
		$newdata = [
			'status' => '1',
		];

		$model->update($id,$newdata);
		// return the data as JSON

		
		
    // $model = new NotificationModel();
    // $model->update($id, ['status' => 1]);
    return json_encode(['success' => true]); // return JSON response
		
	}

	public function new_order(){
		$data = [];
		helper(['form']);
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		$clmodel = new ClientModel();
		$data['c_det'] = $clmodel->where('cl_status', 1)->where('cl_h_name !=', Null)->where('cl_cont_name !=', Null)->find();
		$omodel = new ordersModel();

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'cl_id' => ['label' => 'Client', 'rules' => 'required'],
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
					'cl_id'=> $this->request->getVar('cl_id'),

				];
				$omodel->insert($newData);
				$id = $omodel->insertID;
				$session = session();
				$session->setFlashdata('success', 'First Response saved');
				return redirect()->to('backend/email-1/' . encryptIt($id));
				
			}


		}

		
		return $this->LoadView('admin/new_order', $data);
	}
	public function order_s1($id = null){
		$id = decryptIt($id);
		$data = [];
		helper(['form']);
		$Gmodel = new gradeModel();
		$data['gr_row'] = $Gmodel->findAll();
		$Smodel = new specialityModel();
		$data['sp_row'] = $Smodel->findAll();
		$clmodel = new ClientModel();
		$data['c_det'] = $clmodel->where('cl_status', 1)->where('cl_h_name !=', Null)->where('cl_cont_name !=', Null)->find();
		$omodel = new ordersModel();
		$data['v_ordr'] = $omodel->where('ord_id',$id)->first();

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'cl_id' => ['label' => 'Client', 'rules' => 'required'],
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
					'cl_id'=> $this->request->getVar('cl_id'),

				];
				$omodel->update($id,$newData);
				$session = session();
				$session->setFlashdata('success', 'First Response saved');
				return redirect()->to('backend/email-1/' . encryptIt($id));
				
			}


		}

		
		return $this->LoadView('admin/order_s1', $data);
	}
	public function sFirstR($id = null){
		$data = [];
		helper(['form']);
		helper('email');
		$id = decryptIt($id);
		$omodel = new ordersModel();
		$data['v_ordr'] = $omodel->join('clients','clients.cl_id = orders.cl_id','LEFT')->join('emp_speciality','emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade','emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id',$id)->first();
		$ord = $data['v_ordr'];
		$lname = explode(' ',$ord['cl_cont_name']);
		// $to = $ord['cl_cont_email'];
		$to = 'okashadell@gmail.com';
		$subject = 'First Response';
		$message ='<html><body>
		<div class="card-body">
		<div class="row mb-3 " id="email">
				   <h3>Dear 
					'.$lname[0].'</h3>
					<br>
					<p>Thank you for requesting a doctor through SRA Locum Service. We can confirm receiving your locum order. Process of sourcing a locum Doctor for you has already been initiated.</p>
					<p class="text-danger">If the order details are correct, you do not need to reply to this email.</p>
					<p><strong>Your Order Details are;</strong></p>
<table class="table align-middle table-responsive table-hover d-inline" border="1" width="50%" >
<tr>
<th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
<td style="border: 1px solid black;"><strong>'.$ord['cl_h_name']. ', '. $ord['cl_address'].' | ' . $ord['cl_eircode'].'</strong></td>
</tr>
<tr>
<th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
<td style="border: 1px solid black;"><strong>'.$ord['cl_cont_name'].'</strong></td>
</tr>
<tr>
<th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
<td style="border: 1px solid black;"><strong>'.$ord['spec_name'].' - '. $ord['grade_name'].'</strong></td>
</tr>
<tr>
<tr>
  <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
  <td style="border: 1px solid black;"><strong>';
$pros = explode(",", $ord['ord_datetime_detail']);
foreach($pros as $var) {
  $message .= $var . "<br>";
}
$message .= '</strong></td>
</tr>    
</table>
<p><strong>Order status:</strong>
<ol>
<li><b>Order confirmation.</b></li>
<li><b>Order processing initiated.</b></li>
<li style="opacity:0.5;">Proposal of locum to you.</li>
<li style="opacity:0.5;">Acceptance or declining a locum.</li>
<li style="opacity:0.5;">Locum Confirmation.</li>
</ol>
</p>
					
					</div>
					
		</div></body></html>';


		if ($this->request->getMethod() == 'post') {
			
				$newData = [
					'ord_status' => '2',

				];
				$omodel->update($id,$newData);
				$session = session();
				if (EmailHelper::sendEmail($to, $subject, $message)) {
					$session->setFlashdata('success', 'First Response Email Succesfully Sent');
					return redirect()->to('backend/order-s2/' . encryptIt($id));
				} else {
					$session->setFlashdata('error', 'First Response Email Failed');
					return redirect()->to('backend/order-s2/' . encryptIt($id));
				}
				
				
				
			}
		}

		public function order_s2($id = null){
			$data = [];
			helper(['form']);
			$id = decryptIt($id);
			$Gmodel = new gradeModel();
			$data['gr_row'] = $Gmodel->findAll();
			$Smodel = new specialityModel();
			$data['sp_row'] = $Smodel->findAll();
			$omodel = new ordersModel();
			$data['v_ordr'] = $omodel->where('ord_id',$id)->first();
			$spec = $data['v_ordr']['ord_speciality'];
			$clmodel = new ClientModel();
			$data['c_det'] = $clmodel->where('cl_status', 1)->where('cl_h_name !=', Null)->where('cl_cont_name !=', Null)->find();
			$Emodel = new EmpModel();
			$data['emp_row'] = $Emodel->where('emp_status', 1)->where('emp_fname !=', Null)->Where('emp_spec1',$spec)->orWhere('emp_spec2',$spec)->orWhere('emp_spec2',$spec)->find();
			$norm = (float)$this->request->getVar('ord_normal_hrs');
			$onc = (float)$this->request->getVar('ord_on_call_hrs');
			$off = (float)$this->request->getVar('ord_off_site_hrs');
			$week = (float)$this->request->getVar('ord_bh_week_hrs');
			$normr = (float)$this->request->getVar('ord_normal_hrs_rt');
			$oncr = (float)$this->request->getVar('ord_ocall_rt');
			$offr = (float)$this->request->getVar('ord_osite_rt');
			$weekr = (float)$this->request->getVar('ord_bhw_rt');

			$tp = $norm * $normr + $onc * $oncr + $off * $offr + $week * $weekr;
	
			if ($this->request->getMethod() == 'post') {
				$rules = [
					'emp_id' => ['label' => 'Employee', 'rules' => 'required'],
					'ord_process_details_from' => ['label' => 'Locum Process From', 'rules' => 'required'],
					'ord_process_details_to' => ['label' => 'Locum Process To', 'rules' => 'required'],
					'ord_prosdatetime_detail' => ['label' => 'Locum Process Date & Time Details', 'rules' => 'required'],
					'ord_normal_hrs' => ['label' => 'No of Normal/Flat Hrs', 'rules' => 'required'],
					'ord_normal_hrs_rt' => ['label' => 'Select Pay Type for Normal Hrs', 'rules' => 'required'],
					'nh_p_type' => ['label' => 'Hours / Fullday / Halfday', 'rules' => 'required'],
					'ord_on_call_hrs' => ['label' => 'No of OnCall Hrs', 'rules' => 'required'],
					'ord_ocall_rt' => ['label' => 'Rate for OnCall Hrs', 'rules' => 'required'],
					'oc_p_type' => ['label' => 'Select Pay Type for OnCall Hrs', 'rules' => 'required'],
					'ord_off_site_hrs' => ['label' => 'No of OffSite Hrs', 'rules' => 'required'],
					'ord_osite_rt' => ['label' => 'Rate for OffSite Hrs', 'rules' => 'required'],
					'os_p_type' => ['label' => 'Select Pay Type for OffSite Hrs', 'rules' => 'required'],
					'ord_bh_week_hrs' => ['label' => 'No of BH/Weekend Hrs', 'rules' => 'required'],
					'ord_bhw_rt' => ['label' => 'Rate for BH/Weekend Hrs', 'rules' => 'required'],
					'bhw_p_type' => ['label' => 'Select Pay Type for BH/Weekend Hrs', 'rules' => 'required'],
					'ord_admin_charges' => ['label' => 'Admin Charges', 'rules' => 'required'],
					'ord_process_date' => ['label' => 'Process Date', 'rules' => 'required'],

					
				];
	
				if (!$this->validate($rules)) {
					$data['validation'] = $this->validator;
				} else {
	
	
					//store this to database
	
	
					$newData = [
						'emp_id' => $this->request->getVar('emp_id'),
						'ord_process_details_from' => $this->request->getVar('ord_process_details_from'),
						'ord_process_details_to' => $this->request->getVar('ord_process_details_to'),
						'ord_prosdatetime_detail' => $this->request->getVar('ord_prosdatetime_detail'),
						'ord_normal_hrs' => $this->request->getVar('ord_normal_hrs'),
						'ord_normal_hrs_rt'=> $this->request->getVar('ord_normal_hrs_rt'),
						'nh_p_type'=> $this->request->getVar('nh_p_type'),
						'ord_on_call_hrs'=> $this->request->getVar('ord_on_call_hrs'),
						'ord_ocall_rt'=> $this->request->getVar('ord_ocall_rt'),
						'oc_p_type'=> $this->request->getVar('oc_p_type'),
						'ord_off_site_hrs'=> $this->request->getVar('ord_off_site_hrs'),
						'ord_osite_rt'=> $this->request->getVar('ord_osite_rt'),
						'os_p_type'=> $this->request->getVar('os_p_type'),
						'ord_bh_week_hrs'=> $this->request->getVar('ord_bh_week_hrs'),
						'ord_bhw_rt'=> $this->request->getVar('ord_bhw_rt'),
						'bhw_p_type'=> $this->request->getVar('bhw_p_type'),
						'ord_total_hrs'=> $this->request->getVar('ord_total_hrs'),
						'ord_admin_charges'=> $this->request->getVar('ord_admin_charges'),
						'ord_process_date'=> $this->request->getVar('ord_process_date'),
						'ord_paying_to_dr'=> $tp,
	
					];
					$omodel->update($id,$newData);
					$session = session();
					$session->setFlashdata('success', 'Locum Process saved');
					return redirect()->to('backend/email-2/' . encryptIt($id));
					
				}
	
	
			}
	
			
			return $this->LoadView('admin/order_s2', $data);
		}
		public function sSecondR($id = null){
			$data = [];
			helper(['form']);
			helper('email');
			$id = decryptIt($id);
			$omodel = new ordersModel();
			$data['v_ordr'] = $omodel->join('clients','clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality','emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade','emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id',$id)->first();
			$ord = $data['v_ordr'];
			$lname = explode(' ',$ord['cl_cont_name']);
		// $to = $ord['cl_cont_email'];
		$to = 'okashadell@gmail.com';
		$subject = 'Locum Process';
		$message ='<html><body>
		<div class="card-body">
		<div class="row mb-3 " id="email" >
				   <h3>Dear '.$lname[0].'</h3>
					<br>
					<p>At SRA Locum Service we are pleased to offer you the following doctor. Please review and reply.</p>
					<p><strong>Your Order Details are;</strong></p>
					<div class="table-responsive">
<table class="table table-bordered align-middle d-inline" border="1" width="50%" >
<tr>
<th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
<td style="border: 1px solid black;"><strong>'. $ord['cl_h_name']. ', '. $ord['cl_address'].' | ' . $ord['cl_eircode'].'</strong></td>
</tr>
<tr>
<th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
<td style="border: 1px solid black;"><strong>'.$ord['cl_cont_name'].'</strong></td>
</tr>
<tr>
<th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
<td style="border: 1px solid black;"><strong>'.$ord['spec_name'].' '. $ord['grade_name'].'</strong></td>
</tr>
<tr>
<th style="border: 1px solid black;"><strong>Offered Doctor (s):</strong></th>
<td style="border: 1px solid black;"><strong>Dr.'. $ord['emp_fname']. ' ' .$ord['emp_lname'] .'( '. $ord['emp_imcr_no'].')'.'</strong></td>
</tr>
<tr>
<th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
  <td style="border: 1px solid black;"><strong>';
$pros = explode(",", $ord['ord_datetime_detail']);
foreach($pros as $var) {
  $message .= $var . "<br>";
}
$message .= '</strong></td>
</tr> 
<tr>
<th style="border: 1px solid black;"><strong>Rate:</strong></th>
<td style="border: 1px solid black;"> <b>Normal: </b>' . $ord['ord_normal_hrs_rt'] .'<br>'. '<b>OnCall: </b>'. $ord['ord_ocall_rt'].'<br>'.'<b>OffSite: </b>'.$ord['ord_osite_rt'].'<br>'.'<b>Weekend: </b>'.$ord['ord_bhw_rt'].'</td>
</tr>
<tr>
<th style="border: 1px solid black;"><strong>Admin Charges:</strong></th>
<td class="text-danger" style="border: 1px solid black;color:red;"><strong>'. $ord['ord_admin_charges'].'%</strong></td>
</tr>  
</table>
</div>

<p><strong>Find attached the relevant CV and other documents.</strong></p>';

if(!empty($ord['emp_cv'])){
$message .= '<p class="mb-0"><strong>CV</strong></p>
<a target="_blank" href=" '.base_url('public/uploads/employee_attach/'.$ord['emp_cv']) .'">Click To View</a>';
}
if(!empty($ord['emp_imc_cert'])){
$message .= '<p class="mb-0"><strong>IMC Certificate</strong></p>
<a target="_blank" href="'. base_url('public/uploads/employee_attach/'.$ord['emp_imc_cert']).'">Click To View</a>';
}
if(!empty($ord['emp_gv_cert'])){
$message .= '<p class="mb-0"><strong>Garda Vetting Certificate</strong></p>
<a target="_blank" href="'.base_url('public/uploads/employee_attach/'.$ord['emp_gv_cert']).'">Click To View</a>';
}
if(!empty($ord['emp_rec_refer'])){
$message .= '<p class="mb-0"><strong>Recent Reference</strong></p>
<a target="_blank" href="'.base_url('public/uploads/employee_attach/'.$ord['emp_rec_refer']).'">Click To View</a>';
}
if(!empty($ord['emp_passport'])){
$message .= '<p class="mb-0"><strong>Passport</strong></p>
<a target="_blank" href="'.base_url('public/uploads/employee_attach/'.$ord['emp_passport']).'">Click To View</a>';
}
if(!empty($ord['emp_occup_health'])){
$message .= '<p class="mb-0"><strong>Occupational Health</strong></p>
<a target="_blank" href="'. base_url('public/uploads/employee_attach/'.$ord['emp_occup_health']).'">Click To View</a>';
}
if(!empty($ord['emp_work_permit'])){
$message .= '<p class="mb-0"><strong>Work Permit</strong></p>
<a target="_blank" href="'.base_url('public/uploads/employee_attach/'.$ord['emp_work_permit']).'">Click To View</a>';
}

$message .= '<br>
<hr class="primary">
<p><strong>Order status:</strong>
<ol>
<li><b>Order confirmation.</b></li>
<li><b>Order processing initiated.</b></li>
<li><b>Proposal of locum to you.</b></li>
<li style="opacity:0.5;">Acceptance or declining a locum.</li>
<li style="opacity:0.5;">Locum Confirmation.</li>
</ol>
</p>
					</div>
		</div> </body></html>';
		
			if ($this->request->getMethod() == 'post') {
				
					$newData = [
						'ord_status' => '3',
	
					];
					$omodel->update($id,$newData);
					$session = session();
					if (EmailHelper::sendEmail($to, $subject, $message)) {
						$session->setFlashdata('success', 'Locum Process Email Succesfully Sent');
						return redirect()->to('backend/order-s3/' . encryptIt($id));
					} else {
						$session->setFlashdata('error', 'Locum Process Email Failed');
						return redirect()->to('backend/order-s3/' . encryptIt($id));
					}
					
					
				}
			}
			public function order_s3($id = null){
				$data = [];
				helper(['form']);
				$id = decryptIt($id);
				$Gmodel = new gradeModel();
				$data['gr_row'] = $Gmodel->findAll();
				$Smodel = new specialityModel();
				$data['sp_row'] = $Smodel->findAll();
				$clmodel = new ClientModel();
				$data['c_det'] = $clmodel->where('cl_status', 1)->where('cl_h_name !=', Null)->where('cl_cont_name !=', Null)->find();
				$Emodel = new EmpModel();
				$data['emp_row'] = $Emodel->where('emp_status', 1)->where('emp_fname !=', Null)->find();
				$omodel = new ordersModel();
				$data['v_ordr'] = $omodel->where('ord_id',$id)->first();
		
				if ($this->request->getMethod() == 'post') {
					$rules = [
						'ord_confirmation_date' => ['label' => 'Confirmation Date', 'rules' => 'required'],
						'ord_adminchrg_intern' => ['label' => 'Total of Admin Charges', 'rules' => 'required'],
						'ord_hosp_earn' => ['label' => 'Total Earning from Client', 'rules' => 'required'],
						'vat_rate' => ['label' => 'VAT Rate', 'rules' => 'required'],
						'ord_vat_sale' => ['label' => 'VAT on Sale', 'rules' => 'required'],
					];
		
					if (!$this->validate($rules)) {
						$data['validation'] = $this->validator;
					} else {
		
		
						//store this to database
		
		
						$newData = [
							'ord_confirmation_date'=> $this->request->getVar('ord_confirmation_date'),
							'ord_adminchrg_intern'=> $this->request->getVar('ord_adminchrg_intern'),
							'ord_hosp_earn'=> $this->request->getVar('ord_hosp_earn'),
							'vat_rate'=> $this->request->getVar('vat_rate'),
							'ord_vat_sale'=> $this->request->getVar('ord_vat_sale'),

		
						];
						$omodel->update($id,$newData);
						$session = session();
						$session->setFlashdata('success', 'Client Confirmation saved');
						return redirect()->to('backend/email-3/' . encryptIt($id));
						
					}
		
		
				}
		
				
				return $this->LoadView('admin/order_s3', $data);
			}
			public function sThirdR($id = null){
				$data = [];
				helper(['form']);
				helper('email');
				$id = decryptIt($id);
				$omodel = new ordersModel();
				$omodel = new ordersModel();
			$data['v_ordr'] = $omodel->join('clients','clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality','emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade','emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id',$id)->first();
			$ord = $data['v_ordr'];
			$lname = explode(' ',$ord['cl_cont_name']);
		// $to = $ord['cl_cont_email'];
		$to = 'okashadell@gmail.com';
		$subject = 'Locum Confirmation';
		$message ='<html><body>
		<div class="card-body">
                    <div class="row mb-3 " id="email">
                               <h3>Dear '.$lname[0].'</h3>
                                <br>
                                <p>At SRA Locum Service we are pleased to confirm you the following doctor.</p>
                                <p><strong>Your Order Details are;</strong></p>
                                <div class="table-responsive">
  <table class="table table-bordered align-middle d-inline"  >
      <tr>
        <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
        <td style="border: 1px solid black;"><strong>'. $ord['cl_h_name']. ', '. $ord['cl_address'].' | ' . $ord['cl_eircode'] .'</strong></td>
      </tr>
      <tr>
        <th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
        <td style="border: 1px solid black;"><strong>'. $ord['cl_cont_name'].'</strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
        <td style="border: 1px solid black;"><strong>'. $ord['spec_name'].' '. $ord['grade_name'].'</strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Offered Doctor (s):</strong></th>
        <td style="border: 1px solid black;"><strong>Dr.'. $ord['emp_fname']. ' ' .$ord['emp_lname'] .'( '. $ord['emp_imcr_no'].')'.'</strong></td>
     </tr>
     <tr>
	 <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
	 <td style="border: 1px solid black;"><strong>';
   $pros = explode(",", $ord['ord_datetime_detail']);
   foreach($pros as $var) {
	 $message .= $var . "<br>";
   }
   $message .= '</strong></td>
      </tr> 
      <tr>
        <th style="border: 1px solid black;"><strong>Rate:</strong></th>
        <td style="border: 1px solid black;"><b>Normal: </b>' . $ord['ord_normal_hrs_rt'] .'<br>'. '<b>OnCall: </b>'. $ord['ord_ocall_rt'].'<br>'.'<b>OffSite: </b>'.$ord['ord_osite_rt'].'<br>'.'<b>Weekend: </b>'.$ord['ord_bhw_rt'].'</td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Admin Charges:</strong></th>
        <td class="text-danger" style="border: 1px solid black;color:red;"><strong>'. $ord['ord_admin_charges'].'%</strong></td>
     </tr>  
  </table>
</div>

<p><strong>“SRA Locum”: Shamrock Assist, incorporated in Ireland under registration number 599436, Registered office is at 2nd Floor, 13 Upper Baggot St, Dublin 4 .</strong></p>

   <br>
   <h3 class="text-danger" style="color:red;">SRA Locum standard terms and conditions are applicable to the above assignment. For the avoidance of doubt,</h3>
<ol type="a" class="text-danger" style="color:red;">
    <li>The Client acknowledges that they are being provided locum doctor through the SRA Locum,</li>
    <li>That all payments will be made to SRA Locum, under no circumstances the client will pay the locum doctor directly. </li>
    <li>Client acknowledges to us that their services are supplied by us as an independent locum.</li>
    <li>Any placed personnel will be under the supervision, direction, and control of the client.</li>
    <li>Where a locum is hired directly by the client within the period of six months of the initial introduction, a one recruitment fee of 7% of the year pay will be payable by the client.</li>
    <li>The credit limit for your every ordering client shall not exceed 1000 euro unless previous dues are paid.</li>
</ol>
   <br>
<hr class="primary">
<p><strong>Order status:</strong>
<ol>
   <li><b>Order confirmation.</b></li>
   <li><b>Order processing initiated.</b></li>
   <li><b>Proposal of locum to you.</b></li>
   <li><b>Acceptance or declining a locum.</b></li>
   <li><b>Locum Confirmation.</b></li>
</ol>
</p>
                                </div>
                    </div>
		</body></html>';

				if ($this->request->getMethod() == 'post') {
					
						$newData = [
							'ord_status' => '3',
		
						];
						$omodel->update($id,$newData);
						$session = session();
						if (EmailHelper::sendEmail($to, $subject, $message)) {
							$session->setFlashdata('success', 'Locum Confirmation Email Succesfully Sent');
							return redirect()->to('backend/order-s4/' . encryptIt($id));
						} else {
							$session->setFlashdata('error', 'Locum Confirmation Email Failed');
							return redirect()->to('backend/order-s4/' . encryptIt($id));
						}
						
						
					}
				}
				public function order_s4($id = null){
					$data = [];
					helper(['form']);
					$id = decryptIt($id);
					$Gmodel = new gradeModel();
					$data['gr_row'] = $Gmodel->findAll();
					$Smodel = new specialityModel();
					$data['sp_row'] = $Smodel->findAll();
					$clmodel = new ClientModel();
					$data['c_det'] = $clmodel->where('cl_status', 1)->where('cl_h_name !=', Null)->where('cl_cont_name !=', Null)->find();
					$Emodel = new EmpModel();
					$data['emp_row'] = $Emodel->where('emp_status', 1)->where('emp_fname !=', Null)->find();
					$omodel = new ordersModel();
					$data['v_ordr'] = $omodel->where('ord_id',$id)->first();
			
					if ($this->request->getMethod() == 'post') {
						$rules = [
							'ord_ref_no' => ['label' => 'Locum Confirmation No', 'rules' => 'required'],
							'ord_pay_to_dr' => ['label' => 'Pay to Dr', 'rules' => 'required'],
							'ord_diff_profit_admin' => ['label' => 'Diff (Profit) + Admin Charges', 'rules' => 'required'],
							'ord_vat_purch' => ['label' => 'VAT on Purchase', 'rules' => 'required'],
							'ord_time_sheet_rcvd' => ['label' => 'TimeSheet Received', 'rules' => 'required'],
							'ord_time_sheet_mode' => ['label' => 'TimeSheet Mode', 'rules' => 'required'],
							'ord_time_sheet_process' => ['label' => 'TimeSheet Processed', 'rules' => 'required'],
							'ord_time_sheet_approved' => ['label' => 'TimeSheet Status', 'rules' => 'required'],
							'ord_invoice_id' => ['label' => 'SRAL Invoice ID', 'rules' => 'required'],
							'ord_invoice_date' => ['label' => 'SRAL Invoice Date', 'rules' => 'required'],
							'ord_invoice_by' => ['label' => 'Invoiced By', 'rules' => 'required'],
							'ord_sage_refer_no' => ['label' => 'Sage Invoice ID', 'rules' => 'required'],
							'ord_invoice_refer' => ['label' => 'Invoice Details', 'rules' => 'required'],  // Invoice Details
							'ord_paymnt_rcvd_date' => ['label' => 'Payment Received', 'rules' => 'required'],
							'ord_payment_status' => ['label' => 'Payment Status', 'rules' => 'required'],
							'ord_pay_to_dr_date' => ['label' => 'Paid to Employee', 'rules' => 'required'],
							'ord_emp_pay_status' => ['label' => 'Employee Payment Status', 'rules' => 'required'],

						];
			
						if (!$this->validate($rules)) {
							$data['validation'] = $this->validator;
						} else {
			
			
							//store this to database
			
			
							$newData = [
								'ord_ref_no'=> $this->request->getVar('ord_ref_no'),	// Locum Confirmation No
								'ord_pay_to_dr'=> $this->request->getVar('ord_pay_to_dr'),
								'ord_diff_profit_admin'=> $this->request->getVar('ord_diff_profit_admin'),
								'ord_vat_purch'=> $this->request->getVar('ord_vat_purch'),
								'ord_vat_save'=> $this->request->getVar('ord_vat_save'),
								'ord_time_sheet_rcvd'=> $this->request->getVar('ord_time_sheet_rcvd'),
								'ord_time_sheet_mode'=> $this->request->getVar('ord_time_sheet_mode'),
								'ord_time_sheet_process'=> $this->request->getVar('ord_time_sheet_process'),
								'ord_time_sheet_approved'=> $this->request->getVar('ord_time_sheet_approved'),
								'ord_comment1'=> $this->request->getVar('ord_comment1') ? $this->request->getVar('ord_comment1') : NULL,
								'ord_invoice_id'=> $this->request->getVar('ord_invoice_id'),
								'ord_invoice_date'=> $this->request->getVar('ord_invoice_date'),
								'ord_invoice_by'=> $this->request->getVar('ord_invoice_by'),
								'ord_sage_refer_no'=> $this->request->getVar('ord_sage_refer_no'),
								'ord_invoice_refer'=> $this->request->getVar('ord_invoice_refer'),	// Invoice Details
								'ord_paymnt_rcvd_date'=> $this->request->getVar('ord_paymnt_rcvd_date'),
								'ord_payment_status'=> $this->request->getVar('ord_payment_status'),
								'ord_pay_to_dr_date'=> $this->request->getVar('ord_pay_to_dr_date'),
								'ord_emp_pay_status'=> $this->request->getVar('ord_emp_pay_status'),
								'ord_comment2'=> $this->request->getVar('ord_comment2') ? $this->request->getVar('ord_comment2') : NULL,				// Payment Remarks

	
			
							];
							$omodel->update($id,$newData);
							$session = session();
							$session->setFlashdata('success', 'Employee Confirmation saved');
							return redirect()->to('backend/email-4/' . encryptIt($id));
							
						}
			
			
					}
			
					
					return $this->LoadView('admin/order_s4', $data);
				}

				public function sFourthR($id = null){
					$data = [];
					helper(['form']);
					helper('email');
					$id = decryptIt($id);
					$omodel = new ordersModel();
					$omodel = new ordersModel();
				$data['v_ordr'] = $omodel->join('clients','clients.cl_id = orders.cl_id','LEFT')->Join('employee', 'employee.emp_id = orders.emp_id','LEFT')->join('emp_speciality','emp_speciality.spec_id = orders.ord_speciality','LEFT')->join('emp_grade','emp_grade.grade_id = orders.ord_grade','LEFT')->where('ord_id',$id)->first();
				$ord = $data['v_ordr'];
			// $to = $ord['cl_cont_email'];
			$to = 'okashadell@gmail.com';
			$subject = 'Employee Confirmation';
			$message ='<html><body>
			<div class="card-body">
                    <div class="row mb-3 " id="email" >
                               <h3 style="color:#157DED">Dear Dr.
                                
                                '. $ord['emp_fname'].' '. $ord['emp_lname']. ' ('. $ord['emp_imcr_no']. ')'.'</h3>
                                <br>
                                <p style="color:#157DED">Congratulations and thank you for taking up this Locum assignment with SRA Locum. Please find attached the confirmation of your booking.</p>
                                <h4 style="color:#157DED">Attachment</h4>
                                <ul class="spbull" style="line-height: 2em;">
                                    <li style="color:#157DED">Attached is the Confirmation of Locum Details with Term & Conditions, Timesheet and Assessment form.<br>
                                        <a type="button" target="_blank" href="'. base_url('public/uploads/SRAL-timesheet.pdf').'" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to Download Timesheet</a></li>
                                    <li style="color:#157DED">Timesheet you are required to complete and get signed by your consultant when you have finished the shifts.</li>
                                    <li style="color:#157DED">Kindly ensure that you get your timesheet signed off at the end of the assignment. This is to make sure that you receive your payment promptly SRA Locum will only pay once Time sheet(s) is confirmed and the Client has paid SRA Locum (T&C applies).</li>
                                    <li style="color:#157DED">Please also submit the attached assessment form to the consultant/ GP whilst you are working as this will enable us to book you out easier in the future.</li>
                                    <li style="color:#157DED">Upon receipt of this email, please read the attached confirmation to confirm all details are correct, and then reply back to us immediately on by return Email.</li>
                                </ul>


   <br>
   <h4 style="color:red;">NOTE:</h4>
   <span style="color:red;" class="text-danger">If you are unable to reach GP/Hospital/assignment place of work on time for the agreed shifts please Contact Hospital/Surgery and SRA Locum on <a href="mailto:info@sralocum.com">info@sralocum.com</a> / 01-6854700. Unnecessary cancelation effects patient care please referrer to <a href="https://www.medicalcouncil.ie/">https://www.medicalcouncil.ie/</a> for additional information.</span>

   
<hr class="primary">
<br>
<p style="color:#157DED"><strong>What is next:</strong>
<ol type="1" style="color:#157DED; line-height: 2em;">
   <li>You finish your locum Assignment</li>
   <li>You send us a scan or fax of timesheet, Alternatively, leave it with HR.</li>
   <li>Once your timesheet hours are confirmed</li>
   <li>Your payment is processed subject to Hospital/ Surgery approval</li>
   <li>Shamrock Assist Locum Services Pays. (All agreed rates are Limited company rates only)</li>
</ol>
</p>

                                </div>
                    </div>
			</body></html>';
		
					if ($this->request->getMethod() == 'post') {
						
							$newData = [
								'ord_status' => '4',
			
							];
							$omodel->update($id,$newData);
							$session = session();
							if (EmailHelper::sendEmail($to, $subject, $message)) {
								$session->setFlashdata('success', 'Employee Confirmation Email Succesfully Sent');
								return redirect()->to('backend/email-4/' . encryptIt($id));
							} else {
								$session->setFlashdata('error', 'Employee Confirmation Email Failed');
								return redirect()->to('backend/email-4/' . encryptIt($id));
							}
							
							
						}
					}
	
}