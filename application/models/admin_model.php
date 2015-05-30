<?php

class Admin_model extends CI_Model{
    function __construct() {
        parent::__construct();
		$this->load->helper('date');
        $this->load->database('default','true');
    }
	
    public function onclic()
    {
		
		$id=$this->db->query("select fn_last_posting()");
		 		$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
				$config['file_name']            = '$id';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());
						$this->load->view('admin/head');
						$this->load->view('admin/nav');
						$this->load->view('admin/berita',$error);
                }
                else
                {
						$error = array('error' => 'Sukses');
						$this->load->view('admin/head');
						$this->load->view('admin/nav');
						$this->load->view('admin/berita',$error);
						
                        $data = array('upload_data' => $this->upload->data());
						
                        //$this->load->view('upload_success', $data);
                }
		
		$judul=$this->input->post('judul');
		$isi=$this->input->post('isi');
		$user=$this->session->userdata('username');
		$tipe_posting=1;
		$query = $this->db->query("call insert_berita('$judul', '$user', '$isi', '$tipe_posting')");
    }
	
	public function show_edit_berita()  
      {   
         $query = $this->db->get('posting');  
         return $query;  
      }
    
    public function tambah_thread($judul, $u_name, $isi, $tipe)  
      {   
         $this->db->query("CALL SP_INSERT_THREAD('$judul','$u_name', '$isi', '$tipe')");  
      }
    
    public function show_edit_thread()
    {
        $query = $this->db->get('posting');
        return $query;
    }
}
?>
