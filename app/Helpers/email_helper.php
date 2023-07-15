<?php

if (!function_exists('SendEmail')) {

    function sendEmail($to, $cc, $subject, $message)
    {
        $email = \Config\Services::email();

        $email->setFrom('info@sralocum.com');
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
    $logModel = new App\Models\logModel();
    
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
function em_log($data = array()) {
    $emailLogModel = new App\Models\emailLogModel();
    
    $emLog = [
            'em_to' => $data['em_to'],
            'em_subject' => $data['em_subject'],
            'em_body' => json_encode($data['em_body']),
            'row_id' => $data['row_id'],
            'action_table' => $data['action_table'],
            'em_status' =>  $data['em_status'],
    ];
    $emailLogModel->insert($emLog);
    
}
function show_404(){
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
}
function composeEmail($to, $cc, $bcc, $subject, $message, $attachments = [],$inReplyTo = null)
{
    $email = \Config\Services::email();

    $email->setFrom('info@sralocum.com');
    $email->setTo($to);
    $email->setBCC($bcc);
    $email->setCC($cc);
    $email->setSubject($subject);
    $email->setMessage($message);
    $email->setMailType('html'); // Set email content type to HTML

    // Attachments
    if (!empty($attachments)) {
        foreach ($attachments as $attachment) {
            $email->attach($attachment);
        }
    }
     // Set In-Reply-To and References headers
     if (!empty($inReplyTo)) {
        $email->setHeader('In-Reply-To', $inReplyTo);
    }
        // print_r($email);exit;
    if ($email->send()) {
        // echo $email->printDebugger();exit;
        return true;
    } else {
        // echo $email->printDebugger();exit;
        return false;
    }
}

}