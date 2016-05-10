<?php

class api extends CI_Model
{
    public function getUserPriyojonStatus ($userMSISDN) {
        $http = "http://172.16.249.38:6001/PPStatusCheck.aspx?MSISDN=".$userMSISDN;
		
		$curl = curl_init($http);
		
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
		
		$data = curl_exec($curl);
		
		curl_close($curl);
		
		$flag = true;
		
		if(strpos($data,'NOT') == '3')
		{
			$flag = false;
		}
		
		return $flag;
    }

    public function getstatus($userMSISDN)
    {
    	$flag = true;

    	return $flag;
    }

    /*public function sendSMS ($msisdn) {
        $config['host']     = 'localhost';
        $config['port']     = '13013';
        $config['path']     = '/cgi-bin/sendsms?';
        $config['user']     = 'priyojon';
        $config['password'] = 'priyojon';
        $config['from']     = '9100';
        $config['message']     = "Congratulations! Your life insurance profile has been created successfully. Please dial *6000*3*2# to select your desired coverage.";

        @file_get_contents('http://'. $config ['host']. ':'. $config ['port']. $config ['path']. 'username='. $config ['user']. '&password='. $config ['password']. '&from='. $config ['from']. '&to='. urlencode('00'.$msisdn). '&text='. urlencode($config['message']));
    }*/

    public function sendSMS($data)
    {
    	$url = "http://api.bulksms.icombd.com/api/v3/sendsms/xml";
	
		$xml = "<SMS>
	<authentication>
	<username>Academicgrade</username>
	<password>6OrploKD</password>
	</authentication>
	<message>
	<sender>Banglalink Priyozon</sender>
	<text>".$data['msg']."</text>
	<recipients>
	<gsm>".$data['mobile']."</gsm>
	</recipients>
	</message>
	</SMS>";

		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POSTFIELDS,"xmlRequest=".$xml);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type:application/xml","Host:api.bulksms.icombd.com","Accept:*/*"));


		$data = curl_exec($ch);

		curl_close($ch);

	}

	function sendServerSMS($msisdn)
	{
		$config['host']     = 'localhost';
		$config['port']     = '13013';
		$config['path']     = '/cgi-bin/sendsms?';
		$config['user']     = 'priyojon';
		$config['password'] = 'priyojon';
		$config['from']     = '9100';
		$config['message']     = "I do hereby declare that I am in good health and the information that I have provided here is true and correct. Reply 1 to confirm. Stay with Banglalink.";

		$http = 'http://'. $config ['host']. ':'. $config ['port']. $config ['path']. 'username='. $config ['user']. '&password='. $config ['password']. '&from='. $config ['from']. '&to='. urlencode('00'.$msisdn). '&text='. urlencode($config['message']);

		$curl = curl_init($http);

		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

		$data = curl_exec($curl);
		
		curl_close($curl);

		$flag = false;

		if(strpos($data,'Accepted for delivery') > 0)
		{
			$flag = true;
		}

		return $flag;
	}

}

   
   