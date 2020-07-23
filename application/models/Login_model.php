<?php
class Login_model extends CI_Model
{
    function login($user,$pass)
    {   
        $this->db->where('username',$user);
        $this->db->where('password',$pass);
        $result = $this->db->get('user',1);
        return $result;
    }

    function is_role()
    {
        return $this->session->userdata('id_user');
    }

    public function getRole()
    {
        $this->db->select('role');
        $this->db->where('id_user',$this->session->userdata('id_user'));
        return $this->db->get('role')->result_array();
        // return $this->db->get_where('role',['id_user'=>$this->session->userdata('id_user')])->result_array();
    }
}