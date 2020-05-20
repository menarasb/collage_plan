<?php

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_crud');
    }

    function cek_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        //cek apakah user ada
        $db_user = $this->m_crud->manual_query("SELECT a.*, b.level FROM user a LEFT JOIN user_grup b ON b.id = a.level_id WHERE a.username = '$username' AND a.password = '$password'");
        $cek_user = $db_user->num_rows();
        $user_session = $db_user->row();
        if ($cek_user > 0) {
            $data = array(
                'id'       => $user_session->id,
                'username' => $user_session->username,
                'nama'     => $user_session->nama,
                'alamat'   => $user_session->alamat,
                'telp'     => $user_session->telp,
                'nim'      => $user_session->nim,
                'level_id' => $user_session->level_id,
                'file'     => $user_session->file,
                'prodi'    => $user_session->prodi,
                'status_login' => "login"
            );
            $this->session->set_userdata($data);
            $user_agent = array(
                'username' => $user_session->username,
                'browser' => $this->agent->browser(),
                'platform' => $this->agent->platform(),
                'ip'    =>$this->input->ip_address(),
                'login_time' => mdate('%Y-%m-%d %H:%i:%s')
            );
            $this->m_crud->input("session_log", $user_agent);
            if ($this->session->userdata('level_id') == '1') :
                redirect(base_url('admin'));
            elseif ($this->session->userdata('level_id') == '2') :
                redirect(base_url('rencana/dashboard'));
            endif;
        } else {
            $this->session->set_flashdata('flash_login_error', 'gagal login');
            redirect(base_url('home'));
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
