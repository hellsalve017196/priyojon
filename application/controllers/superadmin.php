<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


header("Access-Control-Allow-Origin:*");

class superadmin extends CI_Controller
{
    private $relation = array('son'=>'son','daughter'=>'daughter','brother'=>'brother','sister'=>'sister','father'=>'father','mother'=>'mother','husband'=>'husband','wife'=>'wife');
    private $other_dir = array('son'=>'son','daughter'=>'daughter','brother'=>'brother','sister'=>'sister','father'=>'father','mother'=>'mother','husband'=>'husband','wife'=>'wife');

    private $after_search = array("0"=>"editing_registration_view");

    public function __construct()
    {
        parent::__construct();
    }

    // home
    public function index()
    {
        $data['page_name'] = 'temp';
        $data['page_title'] = 'Admin Description';

        $usr = $this->session->userdata('log_data');

        $data['welcome'] = $usr['a_fullname'];

        $this->load->view($this->session->userdata('user').'/index',$data);
    }



    //checking user number is valid or not via api
    public function user_check_view()
    {
        $data['page_name'] = 'number_check';
        $data['page_title'] = 'Checking phone number';

        $this->load->view($this->session->userdata('user').'/index',$data);
    }



    //check priyojon or not
    public function user_check()
    {
        $this->load->model('api','a');

        $num = $this->input->post('num');

        if($this->a->getstatus($num))
        {
            echo '1';
        }
        else
        {
            echo '0';
        }
    }




    //initial information form view
    public function initial_user_info_form_view($num)
    {
        $data['num'] = $num;
        $data['page_name'] = 'initial_info';
        $data['page_title'] = 'Basic Information Form';
        $data['relation'] = $this->relation;

        $this->load->view($this->session->userdata('user').'/index',$data);
    }




    //submiting initial information
    public function submit_initial_info()
    {
        $this->load->model($this->session->userdata('user').'_model','s');
		
        $data = json_decode($this->input->post('init_user'),true);
		
		if(sizeof($data) > 0)
		{
				$temp = array();
		
			foreach($data as $key=>$value)
			{
				if(strlen($value) != 0)
				{
					$temp[$key] = $value;
				}
				else{
					$temp[$key] = " ";
				}
			}



			$user["MSISDN"] = $temp["phone"];

			$user["NAME"] = $temp["fullname"];

			$user["NID"] = $temp['nid'];

			$user["AGE"] = $temp["age"];

			//$user["DATEOFBIRTH"] = ' ';

			$user["STATUS"] = "5";

			$user["DECLARATION"] = "0";

			//$user['INSURANCE_PACK'] = " ";

			//$user['REGISTRATION_DATE'] = " ";

			//$user['ACTIVATION_DATE'] = " ";



			$nominee["MSISDN"] = $temp["phone"];

			$nominee["NAME"] = $temp["nname"];

			$nominee["AGE"] = $temp["nage"];

			//$nominee['NID'] = ' ';

			$nominee["RELATION"] = $temp["nrelation"];
			
			

			//inserting to the database

			$this->load->model('superadmin_model','s');

			$gui_log = array("MSISDN"=>$temp["phone"],"DATE"=>date('Y-m-d H:i:s',time()),"USER_ID"=>$this->session->userdata('a_id'));

			if($this->s->insert_info($user,$nominee,$gui_log))
			{
				echo '1';
			}
			else
			{
				echo '0';
			}

		}
		else
		{
			echo sizeof($data);
		}
        
    }

    //insurance package form view
    public function status_view_form($num)
    {
        $this->load->model($this->session->userdata('user').'_model','s');

        $data['num'] = $num;
        $data['page_name'] = 'status_view';
        $data['page_title'] = 'Status Information Form';
        $data['i_pack'] = $this->s->insurance_coverage();

        $this->load->view($this->session->userdata('user').'/index',$data);
    }

    //insert coverage
    public function submit_status_info()
    {
        $this->load->model($this->session->userdata('user').'_model','s');

        $this->load->model('api','a');

        $data = json_decode($this->input->post('init_user'),true);

        if($this->s->insert_status_info($data))
        {
            $this->a->sendServerSMS($data['MSISDN']);
            echo '1';
        }
        else
        {
            echo '0';
        }
    }



    // searching for editing,deleting,status
    public function number_search_view($flag)
    {
        $data['page_name'] = 'number_search';
        $data['page_title'] = 'Number Search';
        $data['navigate_to'] = $this->after_search[$flag];


        $this->load->view($this->session->userdata('user').'/index',$data);
    }




    // searching number
    public function number_search()
    {
        $this->load->model($this->session->userdata('user').'_model','s');

        $num = $this->input->post('num');

        if($this->s->search_num($num))
        {
            echo '1';
        }
        else
        {
            echo '0';
        }
    }



    //editing registration
    public function editing_registration_view($num)
    {
        $this->load->model($this->session->userdata('user').'_model','s');

        $data['user_data'] = $this->s->registration_data_by_phone($num);
        $data['i_pack'] = $this->s->insurance_coverage();

        $data['page_name'] = 'edit_initial_info';
        $data['page_title'] = 'Edit Initial Info';
        $data['relation'] = $this->relation;

        $this->load->view($this->session->userdata('user').'/index',$data);
    }



    public function editing_registration()
    {
        $this->load->model('superadmin_model','s');

        $data = json_decode($this->input->post('init_user'),true);

        $temp = array();

        foreach($data as $key=>$value)
        {
            if(strlen($value) != 0)
            {
                $temp[$key] = $value;
            }
            else{
                $temp[$key] = " ";
            }
        }



        $user["MSISDN"] = $temp["MSISDN"];

        $user["NAME"] = $temp["NAME"];

        $user["NID"] = $temp['NID'];

        $user["AGE"] = $temp["AGE"];

        $user['INSURANCE_PACK'] = $temp['INSURANCE_PACK'];

        $user['REGISTRATION_DATE'] = $temp['REGISTRATION_DATE'];

        $user['ACTIVATION_DATE'] = $temp['ACTIVATION_DATE'];



        $nominee["MSISDN"] = $temp["MSISDN"];

        $nominee["NAME"] = $temp["nname"];

        $nominee["AGE"] = $temp["nage"];

        $nominee["RELATION"] = $temp["nrelation"];


        //print_r($user);
        //print_r($nominee);


        //inserting to the database

        $this->load->model($this->session->userdata('user').'_model','s');

        if($this->s->edit_registration($user,$nominee))
        {
            echo '1';
        }
        else
        {
            echo '0';
        }

    }


    // success page
    public function success($flag)
    {
        $flags = array("0"=>"Successfully Registered","1"=>"Successfully Edited");
        $data['page_name'] = 'success';
        $data['page_title'] = 'Success';
        $data['flag'] = $flags[$flag];

        $this->load->view($this->session->userdata('user').'/index',$data);
    }



    //gui log view
    public function gui_log_view()
    {
        $this->load->model($this->session->userdata('user').'_model','s');

        $data['page_name'] = 'gui_history';
        $data['page_title'] = 'GUI LOG';
        $data['admin_list'] = $this->s->get_admin();

        $this->load->view($this->session->userdata('user').'/index',$data);
    }


    //gui log view
    public function gui_log()
    {
        $from = $this->input->get('from');
        $to = $this->input->get('to');
        $a_id = $this->input->get('a_id');

        header("Context-type:text/json");

        $this->load->model($this->session->userdata('user').'_model','s');
        $data = $this->s->gui_log($from,$to,$a_id);

        echo json_encode($data);
    }


    //report view
    public function report_view()
    {
        $data['page_name'] = 'view_report';
        $data['page_title'] = 'Generate Reports';

        $this->load->view($this->session->userdata('user').'/index',$data);
    }




    //report print
    public function report_genetrate()
    {
        $from = $this->input->get("from");
        $to = $this->input->get("to");
        $type = $this->input->get("type");

        require_once 'files/csv/simple_html_dom.php';

        $this->load->model($this->session->userdata('user').'_model','s');

        $str = '';
        $file_title = '';

        switch($type)
        {
            case 0:
                $file_title = 'Incomplete Registration';
                break;
            case 1:
                $file_title = 'Complete Registration';
                break;
            case 2:
                $file_title = 'NID missing';
                break;
            case 3:
                $file_title = 'Activation Date missing';
                break;
            case 4:
                $file_title = 'Insurance pack missing';
                break;
        }

        $data = $this->s->data_between_dates($from,$to,$type);

        $str = '<table><tr><td colspan="3">'.$file_title.'</td><td colspan="4">Between '.$from.' AND '.$to.'</td></tr><tr><td>phone</td><td>fullname</td><td>age</td><td>nid</td><td>nname</td><td>nage</td><td>nrelation</td><td>Insurance Pack</td><td>Registration Date</td><td>Activation Date</td></tr>';

        if(sizeof($data) > 0)
        {
            foreach($data as $d)
            {
                $str = $str . '<tr><td>'.$d['MSISDN'].'</td><td>'.$d['NAME'].'</td><td>'.$d['AGE'].'</td><td>'.$d['NID'].'</td><td>'.$d['nname'].'</td><td>'.$d['nage'].'</td><td>'.$d['nrelation'].'</td><td>'.$d['INSURANCE_PACK'].'</td><td>'.$d['REGISTRATION_DATE'].'</td><td>'.$d['ACTIVATION_DATE'].'</td></tr>';
            }
        }
        else
        {
            $str = $str . '<tr><td>No data found in this timeline</td</tr>';
        }

        $str = $str. '<table>';

        $html = str_get_html($str);


        header('Content-type: application/ms-excel');
        header('Content-Disposition: attachment; filename=report.csv');

        $fp = fopen("php://output", "w");

        foreach($html->find('tr') as $element)
        {
            $td = array();
            foreach( $element->find('td') as $row)
            {
                $td [] = $row->plaintext;
            }
            fputcsv($fp, $td);
        }


        fclose($fp);

    }



    //admin add,delete,update

    //all the admin list
    public function admininfo_view()
    {
        
        $data['page_name']= 'admininfo';
        $data['page_title']= 'Admin information';
          
        $this->load->model('superadmin_model','s');  
        $data['name'] = $this->s->get_admin();

        $data['role'] = array("0"=>"Admin","1"=>"Customer Care","2"=>"Finance","3"=>"Distributor"); // role as admin

        $this->load->view($this->session->userdata('user').'/index',$data);
        
    }

    //adding new admin view
    public function add_admin_view(){

        $data['page_name']= 'addadmin';
        $data['page_title']= 'Add Admin';
        $this->load->view($this->session->userdata('user').'/index',$data);

    }


    //updating admin view
    public function update_admin_view($a_id)
    {
        $this->load->model($this->session->userdata('user').'_model','s');

        $data['page_name']= 'update_admin';
        $data['page_title']= 'Update Admin';
        $data['admin_info'] = $this->s->admin_by_id($a_id);
        $this->load->view($this->session->userdata('user').'/index',$data);

    }

    //adding new admin
    public function admin_insert()
    {
        $this->load->model($this->session->userdata('user').'_model','s');
         
         $data = json_decode($this->input->post('admin'),true);

         if($this->s->admin_add($data))
         {
             echo "1";
         }
         else
         {
             echo "0";
         }
    }
    

    //updating admin
    public function admin_update()
    {
        $this->load->model($this->session->userdata('user').'_model','s');
         
         $data = json_decode($this->input->post('admin'),true);

         if($this->s->update_admin_by_id($data))
         {
             echo "1";
         }
         else
         {
             echo "0";
         }
    }

    //delete admin
    public function delete_admin($a_id)
    {
        $this->load->model($this->session->userdata('user').'_model','s');

        if($this->s->delete_admin($a_id))
        {
            redirect(base_url().'superadmin/admininfo_view','refresh');
        }
        else
        {
            echo "error occured";
        }
    }


    public function updating_self()
    {
       $user = $this->session->userdata('log_data');

        redirect(base_url().$this->session->userdata('user').'/update_admin_view/'.$user['a_id'],'refresh');
    }

    //admin add,delete,update
}