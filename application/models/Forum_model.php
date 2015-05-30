<?php

class Forum_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
    
    public function donate($id, $user, $program, $tanggal, $dana ,$deskrip)  
    {   
         $this->db->query("call sp_insert_donasi('$id','$user', '$program', '$tanggal', '$dana', '$deskrip')");  
    }
	  
	public function list_forum(){
    	$query=$this->db->get("forum_cats");
		return $query;
	}
	public function show_user($user){
		$this->db->where("username",$user);
        $query=$this->db->get("user");
		return $query;
	}
	
	public function list_donasi_($id){
		$this->db->where("id_list",$id);
    	$query=$this->db->get("list_donasi");
		return $query;
	}
	
	public function sukses_donasi($id, $username){
		$this->db->where("id_donasi",$id);
		$this->db->where("user_donasi",$username);
    	$query=$this->db->get("donasi");
		return $query;
	}
	
}
?>
