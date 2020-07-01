<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class CF_model extends CI_Model
{

    var $tabel = "cf_aturan";
    public function __construct()
    {
        parent::__construct();
    }


    /* Get data cf_aturan */
    function getData()
    {
        $getData = $this->db->query("select *,cf_aturan.id as id_data from cf_aturan 
        LEFT JOIN gejala ON cf_aturan.id_gejala = gejala.id 
        LEFT JOIN kerusakan ON cf_aturan.id_kerusakan = kerusakan.id");
        
        return $getData->result();
    }

        /* Get data cf_aturan */
    function getKerusakan()
    {
        $getData = $this->db->get('kerusakan');
        return $getData->result();
    }
        /* Get data cf_aturan */
    function getGejala()
    {
        $getData = $this->db->get('gejala');
        return $getData->result();
    }

    /* Insert Gejala */
    function insertDb($post)
    {
        $dataInsert = array(
            'id_gejala' => $post['id_gejala'],
            'id_kerusakan' => $post['id_kerusakan'],
            'md' => $post['md'],
            'mb' => $post['mb'],
        );
        $resultInsert = $this->db->insert($this->tabel, $dataInsert);
        return $resultInsert;
    }

    // get data by id
    public function getDataById($id)
    {
        return $this->db->query("select *,cf_aturan.id as id_data,gejala.id as id_gjl, kerusakan.id as id_krskn FROM cf_aturan INNER JOIN gejala ON cf_aturan.id_gejala = gejala.id 
        INNER JOIN kerusakan ON cf_aturan.id_kerusakan = kerusakan.id
        WHERE cf_aturan.id = '$id'")->result();
    }

    // edit
    public function editData()
    {
        $data = array(
            'id_gejala' => $this->input->post('id_gejala', TRUE),
            'id_kerusakan' => $this->input->post('id_kerusakan', TRUE),
            'md' => $this->input->post('md', TRUE),
            'mb' => $this->input->post('mb', TRUE)
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

    function get_by_gejala($gejala){
        $sql = "select distinct id_kerusakan,p.kd_kerusakan,p.kerusakan,p.penanganan from cf_aturan gp inner join kerusakan p on gp.id_kerusakan=p.id where id_gejala in (".$gejala.") order by id_kerusakan,id_gejala";
        return $this->db->query($sql);
    }

    function get_gejala_by_penyakit($id,$gejala=null){
        $sql = "select cf_aturan.id_gejala,md,mb from cf_aturan where id_kerusakan=".$id;
        if($gejala!=null)
           $sql=$sql." and id_gejala in (".$gejala.")";
       $sql=$sql." order by id_gejala";
        return $this->db->query($sql);
    }
}
