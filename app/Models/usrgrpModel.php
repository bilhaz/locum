<?php  namespace App\Models;

use CodeIgniter\Model;

class usrgrpModel extends Model
{
    protected $table      = 'usr_groups';
    protected $primaryKey = 'grp_id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['grp_role'];
    


    protected $useTimestamps = true;
    protected $createdField  = 'grp_created';
    protected $updatedField  = 'grp_updated';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}