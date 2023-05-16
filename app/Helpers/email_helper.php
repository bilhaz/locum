<?php

if (!function_exists('SendEmail')) {

    function sendEmail($to, $subject, $message)
    {
        $email = \Config\Services::email();

        $email->setFrom('no-reply@sralocum.com');
        $email->setTo($to);
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
}
