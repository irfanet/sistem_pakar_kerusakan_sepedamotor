<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Kerusakan_model extends CI_Model
{

    var $tabel = "kerusakan";
    public function __construct()
    {
        parent::__construct();
    }


    /* Get data kerusakan */
    function getData()
    {
        $getData = $this->db->get($this->tabel);
        return $getData->result();
    }

    /* Insert Gejala */
    function insertDb($post)
    {
        $dataInsert = array(
            'kd_kerusakan' => $post['kd_kerusakan'],
            'kerusakan' => $post['kerusakan'],
            'penanganan' => $post['penanganan']
        );
        $resultInsert = $this->db->insert($this->tabel, $dataInsert);
        return $resultInsert;
    }

    // get data by id
    public function getDataById($id)
    {
        return $this->db->query("select * from kerusakan where id='$id'")->result();
    }

    // edit
    public function editData()
    {
        $data = array(
            'kd_kerusakan' => $this->input->post('kd_kerusakan', TRUE),
            'kerusakan' => $this->input->post('kerusakan', TRUE),
            'penanganan' => $this->input->post('penanganan', TRUE)
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
    }

    //hapus
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $resultQry = $this->db->delete($this->tabel);
        return $resultQry;
    }
}
