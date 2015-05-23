<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function login($user,$password)
    {
		$this->db->where("username",$user);
        $this->db->where("pass",$password);
            
        $query=$this->db->get("user");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'username' 		=> $rows->username,
                    	'email' 	=> $rows->email,
		                'role'    => $rows->role,
						'logged_in' 	=> 'logout',
                   );
			}
            	$this->session->set_userdata($newdata);
                return true;            
		}
		return false;
    }
	public function add_user()
	{
		$data=array(
			'role'=>1,
			'username'=>$this->input->post('user_name'),
			'email'=>$this->input->post('email_address'),
			'pass'=>md5($this->input->post('password'))
			);
		$this->db->insert('user',$data);
	}
	
	public function check_user_exist($usr)
    {
		
        $this->db->where("username",$usr);
        $query=$this->db->get("user");
        if($query->num_rows()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	public function show_berita($paging){
		$query = $this->db->query("call show_berita('$paging')");
		return $query;
}

	public function halaman_berita($paging){
		$this->db->where("id_posting",$paging);
        $query=$this->db->get("posting");
		return $query;
}
}
?>