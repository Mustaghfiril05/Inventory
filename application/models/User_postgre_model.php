<?php
class user_postgre_model extends CI_Model
{
    var $db1;

    function __construct()
    {
        parent::__construct();
         $this->db1 = $this->load->database ( 'db1', TRUE );
    }

    public function userdata(){
		$query = "SELECT * FROM onamba_user "; 

		return $this->db1->query($query)->result_array();
	}

}

      