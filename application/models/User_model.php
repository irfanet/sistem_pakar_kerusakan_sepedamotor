<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class User_model extends CI_Model
{

    var $tabel = "user";
    public function __construct()
    {
        parent::__construct();
    }


    /* Get data user */
    function getData()
    {
        $getData = $this->db->get($this->tabel);
        return $getData->result();
    }

    /* Insert Gejala */
    function insertDb($post)
    {
        $dataInsert = array(
            'nama' => $post['nama'],
            'username' => $post['username'],
            'password' => password_hash($post['password'],PASSWORD_DEFAULT)
        );
        $resultInsert = $this->db->insert($this->tabel, $dataInsert);
        return $resultInsert;
    }

    // get data by id
    public function getDataById($id)
    {
        return $this->db->query("select * from user where id_user='$id'")->result();
    }

    // edit
    public function editData()
    {
        $data = array(
            'nama' => $this->input->post('nama', TRUE),
            'username' => $this->input->post('username', TRUE),
            'password' => password_hash($this->input->post('password', TRUE),PASSWORD_DEFAULT)
        );
        $this->db->where('id_user', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
    }

    //hapus
    public function deleteData($id)
    {
        $this->db->where('id_user', $id);
        $resultQry = $this->db->delete($this->tabel);
        return $resultQry;
    }
}
