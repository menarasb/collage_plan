<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends MY_Controller
{

    //Controller view admin
    function index()
    {
        $this->data['judul'] = 'Dashboard Admin';
        $this->data['jml_user'] = $this->m_crud->manual_query("SELECT count(id) AS jml_user FROM user")->row();
        $this->data['jml_matkul'] = $this->m_crud->manual_query("SELECT count(kode) AS jml_matkul FROM daftar_matkul")->row();
        $this->load->view('ut/admin/index', $this->data);
    }

    function setting_app()
    {
        $this->data['judul'] = 'Setting Aplikasi';
        $this->load->view('ut/admin/setting_app', $this->data);
    }

    function data_user()
    {
        $this->data['judul'] = 'Data User';
        $this->data['data_user'] = $this->m_crud->manual_query("SELECT a.*,b.level FROM user a LEFT JOIN user_grup b on b.id = a.level_id")->result();
        $this->data['user_level'] = $this->m_crud->list_view("user_grup")->result();
        $this->load->view('ut/admin/data_user', $this->data);
    }

    function matakuliah()
    {
        $this->data['judul'] = 'DB Matakuliah';
        $this->data['daftar_matkul'] = $this->m_crud->list_view("daftar_matkul")->result();
        $this->load->view('ut/admin/matakuliah', $this->data);
    }

    function session_log()
    {
        $this->data['judul'] = 'Session Log History';
        $this->data['session_log'] = $this->m_crud->manual_query("SELECT * FROM session_log a LEFT join user b on b.username=a.username ORDER BY login_time DESC")->result();
        $this->load->view('ut/admin/session_log', $this->data);
    }

    function home_content()
    {
        $this->data['judul'] = 'Home Content';
        $this->data['content'] = $this->m_crud->manual_query("SELECT * FROM home_content WHERE id ='1'")->row();
        $this->load->view('ut/admin/home_content', $this->data);
    }

    //controller aksi admin

    function update_setting()
    {
        $main_title = $this->input->post('main_title');
        $old_file   = $this->input->post('old_file');
        $where      = array('id' => 1);

        $config['upload_path']          = './assets/img';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')) {
            $file_name = $old_file;
        } else {
            $file_name = $this->upload->data('file_name');
            unlink('./assets/img/' . $old_file);
        }
        $data = array(
            'main_title' => $main_title,
            'logo' => $file_name
        );

        $this->m_crud->edit("settings", $data, $where); //edit
        $this->session->set_flashdata('flash', 'diupdate');
        redirect(base_url('admin/setting_app'));
    }

    function add_user()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'prodi' => $this->input->post('prodi'),
            'level_id' => $this->input->post('level_id')
        );
        $where = array('username' => $this->input->post('username'));
        if ($this->m_crud->cek_row("user", $where)->num_rows() > 0) {
            $this->session->set_flashdata('flash_gagal', 'added');
        } else {
            $this->session->set_flashdata('flash', 'added');
            $this->m_crud->input("user", $data);
        }
        redirect(base_url('admin/data_user'));
    }

    function del_user($id)
    {
        $id_login = $this->session->userdata('id');
        if($id != $id_login):
            $where = array('id' => $id);
            $this->m_crud->hapus("user", $where);
            $this->session->set_flashdata('flash_del', 'delete');
        else :
            $this->session->set_flashdata('flash_gagal_del', 'delete');
        endif;
        redirect(base_url('admin/data_user'));
    }

    function edit_user()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'prodi' => $this->input->post('prodi'),
            'level_id' => $this->input->post('level_id')
        );
        $where = array(
            'id' => $this->input->post('id')
        );
        $this->m_crud->edit("user", $data, $where);
        $this->session->set_flashdata('flash_edit', 'edited');
        redirect(base_url('admin/data_user'));
    }

    public function export_matkul()
    {
        $daftar_matkul = $this->m_crud->list_view("daftar_matkul")->result();

        $spreadsheet = new Spreadsheet;

        $styleArray = [
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArray);

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Kode')
            ->setCellValue('B1', 'Nama Mata Kuliah')
            ->setCellValue('C1', 'Jumlah SKS')
            ->setCellValue('D1', 'Waktu Ujian');

        $kolom = 2;
        foreach ($daftar_matkul as $dm) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $dm->kode)
                ->setCellValue('B' . $kolom, $dm->matkul)
                ->setCellValue('C' . $kolom, $dm->sks)
                ->setCellValue('D' . $kolom, $dm->waktu);

            $kolom++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="DB_Matakuliah.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    function update_home_content()
    {
        $data = array('content' => $this->input->post('post'));
        $where = array('id' => $this->input->post('id'));
        $this->session->set_flashdata('flash', 'edited');
        $this->m_crud->edit("home_content", $data, $where);
        redirect(base_url('admin/home_content'));
    }
}
