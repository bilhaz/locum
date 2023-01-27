<?php  namespace App\Models;

use CodeIgniter\Model;

class clRegModel extends Model
{
    protected $table      = 'cl_reg_cat';
    protected $primaryKey = 'reg_cat_id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['reg_cat_name'];
   


    protected $useTimestamps = true;
    protected $createdField  = 'reg_cat_created';
    protected $updatedField  = 'reg_cat_updated';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}