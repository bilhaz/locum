<?php

namespace App\Controllers\emails;

helper('email');

use PhpImap\Mailbox;

class emails extends EMBaseController
{


    public function inbox()
    {
        $hostname = '{mail.sralocum.com:993/imap/ssl}INBOX';
        $username = 'Info@sralocum.com';
        $password = 'Tesco1234';

        $mailbox = new Mailbox($hostname, $username, $password);

        // Set the sorting order to descending
        $sortingOrder = 'SORTDATE';
        $searchCriteria = 'ALL';

        // Retrieve all email IDs matching the search criteria
        $mailIds = $mailbox->searchMailbox($searchCriteria, $sortingOrder);
        
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perPage = Per_Page_Emails;

        // Reverse the array to get descending order
        $mailIds = array_reverse($mailIds);
        
        $totalEmails = count($mailIds); // Calculate the total number of emails

        // Calculate the starting and ending index for the current page
        $startIndex = ($page - 1) * $perPage;
        $endIndex = $startIndex + $perPage - 1;
        $endIndex = min($endIndex, $totalEmails - 1);

        // Get the current page's email IDs
        $mailIdsPage = array_slice($mailIds, $startIndex, $perPage);

        // Process the retrieved emails
        $emails = [];
        foreach ($mailIdsPage as $mailId) {
            // $emails[] = $mailbox->getMail($mailId);
            $email = $mailbox->getMail($mailId);
            // print_r($email);exit;
            // Retrieve attachments for each email
            // $attachments = [];
            // $attachments = '<ul>';
            // foreach ($email->getAttachments() as $attachment) {
            //     $attachmentFilename = $attachment->filePath;
                
            //     // If the filePath property is not available, you can try using the name property instead
            //     if (empty($attachmentFilename)) {
            //         $attachmentFilename = $attachment->name;
            //     }
            //     $attachments .= '<li><a href="data:application/octet-stream;base64,' . base64_encode($attachment->getContents()) . '" download="' . $attachmentFilename . '">' . $attachmentFilename . '</a></li>';

                // $attachments[] = [
                //     'name' => $attachmentFilename,
                //     'content' => $attachment->getContents()
                // ];
            // }
            // $attachments .= '<ul>';
            
            $emails[] = [
                'id'=> $email->id,
                'subject' => $email->subject,
                'from' => $email->fromAddress,
                // 'to' => $email->to,
                // 'cc' => $email->cc,
                // 'bcc' => $email->bcc,
                'seen' => $email->isSeen,
                'date' => $email->date,
                // 'body' => (isset($email->textHtml)&&!empty($email->textHtml)?$email->textHtml : $email->textPlain),
                // 'attachments' => $attachments
            ];
        }
        
        // Disconnect from the IMAP server
        $mailbox->disconnect();
        // print_r($emails);
        // exit;
        $totalPages = ceil($totalEmails / $perPage); // Calculate the total number of pages

        $data['emails'] = $emails;
        $data['currentPage'] = $page;
        $data['perPage'] = $perPage;
        $data['startIndex'] = $startIndex;
        $data['endIndex'] = $endIndex;
        $data['totalEmails'] = $totalEmails;
        $data['totalPages'] = $totalPages;
       
        // Load the inbox view with the retrieved emails and pagination data
        return $this->LoadView('emails/inbox', $data);
    }
    public function view_email($id = null)
{
    $id = decryptIt($id);
    $hostname = '{mail.sralocum.com:993/imap/ssl}INBOX';
    $username = 'Info@sralocum.com';
    $password = 'Tesco1234';

    $mailbox = new Mailbox($hostname, $username, $password);

    $email = $mailbox->getMail($id);

    if ($email) {
        $attachments = [];
        $attachmentLinks = '<ul>';

        foreach ($email->getAttachments() as $attachment) {
            $attachmentFilename = $attachment->filePath;

            // If the filePath property is not available, you can try using the name property instead
            if (empty($attachmentFilename)) {
                $attachmentFilename = $attachment->name;
            }

            $attachmentLinks .= '<li><a href="data:application/octet-stream;base64,' . base64_encode($attachment->getContents()) . '" download="' . $attachmentFilename . '">' . $attachmentFilename . '</a></li>';

            $attachments[] = [
                'name' => $attachmentFilename,
                'content' => $attachment->getContents()
            ];
        }

        $attachmentLinks .= '</ul>';

        // If the email is not marked as seen, set isSeen to true
        if (!$email->isSeen) {
            $mailbox->markMailAsRead($id);
        }

        $emailData = [
                'id' => $email->id,
                'subject' => $email->subject,
                'from' => $email->fromAddress,
                'to' => $email->to,
                'cc' => $email->cc,
                'bcc' => $email->bcc,
                'seen' => $email->isSeen,
                'date' => $email->date,
                'body' => (isset($email->textHtml) && !empty($email->textHtml)) ? $email->textHtml : $email->textPlain,
                'attachments' => $attachmentLinks
        ];

        // Disconnect from the IMAP server
        $mailbox->disconnect();


    // Prepare the data to be passed to the view
    $data['emails'] = $emailData;
    $data['currentPage'] = 1;
    $data['perPage'] = 1;
    $data['startIndex'] = 0;
    $data['endIndex'] = 0;
    $data['totalEmails'] = 1;
    $data['totalPages'] = 1;
    // print_r($data['emails']);exit;
    // Load the email view with the retrieved email data
    return $this->LoadView('emails/view-email', $data);
    
    } else {
        // Email not found
        return 'Email not found';
    }
}

// Updating through ajax function
public function inboxUpdate_data()
{
    $hostname = '{mail.sralocum.com:993/imap/ssl}INBOX';
    $username = 'Info@sralocum.com';
    $password = 'Tesco1234';

    $mailbox = new Mailbox($hostname, $username, $password);

    // Set the sorting order to descending
    $sortingOrder = 'SORTDATE';
    $searchCriteria = 'ALL';

    // Retrieve all email IDs matching the search criteria
    $mailIds = $mailbox->searchMailbox($searchCriteria, $sortingOrder);

    // Reverse the array to get descending order
    $mailIds = array_reverse($mailIds);

    $totalEmails = count($mailIds); // Calculate the total number of emails

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $perPage = Per_Page_Emails;

    // Calculate the starting and ending index for the current page
    $startIndex = ($page - 1) * $perPage;
    $endIndex = $startIndex + $perPage - 1;
    $endIndex = min($endIndex, $totalEmails - 1);

    // Get the current page's email IDs
    $mailIdsPage = array_slice($mailIds, $startIndex, $perPage);

    // Process the retrieved emails
    $emails = [];
    foreach ($mailIdsPage as $mailId) {
        $email = $mailbox->getMail($mailId);

        $emails[] = [
            'id' => $email->id,
            'subject' => $email->subject,
            'from' => $email->fromAddress,
            'seen' => $email->isSeen,
            'date' => $email->date,
        ];
    }

    // Disconnect from the IMAP server
    $mailbox->disconnect();

    foreach ($emails as $row) {
        echo '<li class="clearfix';
        if ($row['seen'] != "1") {
            echo ' unread';
        }
        echo '">';
        echo '<div class="mail-detail-left float-start">';
        echo '<div class="form-check">';
        echo '<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">';
        echo '<label class="form-check-label" for="flexCheckDefault7"></label>';
        echo '</div>';
        echo '</div>';
        echo '<div class="mail-detail-right float-start">';
        echo '<h6 class="sub">';
        echo '<a href="' . base_url('emails/view_email/' . encryptIt($row['id'])) . '" target="_blank" class="mail-detail-expand">' . (isset($row['subject']) && !empty($row['subject']) ? $row['subject'] : 'No-Subject') . '</a>';
        echo ($row['seen'] != "1") ? '<span class="badge bg-success mb-0">New</span>' : '<span class="badge bg-info mb-0">Read</span>';
        echo '</h6>';
        echo '<p class="dep">';
        echo '<span class="">' . $row['from'] . '</span>';
        echo '</p>';
        echo '<span class="time">' . date("j F", strtotime($row['date'])) . '</span>';
        echo '</div>';
        echo '</li>';
    }
            
 }

 public function reply_email($id = null)
 {
     $id = decryptIt($id);
     $hostname = '{mail.sralocum.com:993/imap/ssl}INBOX';
     $username = 'Info@sralocum.com';
     $password = 'Tesco1234';
 
     $mailbox = new Mailbox($hostname, $username, $password);
 
     $email = $mailbox->getMail($id);
    // print_r($email);exit;

     if ($email) {
            $attachments = [];
            $attachmentLinks = '<ul>';
    
            foreach ($email->getAttachments() as $attachment) {
                $attachmentFilename = $attachment->filePath;
    
                // If the filePath property is not available, you can try using the name property instead
                if (empty($attachmentFilename)) {
                    $attachmentFilename = $attachment->name;
                }
    
                $attachmentLinks .= '<li><a href="data:application/octet-stream;base64,' . base64_encode($attachment->getContents()) . '" download="' . $attachmentFilename . '">' . $attachmentFilename . '</a></li>';
    
                $attachments[] = [
                    'name' => $attachmentFilename,
                    'content' => $attachment->getContents()
                ];
            }
    
            $attachmentLinks .= '</ul>';
         // Retrieve the necessary data from the email
         $id = $email->id;
         $subject = 'Re: ' . $email->subject;
         $to = $email->fromAddress;
         $cc = $email->cc;
        //  $bcc = $email->bcc;
         $body = (isset($email->textHtml) && !empty($email->textHtml)) ? $email->textHtml : $email->textPlain; // Use the plain text version of the email as the default body
        
 
         // Prepare the data to be passed to the view
         $data['id'] = $id;
         $data['subject'] = $subject;
         $data['to'] = $to;
         $data['cc'] = $cc;
        //  $data['bcc'] = $bcc;
         $data['body'] = $body;
         $data['attachments'] = $attachmentLinks;
            // print_r($data['body']);exit;
         // Disconnect from the IMAP server
         $mailbox->disconnect();
 
         // Load the reply email view with the retrieved data
         return $this->LoadView('emails/reply-email', $data);
     } else {
         // Email not found
         return 'Email not found';
     }
 }
 public function reply_email_send($id = null)
 {
    $id = decryptIt($id);
     $data = [];

    //  $hostname = '{mail.sralocum.com:993/imap/ssl}INBOX';
    //  $username = 'Info@sralocum.com';
    //  $password = 'Tesco1234';
 
    //  // Connect to the IMAP server
    //  $mailbox = imap_open($hostname, $username, $password);
 
    //  // Mark the email as answered
    //  imap_setflag_full($mailbox, $id, "\\Answered");
 
    //  // Close the mailbox
    //  imap_close($mailbox);

     if ($this->request->getMethod() == 'post') {
         $to = $this->request->getVar('to');
         $subject = $this->request->getVar('subject');
         $cc = $this->request->getVar('cc');
         $bcc = $this->request->getVar('bcc');
         $message = $this->request->getVar('body');
         
         $session = session();
         if (composeEmail($to, $cc, $bcc, $subject, $message)) {
             $session->setFlashdata('success', 'Email sent Successfully');
             $emLog = [
                 'em_to' => $to,
                 'em_subject' => $subject,
                 'em_body' => $message,
                 'row_id' => 'NULL',
                 'action_table' => 'Webmail',
                 'em_status' => '1',
             ];
             em_log($emLog);
             return redirect()->to('emails/inbox');
         } else {
             $session->setFlashdata('error', 'Email Failed, might be issue in your Internet');
             $emLog = [
                 'em_to' => $to,
                 'em_subject' => $subject,
                 'em_body' => $message,
                 'row_id' => 'NULL',
                 'action_table' => 'Webmail',
                 'em_status' => '0',
             ];
             em_log($emLog);
             return redirect()->to('emails/inbox');
         }
     }
 }
    // Compose Email
    public function compose()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $to = $this->request->getVar('email');
            $subject = $this->request->getVar('subject');
            $cc = $this->request->getVar('cc');
            $bcc = $this->request->getVar('bcc');
            $message = $this->request->getVar('body');
            $session = session();
            if (composeEmail($to, $cc, $bcc, $subject, $message)) {
                $session->setFlashdata('success', 'Email sent Successfully');
                $emLog = [
                    'em_to' => $to,
                    'em_subject' => $subject,
                    'em_body' => $message,
                    'row_id' => 'NULL',
                    'action_table' => 'Webmail',
                    'em_status' => '1',
                ];
                em_log($emLog);
                return redirect()->to('emails/inbox');
            } else {
                $session->setFlashdata('error', 'Email Failed, might be issue in your Internet');
                $emLog = [
                    'em_to' => $to,
                    'em_subject' => $subject,
                    'em_body' => $message,
                    'row_id' => 'NULL',
                    'action_table' => 'Webmail',
                    'em_status' => '0',
                ];
                em_log($emLog);
                return redirect()->to('emails/inbox');
            }
        }
        return $this->LoadView('emails/compose', $data);
    }
}
