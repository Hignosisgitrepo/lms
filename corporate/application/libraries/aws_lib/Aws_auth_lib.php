<?php

require realpath(dirname(__FILE__)).'/aws/aws-autoloader.php';
use Aws\Connect\ConnectClient AS connectSevice;
use Aws\Exception\AwsException;

class Aws_auth_lib
{
	
	public function Aws_auth($region){
		$config = array(
                'version'     => 'latest',
                'region'      => $region,
                'credentials' => array(
                    'key'    => AWS_ACCESS_KEY,  
                    'secret' => AWS_SECRET_KEY,
                    'curl.options'  => array(CURLOPT_VERBOSE => true)
                ),
            );

        return $config;
	}
}