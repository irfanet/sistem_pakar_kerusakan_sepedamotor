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

        if (!$this->input->post('gejala')) {
            $this->load->view('layout/home_head');
            $this->load->view('homepage/index');
            $this->load->view('layout/home_foot');
		}else{
			$gejala = implode(",", $this->input->post("gejala"));
			$data["listGejala"] = $this->Gejala_model->getGejalaById($gejala);
			//hitung cf aturan 
			$listKerusakan = $this->CF_model->getKerusakanByGejala($gejala);
			$kerusakan = array();
			$i=0;
			foreach($listKerusakan->result() as $value){
				$listGejala = $this->CF_model->getGejalaByKerusakan($value->id_kerusakan,$gejala);
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
					$kerusakan[$i]=array('kode'=>$value->kd_kerusakan,
										'kerusakan'=>$value->kerusakan,
										'kepercayaan'=>$combinehasil*-100,
										'penanganan'=>$value->penanganan);
					$i++;
				}
			}

			//insert ke tabel history
			$insert_data = array();
			foreach ($this->input->post("gejala") as $g) {
				$insert_data[] = array(
								'gejala_id' => $g
							);
			}
			$this->db->insert_batch('riwayat', $insert_data);

			function cmp($a, $b)
			{
				return ($a["kepercayaan"] > $b["kepercayaan"]) ? -1 : 1;
			}
			usort($kerusakan, "cmp");
			$data["listKerusakan"] = $kerusakan;
			$data_hasil = array(
				'kode' =>$kerusakan[0]['kode'],
				'kerusakan' =>$kerusakan[0]['kerusakan'],
				'kepercayaan' =>$kerusakan[0]['kepercayaan'],
				'penanganan' =>$kerusakan[0]['penanganan'],
			);
            $this->db->insert('riwayat_diagnosa', $data_hasil);

            $this->load->view('layout/home_head');
            $this->load->view('homepage/hasil_diagnosa', $data);
            $this->load->view('layout/home_foot');
		}
    }

    public function login()
    {
		// if($this->session->userdata('id_user') == TRUE){
		// 	redirect('gejala');
		// }
        $this->form_validation->set_rules('username','Username','trim|required|strip_tags');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run()==FALSE){
			$this->load->view('homepage/login');
		}else{
			// validasinya success
			$this->_login();
		}
    }
    public function _login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$admin = $this->db->get_where('user', ['username' => $username])->row_array();
		if($admin){
			if($admin['is_active']==1){
				if(password_verify($password, $admin['password'])){
					$data= [
                        'id_user' => $admin['id_user'],
                        'nama' => $admin['nama'],
						'username' => $admin['username'],
						'level' => $admin['level'],
						'status' => 'admin'
					]; 
					$this->session->set_userdata($data);
                    redirect('gejala');	
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					Login failed! Wrong password.</div>');
					redirect('homepage/login');
				}
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			This Account has not been activited</div>');
				redirect('homepage/login');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			Account is not registered</div>');
			redirect('homepage/login');
		}
    }
    public function logout(){

        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('status');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			  You have been logout</div>');
			redirect('homepage/login');
	}
}
