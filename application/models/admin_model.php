<?php

class Admin_model extends CI_Model{
    function __construct() {
        parent::__construct();
		$this->load->helper('date');
        $this->load->database('default','true');
    }
	
    public function onclic()
    {
		/*$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
		$time = time();
		$tanggal = mdate($datestring, $time);
		$data=array(
			'judul'=>$this->input->post('judul'),
			'isi'=>$this->input->post('isi'),
			'tanggal'=>mdate($datestring, $time),
			'user'=>$this->session->userdata('username')
			);
		$this->db->insert('posting',$data);*/
		
		$judul=$this->input->post('judul');
		$isi=$this->input->post('isi');
		$user=$this->session->userdata('username');
		$tipe_posting=$this->input->post('tipe_posting');
		$query = $this->db->query("call insert_berita('$judul', '$user', '$isi', '$tipe_posting')");
    }
}
?>
