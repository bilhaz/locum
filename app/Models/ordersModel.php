<?php  namespace App\Models;

use CodeIgniter\Model;

class ordersModel extends Model
{
    protected $table      = 'orders';
    protected $primaryKey = 'ord_id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['ord_speciality','ord_datetime_detail','ord_grade','cl_id','emp_id','ord_required_from', 'ord_required_to','ord_process_date','ord_process_details_from','ord_process_details_to','ord_confirmation_date','ord_invoice_id','ord_normal_hrs','ord_on_call_hrs','ord_approx_cost','ord_pay_to_dr','ord_admin_charges','ord_diff_profit_admin','ord_total_hrs','ord_time_sheet_rcvd','ord_time_sheet_mode','ord_time_sheet_process','ord_time_sheet_approved','ord_invoice_refer','ord_invoice_date','ord_invoice_by','ord_sage_refer_no','ord_paymnt_rcvd_date','ord_pay_to_dr_date','ord_case_status','ord_payment_status','ord_comment2','ord_comment1','ord_assignment','ord_status','ord_cancel_bdr','ord_cancel_bcl','ord_dr_cremarks','ord_cl_cremarks','ord_prosdatetime_detail','ord_ref_no','ord_vat_sale','ord_vat_purch','ord_vat_save','ord_hosp_earn','ord_paying_to_dr','ord_adminchrg_intern'];
    


    protected $useTimestamps = true;
    protected $createdField  = 'ord_created';
    protected $updatedField  = 'ord_updated';
    //protected $deletedField  = 'usr_deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    
}