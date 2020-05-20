<?php

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->data['setting'] = $this->m_crud->manual_query("SELECT * FROM settings")->row();    
        if ($this->session->userdata('status_login') != "login") {
            redirect(base_url());
        } else {
            $this->data['user'] = $this->m_crud->data_user();
        }
    }

    
}
