<?php

class login_model extends CI_Model {
    public function loging_in($user)
    {
        $data = array();

        $query = $this->db->get_where('admins',$user);

        if($query->num_rows() == 1)
        {
            $data = $query->row_array();
        }

        return $data;
    }
}