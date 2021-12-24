<?php 
/**
 * 
 */
class Admin_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function count_pegawai(){
		$this->db->select('count(*) as total');
		$this->db->from('pegawai');
		$query = $this->db->get();
		return $query->row();
	}
	public function count_kriteria(){
		$this->db->select('count(*) as total');
		$this->db->from('kriteria');
		$query = $this->db->get();
		return $query->row();
	}
	public function pegawai(){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('status',1);
		$this->db->order_by('nama','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function Listpegawai(){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->order_by('nama','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_pegawai_id($nip){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('nip',$nip);
		$this->db->order_by('nama','asc');
		$query = $this->db->get();
		return $query->row();
	}
	public function add_pegawai($data){
		$this->db->insert('pegawai', $data);
	}

	public function edit_pegawai($data){
		$this->db->where('nip', $data['nip']);
		$this->db->update('pegawai',$data);
	}
	public function get_nip($nip){
		$this->db->select('*');
		$this->db->from('penilaian');
		$this->db->where('nip',$nip);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	public function del_pegawai($nip){
		$this->db->where('nip', $nip);
		$this->db->delete('pegawai');
	}
	public function del_penilaian($nip){
		$this->db->delete('penilaian', array('nip' => $nip));
		$this->db->delete('pegawai', array('nip' => $nip));
	}
	// kriteria
	public function kriteria(){
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->order_by('id_kriteria','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function add_kriteria($data){
		$this->db->insert('kriteria', $data);
	}
	public function edit_kriteria($data){
		$this->db->where('id_kriteria', $data['id_kriteria']);
		$this->db->update('kriteria',$data);
	}
	public function get_kriteria($id){
		$this->db->select('*');
		$this->db->from('nilai_kriteria');
		$this->db->where('id_kriteria',$id);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
	public function del_kriteriaid($id){
		$this->db->delete('nilai_kriteria', array('id_kriteria' => $id));
		$this->db->delete('kriteria', array('id_kriteria' => $id));
		$this->db->delete('bobot', array('id_kriteria' => $id));
	}
	public function del_kriteria($id){
		$this->db->where('id_kriteria', $id);
		$this->db->delete('kriteria');
	}

	// nilai kriteria
	public function nilai_kriteria(){
		$this->db->select('nilai_kriteria.*,kriteria.nama_kriteria, kriteria.keterangan as ket');
		$this->db->from('nilai_kriteria');
		$this->db->join('kriteria','nilai_kriteria.id_kriteria = kriteria.id_kriteria', 'left');
		$this->db->order_by('nilai_kriteria.id_nilai_kriteria','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function add_nilai_kriteria($data){
		$this->db->insert('nilai_kriteria', $data);
	}
	public function edit_nilai_kriteria($data){
		$this->db->where('id_nilai_kriteria', $data['id_nilai_kriteria']);
		$this->db->update('nilai_kriteria',$data);
	}
	public function del_nilai_kriteria($id){
		$this->db->where('id_nilai_kriteria', $id);
		$this->db->delete('nilai_kriteria');
	}

	// bobot
	public function bobot(){
		$this->db->select('bobot.*,kriteria.nama_kriteria, kriteria.keterangan as ket');
		$this->db->from('bobot');
		$this->db->join('kriteria','bobot.id_kriteria = kriteria.id_kriteria', 'left');
		$this->db->order_by('bobot.id_kriteria','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function add_bobot($data){
		$this->db->insert('bobot', $data);
	}
	public function edit_bobot($data){
		$this->db->where('id_bobot', $data['id_bobot']);
		$this->db->update('bobot',$data);
	}
	public function del_bobot($id){
		$this->db->where('id_bobot', $id);
		$this->db->delete('bobot');
	}
}