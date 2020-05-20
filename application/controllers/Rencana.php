<?php

class Rencana extends MY_Controller
{

    function dashboard()
    {
        if ($this->session->userdata('status_login') != "login") {
            redirect(base_url());
        }
        $this->data['judul'] = 'Dashboard';
        $username   = $this->session->userdata('username');
        $query = $this->m_crud->manual_query("SELECT COUNT(id) AS jml_matkul, SUM(sks) AS jml_sks FROM rencana_matkul a LEFT JOIN daftar_matkul b ON b.kode = a.kode WHERE a.username = '$username' GROUP BY a.semester");
        $cek_row = $query->num_rows();
        if ($cek_row > 0) :
            $jml = $query->result();
            foreach ($jml as $jum) {
                $jml_matkul[] = $jum->jml_matkul;
                $jml_sks[] = $jum->jml_sks;
                $this->data['jml_matkul'] = json_encode($jml_matkul);
                $this->data['jml_sks'] = json_encode($jml_sks);
            }
        endif;
        $this->load->view('ut/dashboard', $this->data);
    }

    function list()
    {
        $this->data['judul'] = 'Rencana Mata Kuliah';
        $username   = $this->session->userdata('username');
        $this->data['total'] = $this->m_crud->manual_query("SELECT COUNT(id) AS jml_matkul, SUM(sks) AS jml_sks FROM rencana_matkul a LEFT JOIN daftar_matkul b ON b.kode = a.kode WHERE a.username = '$username'")->row();
        $this->data['list_rencana_all'] = $this->m_crud->manual_query("SELECT * FROM rencana_matkul a LEFT JOIN daftar_matkul b ON b.kode = a.kode WHERE a.username = '$username'")->result();
        $this->data['list_rencana'] = $this->m_crud->manual_query("SELECT semester, COUNT(id) AS jml_matkul, SUM(sks) AS jml_sks FROM rencana_matkul a LEFT JOIN daftar_matkul b ON b.kode = a.kode WHERE a.username = '$username' GROUP BY a.semester")->result();
        $this->load->view('ut/rencana', $this->data);
    }

    function add()
    {
        $this->data['judul'] = 'Tambah Rencana Mata Kuliah';
        $this->data['kode_matkul'] = $this->m_crud->list_view("daftar_matkul")->result();
        $this->load->view('ut/rencana_add', $this->data);
    }

    function update($semester)
    {
        $this->data['judul'] = 'Tambah Rencana Mata Kuliah';
        $username   = $this->session->userdata('username');
        $this->data['rencana_matkul_semester'] = $this->m_crud->manual_query("SELECT * FROM rencana_matkul a LEFT JOIN daftar_matkul b ON b.kode = a.kode WHERE a.username = '$username' AND a.semester = '$semester'")->result();
        $this->data['semester'] = $semester;
        $this->data['kode_matkul'] = $this->m_crud->list_view("daftar_matkul")->result();
        $this->load->view('ut/rencana_update', $this->data);
    }

    function aksi_add()
    {
        $kode       = $this->input->post('kode');
        $semester   = $this->input->post('semester');
        $username   = $this->session->userdata('username');
        $data       = array(
            'kode'      => $kode,
            'semester'  => $semester,
            'username'  => $username
        );
        $cek_data = $this->m_crud->cek_row("rencana_matkul", $data)->num_rows();
        if ($cek_data > 0) {
            $this->session->set_flashdata('flash_error', 'sudah ada!');
            redirect(base_url('rencana/update/' . $semester));
        } else {
            $this->m_crud->input("rencana_matkul", $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect(base_url('rencana/update/' . $semester));
        }
    }

    function aksi_hapus($id, $semester)
    {
        $where = array('id' => $id);
        $this->m_crud->hapus("rencana_matkul", $where);
        $this->session->set_flashdata('flash_hapus', 'dihapus');
        redirect(base_url('rencana/update/' . $semester));
    }

    function daftar_matkul_all()
    {
        $this->data['judul'] = 'Daftar Matkul Keseluruhan';
        $this->data['matkul'] = $this->m_crud->list_view("daftar_matkul")->result_array();
        $this->load->view('ut/daftar_matkul_all', $this->data);
    }
}
