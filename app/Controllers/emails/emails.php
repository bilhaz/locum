<?php

namespace App\Controllers\emails;

helper('email');

use PhpImap\Mailbox;

class emails extends EMBaseController
{


    public function inbox($page = 1, $perPage = 10)
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

        // Calculate the starting and ending index for the current page
        $startIndex = ($page - 1) * $perPage;
        $endIndex = $startIndex + $perPage - 1;
        $endIndex = min($endIndex, $totalEmails - 1);

        // Get the current page's email IDs
        $mailIdsPage = array_slice($mailIds, $startIndex, $perPage);

        // Process the retrieved emails
        $emails = [];
        foreach ($mailIdsPage as $mailId) {
            $emails[] = $mailbox->getMail($mailId);
        }

        // Disconnect from the IMAP server
        $mailbox->disconnect();

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
