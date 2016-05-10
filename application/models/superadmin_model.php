<?php

class superadmin_model extends CI_Model
{
    //insert into user_info
    function insert_info($user,$nominee,$gui_log)
    {
        $flag = false;

        if($this->db->insert('user_info',$user) && $this->db->insert('nominee_info',$nominee) && $this->db->insert('gui_reg_history',$gui_log))
        {
            $flag = true;
        }

        return $flag;
    }

    //insurance coverage
    function insurance_coverage()
    {
        $data = array();

        $query = $this->db->query("SELECT insurance_pack_info.ID,insurance_type_info.INSURANCE_TYPE,insurance_pack_info.INSURANCE_VALUE,insurance_pack_info.INSURANCE_PACK FROM insurance_pack_info JOIN insurance_type_info ON insurance_pack_info.INSURANCE_TYPE = insurance_type_info.ID");

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }


    //search number for status
    function search_status_user($phone)
    {
        $flag = false;
        $query = $this->db->get_where('user_status',array('phone'=>$phone));


        if($query->num_rows() > 0)
        {
            $flag = true;
        }

        return $flag;
    }

    //status report by phone
    function user_status_by_phone($phone)
    {
        $data = array();
        $query = $this->db->get_where('user_status',array('phone'=>$phone));


        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
        }

        return $data;
    }

    //edit status report
    function edit_status_user($data)
    {
        $flag = false;

        $this->db->where('phone',$data['phone']);
        if($this->db->update('user_status',$data))
        {
            $flag = true;
        }

        return $flag;
    }


    public function gui_log($from,$to,$a_id)
    {
        $data = array();
        $query = $this->db->query("SELECT admins.a_id,gui_reg_history.MSISDN,gui_reg_history.DATE FROM admins JOIN gui_reg_history ON admins.a_id = gui_reg_history.USER_ID WHERE DATE BETWEEN '".$from."' AND '".$to."' AND admins.a_id = ".$a_id);

        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }

    //complete registration,incomple registation
    public function data_between_dates($from,$to,$type)
    {
        $data = array();

        switch($type)
        {
            case 0:
                $query = $this->db->query("SELECT user_info.ID,user_info.NAME,user_info.NID,user_info.AGE,user_info.DATEOFBIRTH,user_info.STATUS,user_info.DECLARATION,user_info.INSURANCE_PACK,user_info.REGISTRATION_DATE,user_info.ACTIVATION_DATE,user_info.MSISDN,nominee_info.NAME as nname,nominee_info.NID as nnid,nominee_info.AGE as nage,nominee_info.RELATION as nrelation FROM user_info JOIN nominee_info ON user_info.MSISDN = nominee_info.MSISDN WHERE REGISTRATION_DATE BETWEEN '".$from."' AND '".$to."' AND DECLARATION = 0");
                break;
            case 1:
                $query = $this->db->query("SELECT user_info.ID,user_info.NAME,user_info.NID,user_info.AGE,user_info.DATEOFBIRTH,user_info.STATUS,user_info.DECLARATION,user_info.INSURANCE_PACK,user_info.REGISTRATION_DATE,user_info.ACTIVATION_DATE,user_info.MSISDN,nominee_info.NAME as nname,nominee_info.NID as nnid,nominee_info.AGE as nage,nominee_info.RELATION as nrelation FROM user_info JOIN nominee_info ON user_info.MSISDN = nominee_info.MSISDN WHERE REGISTRATION_DATE BETWEEN '".$from."' AND '".$to."' AND DECLARATION = 1");
                break;
            case 2:
                $query = $this->db->query("SELECT user_info.ID,user_info.NAME,user_info.NID,user_info.AGE,user_info.DATEOFBIRTH,user_info.STATUS,user_info.DECLARATION,user_info.INSURANCE_PACK,user_info.REGISTRATION_DATE,user_info.ACTIVATION_DATE,user_info.MSISDN,nominee_info.NAME as nname,nominee_info.NID as nnid,nominee_info.AGE as nage,nominee_info.RELATION as nrelation FROM user_info JOIN nominee_info ON user_info.MSISDN = nominee_info.MSISDN WHERE REGISTRATION_DATE BETWEEN '".$from."' AND '".$to."' AND user_info.NID = ' '");
                break;
            case 3:
                $query = $this->db->query("SELECT user_info.ID,user_info.NAME,user_info.NID,user_info.AGE,user_info.DATEOFBIRTH,user_info.STATUS,user_info.DECLARATION,user_info.INSURANCE_PACK,user_info.REGISTRATION_DATE,user_info.ACTIVATION_DATE,user_info.MSISDN,nominee_info.NAME as nname,nominee_info.NID as nnid,nominee_info.AGE as nage,nominee_info.RELATION as nrelation FROM user_info JOIN nominee_info ON user_info.MSISDN = nominee_info.MSISDN WHERE REGISTRATION_DATE BETWEEN '".$from."' AND '".$to."' AND ACTIVATION_DATE = ' '");
                break;
            case 4:
                $query = $this->db->query("SELECT user_info.ID,user_info.NAME,user_info.NID,user_info.AGE,user_info.DATEOFBIRTH,user_info.STATUS,user_info.DECLARATION,user_info.INSURANCE_PACK,user_info.REGISTRATION_DATE,user_info.ACTIVATION_DATE,user_info.MSISDN,nominee_info.NAME as nname,nominee_info.NID as nnid,nominee_info.AGE as nage,nominee_info.RELATION as nrelation FROM user_info JOIN nominee_info ON user_info.MSISDN = nominee_info.MSISDN WHERE REGISTRATION_DATE BETWEEN '".$from."' AND '".$to."' AND INSURANCE_PACK = 0");
                break;
            default:
                echo "error occured";
        }


        if($query->num_rows() > 0)
        {
            $data = $query->result_array();
        }

        return $data;
    }


    //check if eligible or incomplete
    function check_status($num)
    {
        $flag = 0;

        $que1 = $this->db->get_where('eligible_user',array('phone'=>$num));

        $que2 = $this->db->get_where('incomplete_user',array('phone'=>$num));

        if($que1->num_rows() > 0)
        {
            $flag = 7;
        }
        else if($que2->num_rows() > 0)
        {
            $flag = sizeof($que2->row_array());
        }

        return $flag;
    }

    //insert status info
    function insert_status_info($data)
    {
        $flag = false;

        if($this->db->query("UPDATE user_info SET REGISTRATION_DATE = '".$data['REGISTRATION_DATE']."',ACTIVATION_DATE = '".$data['ACTIVATION_DATE']."',INSURANCE_PACK = ".$data['INSURANCE_PACK']." WHERE MSISDN = '".$data['MSISDN']."'"))
        {
            $flag = true;
        }

        /*$user = $this->session->userdata('log_data');

        $event_log = array("MSISDN"=>$data['MSISDN'],"DATE"=>date('Y-m-d H:i:s',time()),"USER_ID"=>"abdullah");

        $this->gui_reg_history_insert($event_log);*/

        return $flag;
    }

    //search number
    function search_num($phone)
    {
        $flag = false;
        $query = $this->db->get_where('user_info',array('MSISDN'=>$phone));


        if($query->num_rows() > 0)
        {
            $flag = true;
        }

        return $flag;
    }

    //registration data by phone
    function registration_data_by_phone($phone)
    {
        $data = array();
        $query = $this->db->query("SELECT user_info.ID,user_info.NAME,user_info.NID,user_info.AGE,user_info.DATEOFBIRTH,user_info.STATUS,user_info.DECLARATION,user_info.INSURANCE_PACK,user_info.REGISTRATION_DATE,user_info.ACTIVATION_DATE,user_info.MSISDN,nominee_info.NAME as nname,nominee_info.NID as nnid,nominee_info.AGE as nage,nominee_info.RELATION as nrelation FROM user_info JOIN nominee_info ON user_info.MSISDN = nominee_info.MSISDN WHERE user_info.MSISDN = '$phone'");

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
        }

        return $data;
    }


    //editing registration
    function edit_registration($user,$nominee)
    {
        $flag1 = false;
        $flag2 = false;

        $this->db->where('MSISDN',$user['MSISDN']);
        if($this->db->update('user_info',$user))
        {
            $flag1 = !$flag1;
        }

        $this->db->where('MSISDN',$user['MSISDN']);
        if($this->db->update('nominee_info',$nominee))
        {
            $flag2 = !$flag2;
        }

        if($flag1 && $flag2)
        {
            return true;
        }
        else{
            return false;
        }

    }


    public function gui_reg_history_insert($data)
    {
        $flag = false;

        if($this->db->insert('gui_reg_history',$data))
        {
            $flag = true;
        }

        return $flag;
    }



    //


    //admin data section

    //getting all the admins
    function get_admin() {

        $this->db->select('a_id,a_fullname,a_username,a_role');
        $this->db->from('admins');
        $this->db->order_by('a_id','desc');

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    //inserting new admin
    function admin_add($data)
    {
        $flag = false;

        if($this->db->insert('admins', $data))
        {
            $flag = true;
        }

        return $flag;
    }

    //admin by a_id
    function admin_by_id($a_id)
    {
        $query = $this->db->get_where('admins',array('a_id'=>$a_id));
        $data = array();

        if($query->num_rows() > 0)
        {
            $data = $query->row_array();
        }

        return $data;
    }

    //update admin by a_id
    function update_admin_by_id($data)
    {
        $flag = false;

        $this->db->where('a_id',$data['a_id']);

        if($this->db->update('admins',$data))
        {
            $flag = true;
        }

        return $flag;
    }

    //delete admin by id
    public function delete_admin($a_id)
    {
        $flag = false;

        if($this->db->delete('admins',array('a_id'=>$a_id)))
        {
            $flag = true;
        }

        return $flag;
    }

    //admin data section
}

?>