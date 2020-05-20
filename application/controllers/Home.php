<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
        $this->data['user'] = $this->m_crud->data_user(); 
        $this->data['setting'] = $this->m_crud->manual_query("SELECT * FROM settings")->row();          
  
    }

    function index()
    {
        $this->data['judul'] = 'Rencana Perkuliahan UT';        
        if ($this->session->userdata('status_login') != "login") {
            $this->data['content'] = $this->m_crud->manual_query("SELECT * FROM home_content WHERE id ='1'")->row();
            $this->load->view('ut/home', $this->data);
        } else {
            redirect(base_url('rencana/dashboard'));   
        }
        
    }

    
}
