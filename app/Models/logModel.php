<?php  namespace App\Models;

use CodeIgniter\Model;

class logModel extends Model
{
    protected $table      = 'sra_logs';
    protected $primaryKey = 'log_id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['change_row_id','adm_id','ip_address','action_table','content','first_response', 'locum_process','locum_confirmation','employee_confirmation','event_performed'];
    


    protected $useTimestamps = true;
    protected $createdField  = 'log_date';
    protected $updatedField  = '';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}