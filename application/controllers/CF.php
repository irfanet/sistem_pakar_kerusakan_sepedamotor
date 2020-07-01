<?php
defined('BASEPATH') or exit('No direct access script allowed !');

class CF extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CF_model');
    }

    public function index()
    {
        // Data yg dikirim ke halaman view
        $this->pageData = array(
            'title' => 'SP | CF',
            'menu' => 'MenuCF',
            'assets' => array('datatables','sweetalert2','konfirm'),
            'getData' => $this->CF_model->getData()
        );

        // File view yang akan ditampilkan
        $this->page = 'CF/index.php';

        // Call function layout dari MY_Controller
        $this->layout();
    }

    public function inputForm()
    {
        $this->pageData = array(
            'title' => 'SP | Tambah data cf fakta',
            'menu' => 'CF',
            'assets' => array('sweetalert2','notif'),
            'getKerusakan' => $this->CF_model->getKerusakan(),
            'getGejala' => $this->CF_model->getGejala()
        );
        $this->page = 'CF/inputform_v.php';
        $this->layout();
    }

    function inputProses()
    {
        // Get data POST
        $dataInputan = array(
            'id_gejala' => $this->input->post('id_gejala'),
            'id_kerusakan' => $this->input->post('id_kerusakan'),
            'md' => $this->input->post('md'),
            'mb' => $this->input->post('mb')
            
        );
        $saveData = $this->CF_model->insertDb($dataInputan);

        if ($saveData > 0) {
            $status = 'SucessInsert';
            $msg = 'Berhasil menambahkan data';
        } else {
            $status = 'FailedInsert';
            $msg = 'Gagal menambahkan data !';
        }
        $this->session->set_flashdata('flashStatus', $status);
        $this->session->set_flashdata('flashMsg', $msg);
        redirect('CF/inputForm');
    }

    public function editForm($id)
    {
        $this->form_validation->set_rules('id_kerusakan', 'ID Kerusakan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->pageData = array(
                'title' => 'SP | Edit data cf fakta',
                'menu' => 'MenuCF',
                'assets' => array(),
                'getData' =>  $this->CF_model->getDataById($id),
                'getKerusakan' => $this->CF_model->getKerusakan(),
                'getGejala' => $this->CF_model->getGejala()
            );
            $this->page = 'CF/editform_v.php';
            $this->layout();
        } else {
            $this->CF_model->editData();

            // ('nama session', 'isinya apa')
            $this->session->set_flashdata('flash', 'Data berhasil diedit');
            redirect('CF');
        }
    }

    public function deleteData()
    {
        /* get id das dari method post ajax */
        $encoded_dasID = $this->input->post('postID');

        /* decode id das */
        $dasID = base64_decode(urldecode($encoded_dasID));

        $delStatus = $this->CF_model->deleteData($dasID);    
        if($delStatus > 0){
            $flashMsg = 'successDel';
        } else {
            $flashMsg = $delStatus;
        }

        echo $flashMsg;

        // $this->session->set_flashdata('flash', 'Berhasil dihapus');
        // redirect('CF');
    }
}
