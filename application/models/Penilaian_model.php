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
}