<?php  namespace App\Models;

use CodeIgniter\Model;

class EmpModel extends Model
{
    protected $table      = 'employee';
    protected $primaryKey = 'emp_id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['emp_spec1', 'emp_spec2', 'emp_spec3', 'emp_grade1','emp_grade2','emp_grade3','emp_fname', 'emp_lname','emp_gender','emp_email','emp_pwd','emp_phone','emp_imcr_no','emp_pps_no','emp_cv','emp_imc_cert','emp_gv_cert','emp_rec_refer','emp_passport','emp_occup_health','emp_work_permit','emp_status','Reset_Token', 'Reset_Token_Expiry','emp_acls','emp_bcls','emp_bls','emp_atls','emp_otherDocs','emp_gpIndemnity'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];    


    protected $useTimestamps = true;
    protected $createdField  = 'emp_created';
    protected $updatedField  = 'emp_updated';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    protected function beforeInsert(array $data){
        $data = $this->passwordHash($data);
        return $data;

    }

    protected function beforeUpdate(array $data){
        $data = $this->passwordHash($data);
        return $data;

    }

    protected function passwordHash(array $data){
        if(isset($data['data']['emp_pwd']))
        $data['data']['emp_pwd'] =  password_hash($data['data']['emp_pwd'], PASSWORD_DEFAULT);

        return $data;

    }
}