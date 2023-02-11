<?php  namespace App\Models;

use CodeIgniter\Model;

class timesheetModel extends Model
{
    protected $table      = 'timesheets';
    protected $primaryKey = 'id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'order_id', 'dutyDate', 'dutyTime', 'siteStatus'];
    


    protected $useTimestamps = true;
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}