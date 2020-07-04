<?php
defined('BASEPATH') or exit('No direct access script allowed !');

class User extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        // Data yg dikirim ke halaman view
        $this->pageData = array(
            'title' => 'SP | User',
            'menu' => 'MenuUser',
            'assets' => array('datatables','sweetalert2','konfirm'),
            'getData' => $this->User_model->getData()
        );

        // File view yang akan ditampilkan
        $this->page = 'user/index.php';

        // Call function layout dari MY_Controller
        $this->layout();
    }

    public function inputForm()
    {
        $this->pageData = array(
            'title' => 'SP | Tambah data user',
            'menu' => 'UserInput',
            'assets' => array('sweetalert2','notif'),
        );
        $this->page = 'user/inputform_v.php';
        $this->layout();
    }

    function inputProses()
    {
        // Get data POST
        $dataInputan = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' =>  password_hash($this->input->post('password'),PASSWORD_DEFAULT)
        );
        $saveData = $this->User_model->insertDb($dataInputan);

        if ($saveData > 0) {
            $status = 'SucessInsert';
            $msg = 'Berhasil menambahkan data';
        } else {
            $status = 'FailedInsert';
            $msg = 'Gagal menambahkan data !';
        }
        $this->session->set_flashdata('flashStatus', $status);
        $this->session->set_flashdata('flashMsg', $msg);
        redirect('User/inputForm');
    }

    public function editForm($id)
    {
        $this->form_validation->set_rules('nama', 'Kode User', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->pageData = array(
                'title' => 'SP | Edit data user',
                'menu' => 'MenuUser',
                'assets' => array(),
                'getData' =>  $this->User_model->getDataById($id)
            );
            $this->page = 'user/editform_v.php';
            $this->layout();
        } else {
            $this->User_model->editData();

            // ('nama session', 'isinya apa')
            $this->session->set_flashdata('flash', 'Data berhasil diedit');
            redirect('user');
        }
    }

    public function deleteData()
    {
        /* get id das dari method post ajax */
        $encoded_dasID = $this->input->post('postID');

        /* decode id das */
        $dasID = base64_decode(urldecode($encoded_dasID));

        $delStatus = $this->User_model->deleteData($dasID);    
        if($delStatus > 0){
            $flashMsg = 'successDel';
        } else {
            $flashMsg = $delStatus;
        }

        echo $flashMsg;

        // $this->session->set_flashdata('flash', 'Berhasil dihapus');
        // redirect('username');
    }
}
