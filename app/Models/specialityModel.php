<?php  namespace App\Models;

use CodeIgniter\Model;

class specialityModel extends Model
{
    protected $table      = 'emp_speciality';
    protected $primaryKey = 'spec_id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['spec_name'];
    


    protected $useTimestamps = true;
    protected $createdField  = 'spec_created';
    protected $updatedField  = 'spec_updated';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}