<?php  namespace App\Models;

use CodeIgniter\Model;

class sessionModel extends Model
{
    protected $table      = 'ci_sessions';
    protected $primaryKey = 'id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['id','ip_address','timestamp','data'];
   


    protected $useTimestamps = false;
    // protected $createdField  = 'grade_created';
    // protected $updatedField  = 'grade_updated';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}