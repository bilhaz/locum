<?php

namespace App\Controllers\employee;



use App\Models\UserModel;
use App\Models\EmpModel;
use App\Models\ClientModel;
use App\Models\gradeModel;
use App\Models\ordersModel;
use App\Models\specialityModel;
use App\Models\timesheetModel;
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
				'emp_email' => ['label' => 'Email', 'rules' => 'required'],
				'emp_pwd' => ['label' => 'Password', 'rules' => 'required'],
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
		$id = session()->emp_id;
		$emodel = new EmpModel();
		$data['e_doc'] = $emodel->where('emp_id', $id)->first();
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

		$data['start_date'] = $data['e_ord']['ord_process_details_from'];
		$data['end_date'] = $data['e_ord']['ord_process_details_to'];	





		return $this->LoadView('employees/timesheet', $data);
	}

	public function timesheet_save($ord_id){
		$ord_id = decryptIt($ord_id);
		$model = new timesheetModel();
		foreach($_POST['status'] as $row=>$key){
			$model->insert(array('order_id'=>$ord_id,'dutyDate' => explode(',', $key)[0], 'dutyTime' => explode(',', $key)[1], 'siteStatus' => explode(',', $key)[2]));
		}

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
			if(empty($data['emp']['emp_cv'])){
			$rules = [
				'emp_fname' => ['label' => 'First Name', 'rules' => 'required'],
				'emp_lname' => ['label' => 'Last Name', 'rules' => 'required'],
				'emp_spec1' => ['label' => 'Speciality 1', 'rules' => 'required'],
				'emp_grade1' => ['label' => 'Grade 1', 'rules' => 'required'],
				'emp_pps_no' => ['label' => 'PPS No.', 'rules' => 'required|numeric'],
				'emp_phone' => ['label' => 'Phone No.', 'rules' => 'required|numeric'],
				'emp_imcr_no' => ['label' => 'IMCR No.', 'rules' => 'required|numeric'],
				'emp_cv' => ['label' => 'CV', 'rules' => 'uploaded[emp_cv]|ext_in[emp_cv,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_cv,2048]'],
				'emp_imc_cert' => ['label' => 'IMC Certificate', 'rules' => 'uploaded[emp_imc_cert]|ext_in[emp_imc_cert,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_imc_cert,2048]'],
				'emp_gv_cert' => ['label' => 'Garda Vetting', 'rules' => 'uploaded[emp_gv_cert]|ext_in[emp_gv_cert,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_gv_cert,2048]'],
				'emp_rec_refer' => ['label' => 'Recent Reference', 'rules' => 'uploaded[emp_rec_refer]|ext_in[emp_rec_refer,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_rec_refer,2048]'],
				'emp_passport' => ['label' => 'Passport', 'rules' => 'uploaded[emp_passport]|ext_in[emp_passport,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_passport,2048]'],
				'emp_occup_health' => ['label' => 'Occupational Health', 'rules' => 'uploaded[emp_occup_health]|ext_in[emp_occup_health,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_occup_health,2048]'],
				'emp_work_permit' => ['label' => 'Work Permit', 'rules' => 'uploaded[emp_work_permit]|ext_in[emp_work_permit,jpg,jpeg,JPEG,JPG,pdf,PDF]|max_size[emp_work_permit,2048]'],
					'emp_gender'=> ['label' => 'Gender', 'rules' => 'required'],
			];
		} else {
			$rules = [
				'emp_fname' => ['label' => 'First Name', 'rules' => 'required'],
				'emp_lname' => ['label' => 'Last Name', 'rules' => 'required'],
				'emp_spec1' => ['label' => 'Speciality 1', 'rules' => 'required'],
				'emp_grade1' => ['label' => 'Grade 1', 'rules' => 'required'],
				'emp_pps_no' => ['label' => 'PPS No.', 'rules' => 'required|numeric'],
				'emp_phone' => ['label' => 'Phone No.', 'rules' => 'required|numeric'],
				'emp_imcr_no' => ['label' => 'IMCR No.', 'rules' => 'required|numeric'],
				'emp_gender'=> ['label' => 'Gender', 'rules' => 'required'],
			];
		}


			$errors = [
				'emp_cv' => [
					'uploaded' => 'Can not upload not a valid file'
				],
				'emp_cv' => [
					'ext_in' => 'File is not an image'
				],
				'emp_cv' => [
					'max_size' => 'Image size is < than 2mb'
				],

				'emp_imc_cert' => [
					'uploaded' => 'Can not upload not a valid file'
				],
				'emp_imc_cert' => [
					'ext_in' => 'File is not an image'
				],
				'emp_imc_cert' => [
					'max_size' => 'Image size is < than 2mb'
				],

				'emp_gv_cert' => [
					'uploaded' => 'Can not upload not a valid file'
				],
				'emp_gv_cert' => [
					'ext_in' => 'File is not an image'
				],
				'emp_gv_cert' => [
					'max_size' => 'Image size is < than 2mb'
				],

				'emp_rec_refer' => [
					'uploaded' => 'Can not upload not a valid file'
				],
				'emp_rec_refer' => [
					'ext_in' => 'File is not an image'
				],
				'emp_rec_refer' => [
					'max_size' => 'Image size is < than 2mb'
				],

				'emp_passport' => [
					'uploaded' => 'Can not upload not a valid file'
				],
				'emp_passport' => [
					'ext_in' => 'File is not an image'
				],
				'emp_passport' => [
					'max_size' => 'Image size is < than 2mb'
				],

				'emp_occup_health' => [
					'uploaded' => 'Can not upload not a valid file'
				],
				'emp_occup_health' => [
					'ext_in' => 'File is not an image'
				],
				'emp_occup_health' => [
					'max_size' => 'Image size is < than 2mb'
				],

				'emp_work_permit' => [
					'uploaded' => 'Can not upload not a valid file'
				],
				'emp_work_permit' => [
					'ext_in' => 'File is not an image'
				],
				'emp_work_permit' => [
					'max_size' => 'Image size is < than 2mb'
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


}
