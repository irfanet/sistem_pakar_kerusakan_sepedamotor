<?php
defined('BASEPATH') or exit('No direct access script allowed !');

class Homepage extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Homepage_model');
        $this->load->model('CF_model');
        $this->load->model('Gejala_model');
        $this->load->model('Kerusakan_model');
    }

    public function index()
    {
        // $this->load->view('homepage/index.php');

        if (!$this->input->post('gejala')) {
			$data['contentuser'] = 'user/diagnosa'; //nama file yang akan jadi kontent di template
            // $data['listKelompok'] = $this->Kelompok_model->get_list_data();
            $this->load->view('layout/home_head');
            $this->load->view('homepage/index', $data);
            $this->load->view('layout/home_foot');

		}else{
            // $data["contentuser"]="homepage/hasil_diagnosa";
          
			$gejala = implode(",", $this->input->post("gejala"));
			$data["listGejala"] = $this->Gejala_model->get_list_by_id($gejala);
			//hitung
			$listPenyakit = $this->CF_model->get_by_gejala($gejala);
			$penyakit = array();
			$i=0;
			foreach($listPenyakit->result() as $value){
				$listGejala = $this->CF_model->get_gejala_by_penyakit($value->id_kerusakan,$gejala);
				$combineCFmb=0;
				$combineCFmd=0;
				$CFBefore=0;
				$j=0;
				foreach($listGejala->result() as $value2){
					$j++;
					if($j==3){ 
						$combineCFmb=$value2->mb;
						$combineCFmd=$value2->md;}
					else
					$combineCFmb =$combineCFmb + ($value2->mb * (1 - $combineCFmb));
					$combineCFmd =$combineCFmd + ($value2->md * (1 - $combineCFmd));

					$combinehasil = $combineCFmb-$combineCFmd; 
				}
				if($combinehasil)
				{
					$penyakit[$i]=array('kode'=>$value->kd_kerusakan,
										'nama'=>$value->kerusakan,
										'kepercayaan'=>$combinehasil*-100,
										'keterangan'=>$value->penanganan);
										// 'user_id' =>$user_login);
					// $this->db->insert('hasil_diagnosa', $penyakit[$i]);
					$i++;
				}

				
 
			}

			//insert ke tabel history
			$insert_data = array();
			foreach ($this->input->post("gejala") as $g) {
				$insert_data[] = array(
								// 'user_id' => $user_login,
								'gejala_id' => $g
							);
			}
			$this->db->insert_batch('riwayat', $insert_data);

			function cmp($a, $b)
			{
				return ($a["kepercayaan"] > $b["kepercayaan"]) ? -1 : 1;
			}
			usort($penyakit, "cmp");
			$data["listPenyakit"] = $penyakit;
			$data_hasil = array(
				'kode' =>$penyakit[0]['kode'],
				'nama' =>$penyakit[0]['nama'],
				'kepercayaan' =>$penyakit[0]['kepercayaan'],
				'keterangan' =>$penyakit[0]['keterangan'],
				// 'user_id' =>$penyakit[0]['user_id'],
			);
            $this->db->insert('riwayat_diagnosa', $data_hasil);
            // if($data_hasil != 0){
            //     redirect('Homepage/hasilDiagnosa');
            // }else{
            //     redirect('Homepage');
            // }

            // $this->load->view('homepage/index', $data);
            $this->load->view('layout/home_head');
            $this->load->view('homepage/hasil_diagnosa', $data);
            $this->load->view('layout/home_foot');
		}
	

    }
    public function hasilDiagnosa()
    {
        $this->load->view('homepage/hasil_diagnosa');
    }

    public function inputForm()
    {
        $this->pageData = array(
            'title' => 'SP | Tambah data gejala',
            'menu' => 'UserInput',
            'assets' => array('sweetalert2'),
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
        $saveData = $this->Homepage_model->insertDb($dataInputan);

        if ($saveData > 0) {
            $status = 'SucessInsert';
            $msg = 'Berhasil menambahkan data';
        } else {
            $status = 'FailedInsert';
            $msg = 'Gagal menambahkan data !';
        }
        $this->session->set_flashdata('flashStatus', $status);
        $this->session->set_flashdata('flashMsg', $msg);
        redirect('User');
    }

    public function editForm($id)
    {
        $this->form_validation->set_rules('kd_gejala', 'Kode User', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->pageData = array(
                'title' => 'SP | Edit data gejala',
                'menu' => 'MenuUser',
                'assets' => array(),
                'getData' =>  $this->Homepage_model->getDataById($id)
            );
            $this->page = 'gejala/editform_v.php';
            $this->layout();
        } else {
            $this->Homepage_model->editData();

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

        $delStatus = $this->Homepage_model->deleteData($dasID);    
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
