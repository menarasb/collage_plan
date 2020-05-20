<?php

class User extends MY_Controller
{

    function user_profil()
    {
        $this->data['judul'] = 'Profil User'; 
        $this->load->view('ut/profile', $this->data);
    }

    function update_user()
    {
        $username = $this->input->post('username');
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $prodi = $this->input->post('prodi');
        $old_file = $this->input->post('old_file');
        $id = $this->input->post('id');

        $config['upload_path']          = './assets/img';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['encrypt_name']           = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $file_name = $old_file;
        } else {
            $file_name = $this->upload->data('file_name');
            unlink ('./assets/img/'.$old_file);
        }

        $data = array(
            'username' => $username,
            'nim' => $nim,
            'nama' => $nama,
            'alamat' => $alamat,
            'telp' => $telp,
            'prodi' => $prodi,
            'file' => $file_name
        );
        $where = array(
            'id' => $id
        );

        $this->session->set_flashdata('success','Berhasil diupdate');
        $this->m_crud->edit("user",$data,$where);
        redirect(base_url('user/user_profil'));
    }

    function ganti_password()
    {
        $id = $this->input->post('id');
        $password_lama = md5($this->input->post('password_lama'));    
        $password_baru = md5($this->input->post('password_baru'));       
        $confirm_password_baru = md5($this->input->post('confirm_password_baru'));
        $where = array('password' => $password_lama, 'id' => $id);
        $data_pass = $this->m_crud->cek_row("user", $where)->row();
        $get_pass = $data_pass->password;
        if($password_lama == $get_pass):
            if($password_baru == $confirm_password_baru):
                $data = array('password'=>$password_baru);
                $this->m_crud->edit("user", $data, $where);
                $this->session->set_flashdata('sukses_ganti','berhasil');
            else:
                $this->session->set_flashdata('password_beda','berhasil');
            endif;           
        else:
            $this->session->set_flashdata('password_lama_salah','gagal');
        endif;
        redirect(base_url('user/user_profil'));
    }

}
