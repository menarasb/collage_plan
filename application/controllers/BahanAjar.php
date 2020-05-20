<?php

class Bahanajar extends MY_Controller{

    function list()
    {
        $this->data['judul'] = 'Bahan Ajar';
        $this->data['bahan_ajar'] = $this->m_crud->manual_query("SELECT a.*,b.matkul FROM bahan_ajar a LEFT JOIN daftar_matkul b on b.kode = a.kode")->result();
        $this->data['kode_matkul'] = $this->m_crud->list_view("daftar_matkul")->result();
        $this->load->view('ut/bahan_ajar_list.php', $this->data);
    }

    function add()
    {
        $kode = $this->input->post('kode');
        $keterangan = $this->input->post('keterangan');
        $username   = $this->session->userdata('username');

        $config['upload_path']          = './uploads';
        $config['allowed_types']        = 'pdf|doc|xls|docx|xlsx';
        $config['encrypt_name']           = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $file_name = NULL;        
        } else {       
            $file_name = $this->upload->data('file_name');
        }

        $data = array(
            'kode' => $kode,
            'keterangan' => $keterangan,
            'file' => $file_name,
            'username' => $username         
        );
        
        $this->session->set_flashdata('flash_sukses','Berhasil ditambah');   
        $this->m_crud->input("bahan_ajar",$data);
        redirect(base_url('bahanajar/list'));


    }

    function download($fileName)
    {
        if ($fileName) {
            $file = realpath("uploads") . "\\" . $fileName;
            // check file exists    
            if (file_exists($file)) {
                // get file content
                $data = file_get_contents($file);
                //force download
                force_download($fileName, $data);
            } else {
                // Redirect to base url
                redirect(base_url());
            }
        }
    }

    function delete($id)
    {
        $where = array('id' => $id);
        $data = $this->m_crud->cek_row("bahan_ajar", $where)->row();  
        unlink('./uploads/'.$data->file);
        $this->m_crud->hapus("bahan_ajar", $where);      
        $this->session->set_flashdata('flash_hapus','dihapus');
        redirect(base_url('bahanajar/list'));
    }



}