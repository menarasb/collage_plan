<?php

class M_crud extends CI_Model
{
    function list_view($table)
    {
        return $this->db->get($table);
    }
    function cek_row($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    function manual_query($query)
    {
        return $this->db->query($query);
    }
    function input($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    function hapus($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function edit($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function data_user()
    {
        $username   = $this->session->userdata('username');
        return $this->manual_query("SELECT a.*, b.level FROM user a LEFT JOIN user_grup b ON b.id = a.level_id WHERE a.username = '$username'")->row();  
    }
    
}
