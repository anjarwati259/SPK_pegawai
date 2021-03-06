<?php 
/**
 * 
 */
class Penilaian_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function listKriteria(){
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->order_by('id_kriteria','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function count_kriteria(){
		$this->db->select('count(*) as total');
		$this->db->from('kriteria');
		$query = $this->db->get();
		return $query->row();
	}
	public function kriteria($limit,$offset){
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->order_by('id_kriteria','asc');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}
	public function insert_penilaian($data){
		$this->db->insert_batch('penilaian', $data);
	}
	public function cek_pegawai($nip){
		$this->db->select('*');
		$this->db->from('penilaian');
		$this->db->where('nip',$nip);
		$query = $this->db->get();
		return $query->row();
	}
	public function edit_penilaian($data){
		foreach ($data as $key => $value) {
			$set = array('id_nilai_kriteria' => $value['id_nilai_kriteria'], 
						'tanggal' => $value['tanggal']);
			$this->db->where('nip', $value['nip']);
			$this->db->where('id_kriteria', $value['id_kriteria']);
			$this->db->update('penilaian',$set);
		}
	}
	public function cek_hasil($nip){
		$this->db->select('*');
		$this->db->from('hasil');
		$this->db->where('nip',$nip);
		$query = $this->db->get();
		return $query->row();
	}
	public function insert_hasil($data){
		$this->db->insert('hasil', $data);
	}
	public function update_hasil($data){
		$this->db->where('nip', $data['nip']);
		$this->db->update('hasil',$data);
	}
	public function get_hasil(){
		$this->db->select('MAX(hasil) as hasil_max');
		$this->db->from('hasil');
		$query = $this->db->get();
		return $query->row();
	}
}