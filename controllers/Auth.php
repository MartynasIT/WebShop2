<?php
/**
 * Created by PhpStorm.
 * User: Martin
 * Date: 3/30/2018
 * Time: 13:54
 */


class Auth extends CI_Controller
{

    private function spam ()
    {

        $this->load->helper('email');
        $this->form_validation->set_rules('emailSpam', 'Email', 'required|is_unique[spam.email]|valid_email');


        if ($this->form_validation->run() == TRUE) {

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'zymantasvalacka@gmail.com', // change it to yours
                'smtp_pass' => '', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $message = 'Spam hohohoho';
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('zymantasvalacka@gmail.com'); // change it to yours
            $this->email->to($_POST['emailSpam']);// change it to yours
            $this->email->subject('Thank you for signin Up for some spam');
            $this->email->message($message);

            if ($this->email->send()) {
                $data = array(
                    'email' => $_POST['emailSpam'],

                );
                $this->db->insert('spam', $data);
                $this->session->set_flashdata("success", "Dekui!");
            } else {
                $data2 = array(
                    'ip' => $this->input->ip_address(),
                    'attempt' => "SMTP Klaida bandant siusti",
                    'date' => date('Y-m-d H:i:s')


                );
                $this->db->insert('log', $data2);
            }


        }
    }





}
