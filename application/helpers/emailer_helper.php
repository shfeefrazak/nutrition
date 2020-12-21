<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if(!function_exists('emailconfig')){
    function emailconfig(){
          $config = Array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'ssl://smtp.googlemail.com',
                  'smtp_port' => 465,
                  'smtp_user' => 'sunapigroup@gmail.com', // change it to yours
                  'smtp_pass' => 'XXXX', // change it to yours
                  'mailtype' => 'html',
                  'charset' => 'iso-8859-1',
                  'wordwrap' => TRUE
                  );
               /* $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.carsplates.com',
                    'smtp_port' => 25,
                    'smtp_user' => 'notify@carsplates.com', // change it to yours
                    'smtp_pass' => 'ABC123abc', // change it to yours
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );*/
          return $config;
    }
}
if (!function_exists('sentmessageto')) {
    function sentmessageto($message,$subject_, $to_email){
        if(Cons::EMAIL_ENABLE){
         if (isset($message)) {

               $config = emailconfig();
                $CI = & get_instance();
                $CI->load->library('email', $config );
                $CI->email->set_newline("\r\n");
                $CI->email->from($config['smtp_user'], '.com'); // change it to yours
                $CI->email->to($to_email);
                $CI->email->subject($subject_);
                $CI->email->message($message);
                if ($CI->email->send()) {

                    // echo 'Email sent.';
                    return true;
                } else {
                    printv($CI->email->print_debugger(), 'Email sending error', 'red');

                    //echo 'false 222';
                    return false;
                }
            } else {
                // echo 'false 111';
                return false;
            }
        }
    }
}

if (!function_exists('sentsingleMail')) {


    function sentsingleMail($msg) {
        $msg['body'] = 
                'Name    : <b>'.$msg['name'].'</b><br/><br/>'.
                'Email   : <b>'.$msg['email'].'</b><br/><br/>'.
                'Mob     : <b>'.$msg['phonenumber'].'</b><br/><br/>'.
                'Message : <b><p>'.$msg['message'].'</p></b><br/><br/>'.
                'Time    : <b>'.getCurrentDateWithTime().'</b><br/><br/>'.
                'IP    : <b>'.$msg['ip'].'</b><br/><br/>';
                
        $enableEmail = TRUE;
        if ($enableEmail) {
            if (isset($msg)) {

               $config = emailconfig();
                $CI = & get_instance();
                $CI->load->library('email', $config );
                $CI->email->set_newline("\r\n");
                $CI->email->from($config['smtp_user'], '.com'); // change it to yours
                $CI->email->to(Cons::contactmessage_email_sent_to);
                $CI->email->subject(Cons::contactmessage_subject.'-'.  getCurrentDateWithTime());
                $CI->email->message($msg['body']);
                if ($CI->email->send()) {

                    // echo 'Email sent.';
                    return true;
                } else {
                    printv($CI->email->print_debugger(), 'Email sending error', 'red');

                    //echo 'false 222';
                    return false;
                }
            } else {
                // echo 'false 111';
                return false;
            }
        }
       
    }

}

