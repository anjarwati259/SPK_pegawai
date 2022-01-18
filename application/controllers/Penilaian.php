<?php

class Penilaian extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
		$this->load->model('penilaian_model');
		$this->load->model('admin_model');
	}
	public function index()
	{
		
		//print_r($data);
		$total = $this->penilaian_model->count_kriteria()->total;
		if($total%2==0){
			$jml_limit = $total/2;
		}else{
			$jml_limit = ($total+1)/2;
		}

		$kriteria = $this->penilaian_model->listKriteria();
		$kriteria_1 = $this->penilaian_model->kriteria($jml_limit,0);
		$kriteria_2 = $this->penilaian_model->kriteria($jml_limit,$jml_limit);
		$pegawai = $this->admin_model->pegawai();

		$data = array('title' => 'Penilaian Pegawai',
						'kriteria_1' => $kriteria_1,
						'kriteria_2' => $kriteria_2,
						'kriteria'	=> $kriteria,
						'pegawai'	=> $pegawai,
                        'isi' => 'admin/form_penilaian' );
        $this->load->view('admin/layout/wrapper',$data, FALSE);
	}
	public function detail_pegawai(){
		$penguji = $this->session->userdata('nama');
		$nip = $this->input->post('nip');
		$pegawai = $this->admin_model->get_pegawai_id($nip);
		$data = array('nama_pegawai' => $pegawai->nama,
						'nip_pegawai' => $pegawai->nip,
						'nama_penguji' => $penguji
						 );
		 echo json_encode($data);
	}
	public function proses(){
		$kriteria = $this->penilaian_model->listKriteria();
		$nip = $this->input->post('0[nip]');
		$index = 0;
		$data2 =[];
		foreach ($kriteria as $key => $value) {
			$kriteria = $index.'['.$value->nama_kriteria.']';
			$data2[] = array( 	'id_nilai_kriteria' => $this->input->post($kriteria),
								'id_kriteria'		=> $value->id_kriteria,
								'nip'				=> $nip,
								'tanggal'			=> date('Y-m-d')
			 );
			$index++;
		}
		$this->penilaian_model->insert_penilaian($data2);
		echo json_encode('sukses');
	}
	public function edit(){
		$kriteria = $this->penilaian_model->listKriteria();
		$nip = $this->input->post('0[nip]');
		$index = 0;
		$data2 =[];
		foreach ($kriteria as $key => $value) {
			$kriteria = $index.'['.$value->nama_kriteria.']';
			$data2[] = array( 	'id_nilai_kriteria' => $this->input->post($kriteria),
								'id_kriteria'		=> $value->id_kriteria,
								'nip'				=> $nip,
								'tanggal'			=> date('Y-m-d')
			 );
			$index++;
		}
		 $this->penilaian_model->edit_penilaian($data2);
		echo json_encode('sukses');
	}
	public function hasil(){
		$kriteria = $this->penilaian_model->listKriteria();
		$pegawai = $this->admin_model->pegawai();
		$get_hasil = $this->penilaian_model->get_hasil();
		$data = array('title' => 'Hasil Penilaian',
						'kriteria' => $kriteria,
						'pegawai'	=> $pegawai,
						'max_hasil'		=> $get_hasil,
						'total'	=> $this->penilaian_model->count_kriteria()->total,
                        'isi' => 'admin/hasil_penilaian' );
        $this->load->view('admin/layout/wrapper',$data, FALSE);
        // print_r($get_hasil);
	}
	public function cek_pegawai(){
		$nip = $this->input->post('nip');

		$pegawai = $this->penilaian_model->cek_pegawai($nip);
		if($pegawai){
			echo json_encode('true');
		}else{
			echo json_encode('false');
		}
		
	}
}