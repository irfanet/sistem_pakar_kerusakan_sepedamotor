<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Gejala_model extends CI_Model
{

    var $tabel = "gejala";
    public function __construct()
    {
        parent::__construct();
    }


    /* Get data gejala */
    function getData()
    {
        $getData = $this->db->get($this->tabel);
        return $getData->result();
    }

    /* Insert Gejala */
    function insertDb($post)
    {
        $dataInsert = array(
            'kd_gejala' => $post['kd_gejala'],
            'gejala' => $post['gejala']
        );
        $resultInsert = $this->db->insert($this->tabel, $dataInsert);
        return $resultInsert;
    }

    // get data by id
    public function getDataById($id)
    {
        return $this->db->query("select * from gejala where id='$id'")->result();
    }

    // edit
    public function editData()
    {
        $data = array(
            'kd_gejala' => $this->input->post('kd_gejala', TRUE),
            'gejala' => $this->input->post('gejala', TRUE)
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

    function get_list_by_id($id){
        $sql = "select id,kd_gejala,gejala from gejala where id in (".$id.")";
        return $this->db->query($sql);
    }

    
    function get_by_kelompok(){
        $this->db->select('*');
        $this->db->from('gejala');
        return $this->db->get();
    }
}
