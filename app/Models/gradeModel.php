<?php  namespace App\Models;

use CodeIgniter\Model;

class gradeModel extends Model
{
    protected $table      = 'emp_grade';
    protected $primaryKey = 'grade_id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['grade_name'];
   


    protected $useTimestamps = true;
    protected $createdField  = 'grade_created';
    protected $updatedField  = 'grade_updated';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}