<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller
{
    private $actual = array("0"=>"superadmin","1"=>"customer_care","2"=>"finance","3"=>"distributor");

    public function index()
    {
        $data['flag'] = '';
        $this->load->view('login/index',$data);
    }

    public function get_in()
    {
        $this->load->model('login_model','l');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if(!empty($username) and !empty($password))
        {
            $data = array('a_username'=>$username,'a_password'=>$password);
            $flag = $this->l->loging_in($data);


            if(sizeof($flag) > 0)
            {
                $this->session->set_userdata('log_data',$flag);


                $this->session->set_userdata("user",$this->actual[$flag['a_role']]);

                redirect(base_url().$this->session->userdata("user"),'refresh');

            }
            else
            {
                $data['flag'] = 'invalid username or password';
                $this->load->view('login/index',$data);
            }
        }
        else
        {
            $data['flag'] = 'please fill up the form properly';
            $this->load->view('login/index',$data);
        }
    }

    public function get_out()
    {
        $this->session->unset_userdata("log_data");
        $this->session->unset_userdata("user");

        redirect(base_url().'login','refresh');
    }
}