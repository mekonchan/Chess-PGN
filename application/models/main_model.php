<?php
class main_model extends CI_Model{


	public function getdata(){
		$sql = "SELECT data from myblob";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function save($name,$mime,$gamedata){
		$this->db->set('name',$name);
		$this->db->set('mime',$mime);
		$this->db->set('data',$gamedata);
		$this->db->insert('myblob');
		
    }

	// public function get_data($id = 0){
	// 	if($id == 0){
	// 		// Query select all
	// 		$sql = "SELECT * from myblob";
	// 		$query = $this->db->query($sql);
	// 		return $query->result_array();	//return banyak row of data
	// 	}else{
	// 		// Query select specific ID
	// 		$sql = "SELECT * from myblob WHERE `id`=$id";
	// 		$query = $this->db->query($sql);
	// 		return $query->row_array(); //return 1 row of data je drpd database
	// 	}
	// }

}
?>