<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


header("Access-Control-Allow-Origin:*");

class mobile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set("Asia/Dacca");
    }

    public function test()
    {
        //$packet = $this->input->post('packet');

        echo "works";

    }    

    public function getting_file()
    {
        $packet = $this->input->post('packet');

        if(!empty($packet))
        {
            $handle = fopen($_SERVER['DOCUMENT_ROOT']."/priyojon/from_app/".time().".json",'w');

            fwrite($handle,$packet);

            fclose($handle);

            echo '1';
        }
        else
        {
            echo '0';
        }

    }
}