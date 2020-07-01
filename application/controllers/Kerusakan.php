<?php
defined('BASEPATH') or exit('No direct access script allowed !');

class Kerusakan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kerusakan_model');
    }

    public function index()
    {
        // Data yg dikirim ke halaman view
        $this->pageData = array(
            'title' => 'SP | Kerusakan',
            'menu' => 'MenuKerusakan',
            'assets' => array('datatables','sweetalert2','konfirm'),
            'getData' => $this->Kerusakan_model->getData()
        );

        // File view yang akan ditampilkan
        $this->page = 'kerusakan/index.php';

        // Call function layout dari MY_Controller
        $this->layout();
    }

    public function inputForm()
    {
        $this->pageData = array(
            'title' => 'SP | Tambah data kerusakan',
            'menu' => 'KerusakanInput',
            'assets' => array('sweetalert2','notif'),
        );
        $this->page = 'kerusakan/inputform_v.php';
        $this->layout();
    }

    function inputProses()
    {
        // Get data POST
        $dataInputan = array(
            'kd_kerusakan' => $this->input->post('kd_kerusakan'),
            'kerusakan' => $this->input->post('kerusakan'),
            'penanganan' => $this->input->post('penanganan')
        );
        $saveData = $this->Kerusakan_model->insertDb($dataInputan);

        if ($saveData > 0) {
            $status = 'SucessInsert';
            $msg = 'Berhasil menambahkan data';
        } else {
            $status = 'FailedInsert';
            $msg = 'Gagal menambahkan data !';
        }
        $this->session->set_flashdata('flashStatus', $status);
        $this->session->set_flashdata('flashMsg', $msg);
        redirect('Kerusakan/inputForm');
    }

    public function editForm($id)
    {
        $this->form_validation->set_rules('kd_kerusakan', 'Kode Kerusakan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->pageData = array(
                'title' => 'SP | Edit data kerusakan',
                'menu' => 'MenuKerusakan',
                'assets' => array(),
                'getData' =>  $this->Kerusakan_model->getDataById($id)
            );
            $this->page = 'kerusakan/editform_v.php';
            $this->layout();
        } else {
            $this->Kerusakan_model->editData();

            // ('nama session', 'isinya apa')
            $this->session->set_flashdata('flash', 'Data berhasil diedit');
            redirect('kerusakan');
        }
    }

    public function deleteData()
    {
        /* get id das dari method post ajax */
        $encoded_dasID = $this->input->post('postID');

        /* decode id das */
        $dasID = base64_decode(urldecode($encoded_dasID));

        $delStatus = $this->Kerusakan_model->deleteData($dasID);    
        if($delStatus > 0){
            $flashMsg = 'successDel';
        } else {
            $flashMsg = $delStatus;
        }

        echo $flashMsg;

        // $this->session->set_flashdata('flash', 'Berhasil dihapus');
        // redirect('kerusakan');
    }
}
