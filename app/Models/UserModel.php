<?php  namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'usr_id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['usr_email', 'usr_name', 'usr_pwd', 'usr_designation','grp_id','usr_status'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];


    protected $useTimestamps = true;
    protected $createdField  = 'usr_created';
    protected $updatedField  = 'usr_updated';
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
        if(isset($data['data']['usr_pwd']))
        $data['data']['usr_pwd'] =  password_hash($data['data']['usr_pwd'], PASSWORD_DEFAULT);

        return $data;

    }
}