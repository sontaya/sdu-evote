<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'smtp.office365.com',
    'smtp_port' => 587, 
    'smtp_user' => 'kohamail@dusit.ac.th',
    'smtp_pass' => 'kohaexchange@l;of6lb9',
    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'newline' => "\r\n", //REQUIRED! Notice the double quotes! 
    'crlf' => "\r\n",
    'charset' => 'utf-8',
    'wordwrap' => TRUE
);