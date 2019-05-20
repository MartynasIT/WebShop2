<?php

if(isset($_POST['send'])) {
    $this->load->helper('email');
    $this->form_validation->set_rules('emailSpam', 'Email', 'required|is_unique[spam.email]|valid_email');


    if($this->form_validation->run() == TRUE) {

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'webdemo19@gmail.com', // change it to yours
            'smtp_pass' => 'gedas123', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = 'Spam hohohoho';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('webdemo19@gmail.com'); // change it to yours
        $this->email->to($_POST['emailSpam']);// change it to yours
        $this->email->subject('Thank you for signin Up for some spam');
        $this->email->message($message);
        if($this->email->send())
        {
            echo 'Email sent.';
        }
        else
        {
            show_error($this->email->print_debugger());
            $data1 = array(
                'ip' => $this->input->ip_address(),
                'attempt' => "Serveriui nepavyko isiusti spam meilo",
                'date' =>  date('Y-m-d H:i:s')


            );
            $this->db->insert('log', $data1);
        }



        $data = array(
            'email' => $_POST['emailSpam'],

        );
        $this->db->insert('spam', $data);
        $this->session->set_flashdata("success", "Dekui!");
        redirect('shop', "refresh");

    }


    else
    {
        $data1 = array(
            'ip' => $this->input->ip_address(),
            'attempt' => "Vartotojas Ivede bloga emaila bandant siusti spama",
            'date' =>  date('Y-m-d H:i:s')


        );
    //    $this->db->insert('log', $data1);
    }

}
