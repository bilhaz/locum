<?php

if (!function_exists('SendEmail')) {

    function sendEmail($to, $cc, $subject, $message)
    {
        $email = \Config\Services::email();

        $email->setFrom('no-reply@sralocum.com');
        $email->setTo($to);
        $email->setBCC($cc);
        $email->setSubject($subject);
        $email->setMessage($message);
        $email->setMailType('html'); // Set email content type to HTML


        if ($email->send()) {
            // echo $email->printDebugger();exit;
            return true;
        } else {
            // echo $email->printDebugger();exit;
            return false;
        }
    }
function add_log($data = array()) {
    $logModel = new App\Models\LogModel();
    
    $log = [
            'adm_id' => $data['adm_id'],
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'change_row_id' => $data['row_id'],
            'action_table' => $data['action_table'],
            'content' => json_encode($data['content']),
            'event_performed' => $data['event'],
            'first_response' => isset($data['first_response']) ? $data['first_response'] : 0,
            'locum_process' => isset($data['locum_process']) ? $data['locum_process'] : 0,
            'locum_confirmation' => isset($data['locum_confirmation']) ? $data['locum_confirmation'] : 0,
            'employee_confirmation' => isset($data['employee_confirmation']) ? $data['employee_confirmation'] : 0,
    ];
    $logModel->insert($log);
    
}
}