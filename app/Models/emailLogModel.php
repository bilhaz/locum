<?php  namespace App\Models;

use CodeIgniter\Model;

class emailLogModel extends Model
{
    protected $table      = 'email_logs';
    protected $primaryKey = 'em_id ';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['em_to','em_subject','em_body','row_id','action_table','em_status'];
    


    protected $useTimestamps = true;
    protected $createdField  = 'sent_at';
    protected $updatedField  = '';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}