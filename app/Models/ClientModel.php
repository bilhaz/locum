<?php  namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table      = 'clients';
    protected $primaryKey = 'cl_id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['cl_reg_as', 'cl_h_name', 'cl_county','cl_cont_desig', 'cl_eircode','cl_cont_name','cl_cont_email','cl_usr','cl_cont_pwd', 'cl_cont_phone','cl_address','cl_status'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];


    protected $useTimestamps = true;
    protected $createdField  = 'cl_created';
    protected $updatedField  = 'cl_updated';
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
        if(isset($data['data']['cl_cont_pwd']))
        $data['data']['cl_cont_pwd'] =  password_hash($data['data']['cl_cont_pwd'], PASSWORD_DEFAULT);

        return $data;

    }
}