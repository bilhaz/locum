<?php  namespace App\Models;

use CodeIgniter\Model;

class formulaModel extends Model
{
    protected $table      = 'formulae';
    protected $primaryKey = 'id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['formula','title'];
   


    protected $useTimestamps = true;
    protected $createdField  = 'grade_created';
    protected $updatedField  = 'grade_updated';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}