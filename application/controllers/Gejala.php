<?php
defined('BASEPATH') or exit('No direct access script allowed !');

class Gejala extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gejala_model');
    }

    public function index()
    {
        // Data yg dikirim ke halaman view
        $this->pageData = array(
            'title' => 'SP | Gejala',
            'menu' => 'MenuGejala',
            'assets' => array('datatables','sweetalert2','konfirm'),
            'getData' => $this->Gejala_model->getData()
        );

        // File view yang akan ditampilkan
        $this->page = 'gejala/index.php';

        // Call function layout dari MY_Controller
        $this->layout();
    }

    public function inputForm()
    {
        $this->pageData = array(
            'title' => 'SP | Tambah data gejala',
            'menu' => 'GejalaInput',
            'assets' => array('sweetalert2','notif'),
        );
        $this->page = 'gejala/inputform_v.php';
        $this->layout();
    }

    function inputProses()
    {
        // Get data POST
        $dataInputan = array(
            'kd_gejala' => $this->input->post('kd_gejala'),
            'gejala' => $this->input->post('gejala'),
            'cf_aturan' => $this->input->post('cf_aturan')
        );
        $saveData = $this->Gejala_model->insertDb($dataInputan);

        if ($saveData > 0) {
            $status = 'SucessInsert';
            $msg = 'Berhasil menambahkan data';
        } else {
            $status = 'FailedInsert';
            $msg = 'Gagal menambahkan data !';
        }
        $this->session->set_flashdata('flashStatus', $status);
        $this->session->set_flashdata('flashMsg', $msg);
        redirect('Gejala/inputForm');
    }

    public function editForm($id)
    {
        $this->form_validation->set_rules('kd_gejala', 'Kode Gejala', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->pageData = array(
                'title' => 'SP | Edit data gejala',
                'menu' => 'MenuGejala',
                'assets' => array(),
                'getData' =>  $this->Gejala_model->getDataById($id)
            );
            $this->page = 'gejala/editform_v.php';
            $this->layout();
        } else {
            $this->Gejala_model->editData();

            // ('nama session', 'isinya apa')
            $this->session->set_flashdata('flash', 'Data berhasil diedit');
            redirect('gejala');
        }
    }

    public function deleteData()
    {
        /* get id das dari method post ajax */
        $encoded_dasID = $this->input->post('postID');

        /* decode id das */
        $dasID = base64_decode(urldecode($encoded_dasID));

        $delStatus = $this->Gejala_model->deleteData($dasID);    
        if($delStatus > 0){
            $flashMsg = 'successDel';
        } else {
            $flashMsg = $delStatus;
        }

        echo $flashMsg;

        // $this->session->set_flashdata('flash', 'Berhasil dihapus');
        // redirect('gejala');
    }
}
