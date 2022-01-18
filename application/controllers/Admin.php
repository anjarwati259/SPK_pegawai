<?php

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
		$this->load->model('penilaian_model');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$total_pegawai = $this->admin_model->count_pegawai()->total;
		$total_kriteria = $this->admin_model->count_kriteria()->total;
		$data = array('title' => 'Dashboard Admin',
						'total_pegawai' => $total_pegawai,
						'total_kriteria' => $total_kriteria,
                        'isi' => 'admin/dashboard' );
        $this->load->view('admin/layout/wrapper',$data, FALSE);
	}
	public function pegawai()
	{
		$pegawai = $this->admin_model->Listpegawai();
		$data = array('title' => 'Data Pegawai',
						'pegawai' => $pegawai,
                        'isi' => 'admin/data_pegawai' );
        $this->load->view('admin/layout/wrapper',$data, FALSE);
	}
	public function add_pegawai()
	{
		$this->form_validation->set_rules('nip', 'nip', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
		$this->form_validation->set_rules('tgl_masuk', 'tgl_masuk', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		$this->form_validation->set_rules('golongan', 'golongan', 'required');
		$this->form_validation->set_rules('status_pegawai', 'status_pegawai', 'required');

		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$gender = $this->input->post('gender');
		$pendidikan = $this->input->post('pendidikan');
		$golongan = $this->input->post('golongan');
		$status_pegawai = $this->input->post('status_pegawai');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$data = array('nip' => $nip,
							'nama' => $nama,
							'alamat' => $alamat,
							'ttl' => $tgl_lahir,
							'tmk' => $tgl_masuk,
							'gender' => $gender,
							'pendidikan' => $pendidikan,
							'golongan' => $golongan,
							'status_pegawai' => $status_pegawai,
							'status'	=> 1,
			 );

			$this->admin_model->add_pegawai($data);
			echo json_encode('sukses');
		}
	}
	public function edit_pegawai(){
		$this->form_validation->set_rules('nip', 'nip', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
		$this->form_validation->set_rules('tgl_masuk', 'tgl_masuk', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
		$this->form_validation->set_rules('golongan', 'golongan', 'required');
		$this->form_validation->set_rules('status_pegawai', 'status_pegawai', 'required');

		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$gender = $this->input->post('gender');
		$pendidikan = $this->input->post('pendidikan');
		$golongan = $this->input->post('golongan');
		$status_pegawai = $this->input->post('status_pegawai');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$data = array('nip' => $nip,
							'nama' => $nama,
							'alamat' => $alamat,
							'ttl' => $tgl_lahir,
							'tmk' => $tgl_masuk,
							'gender' => $gender,
							'pendidikan' => $pendidikan,
							'golongan' => $golongan,
							'status_pegawai' => $status_pegawai,
							'status'	=> 1,
			 );

			$this->admin_model->edit_pegawai($data);
			echo json_encode('sukses');
		}
	}
	public function del_pegawai($nip){
		$data_id = $this->admin_model->get_nip($nip);
		//$nip2 = $data_id->nip;
		$data = array('nip' => $nip);
		if($data_id){
			$this->admin_model->del_penilaian($nip);
		}else{
			$this->admin_model->del_pegawai($nip);
		}
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pegawai'), 'refresh');
	}

	//Kriteria
	public function kriteria()
	{
		$kriteria = $this->admin_model->kriteria();
		$data = array('title' => 'Data Kriteria',
						'kriteria' => $kriteria,
                        'isi' => 'admin/data_kriteria' );
        $this->load->view('admin/layout/wrapper',$data, FALSE);
	}
	public function add_kriteria(){
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$data = array('nama_kriteria' => $nama,
							'keterangan' => $keterangan,
			 );

			$this->admin_model->add_kriteria($data);
			echo json_encode('sukses');
		}
	}

	public function edit_kriteria(){
		$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

		$nama = $this->input->post('nama');
		$id_kriteria = $this->input->post('id_kriteria');
		$keterangan = $this->input->post('keterangan');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$data = array('nama_kriteria' => $nama,
							'id_kriteria' => $id_kriteria,
							'keterangan' => $keterangan,
			 );

			$this->admin_model->edit_kriteria($data);
			echo json_encode('sukses');
		}
	}
	public function del_kriteria($id){
		$data_id = $this->admin_model->get_kriteria($id);
		print_r($data_id);
		if($data_id){
			$this->admin_model->del_kriteriaid($id);
		}else{
			$this->admin_model->del_kriteria($id);
		}
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kriteria'), 'refresh');
	}

	// nilai Kriteria
	public function nilai_kriteria()
	{
		$nilai_kriteria = $this->admin_model->nilai_kriteria();
		$kriteria = $this->admin_model->kriteria();
		$data = array('title' => 'Data Nilai Kriteria',
						'nilai_kriteria' => $nilai_kriteria,
						'kriteria'	=> $kriteria,
                        'isi' => 'admin/data_nilai_kriteria' );
        $this->load->view('admin/layout/wrapper',$data, FALSE);
	}
	public function add_nilai_kriteria(){
		$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'required');
		$this->form_validation->set_rules('nilai', 'nilai', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

		$id_kriteria = $this->input->post('id_kriteria');
		$nilai = $this->input->post('nilai');
		$keterangan = $this->input->post('keterangan');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$data = array('id_kriteria' => $id_kriteria,
							'nilai'		=> $nilai,
							'keterangan' => $keterangan,
			 );

			$this->admin_model->add_nilai_kriteria($data);
			echo json_encode('sukses');
		}
	}
	public function edit_nilai_kriteria(){
		$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'required');
		$this->form_validation->set_rules('id_nilai_kriteria', 'id_nilai_kriteria', 'required');
		$this->form_validation->set_rules('nilai', 'nilai', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

		$id_kriteria = $this->input->post('id_kriteria');
		$id_nilai_kriteria = $this->input->post('id_nilai_kriteria');
		$nilai = $this->input->post('nilai');
		$keterangan = $this->input->post('keterangan');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$data = array('id_kriteria' => $id_kriteria,
							'id_nilai_kriteria' => $id_nilai_kriteria,
							'nilai'		=> $nilai,
							'keterangan' => $keterangan,
			 );

			$this->admin_model->edit_nilai_kriteria($data);
			echo json_encode('sukses');
		}
	}
	public function del_nilai_kriteria($id){
		$this->admin_model->del_nilai_kriteria($id);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kriteria'), 'refresh');
	}

	// bobot
	public function bobot()
	{
		$bobot = $this->admin_model->bobot();
		$kriteria = $this->admin_model->kriteria();
		$data = array('title' => 'Data Bobot',
						'bobot' => $bobot,
						'kriteria'	=> $kriteria,
                        'isi' => 'admin/data_bobot' );
        $this->load->view('admin/layout/wrapper',$data, FALSE);
	}
	public function add_bobot(){
		$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'required');
		$this->form_validation->set_rules('bobot', 'bobot', 'required');

		$id_kriteria = $this->input->post('id_kriteria');
		$bobot = $this->input->post('bobot');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$data = array('id_kriteria' => $id_kriteria,
							'bobot'		=> $bobot,
			 );

			$this->admin_model->add_bobot($data);
			echo json_encode('sukses');
		}
	}
	public function edit_bobot(){
		$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'required');
		$this->form_validation->set_rules('id_bobot', 'id_bobot', 'required');
		$this->form_validation->set_rules('bobot', 'bobot', 'required');

		$id_kriteria = $this->input->post('id_kriteria');
		$id_bobot = $this->input->post('id_bobot');
		$bobot = $this->input->post('bobot');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode('error');
		}else{
			$data = array('id_kriteria' => $id_kriteria,
							'id_bobot' => $id_bobot,
							'bobot'		=> $bobot,
			 );

			$this->admin_model->edit_bobot($data);
			echo json_encode('sukses');
		}
	}
	public function del_bobot($id){
		$this->admin_model->del_bobot($id);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/bobot'), 'refresh');
	}
}