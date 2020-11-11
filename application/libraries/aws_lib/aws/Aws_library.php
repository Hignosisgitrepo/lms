<?php

require realpath(dirname(__FILE__)).'/aws/aws-autoloader.php';
use Aws\Connect\ConnectClient AS connectSevice;
use Aws\Exception\AwsException;

class Aws_library {

    public function AwsAuth(){
        $config = array(
                'version'     => 'latest',
                'region'      => 'us-east-1',
                'credentials' => array(
                    'key'    => AWS_ACCESS_KEY,  
                    'secret' => AWS_SECRET_KEY,
                    'curl.options'  => array(CURLOPT_VERBOSE => true)
                ),
            );

        return $config;
    }

    public function ConnectClient($instance_id){

        $auth = $this->AwsAuth();

        $ConnectClient = new connectSevice($auth);

        try {
            $result = $ConnectClient->getCurrentMetricData([
                                        'CurrentMetrics' => [
                                            [
                                                'Name' => 'AGENTS_ONLINE',
                                                'Unit' => 'COUNT',
                                            ],
                                            [
                                                'Name' => 'AGENTS_AVAILABLE',
                                                'Unit' => 'COUNT',
                                            ],
                                            [
                                                'Name' => 'OLDEST_CONTACT_AGE',
                                                'Unit' => 'SECONDS',
                                            ],
                                            [
                                                'Name' => 'AGENTS_ONLINE',
                                                'Unit' => 'COUNT',
                                            ]
                                        ],
                                        'Filters' => [ 
                                            'Channels' => ["VOICE" ],
                                            'Queues' => ['2186a39f-25b8-43bd-b711-6a66d9980086',
                                                         'arn:aws:connect:us-east-1:372857432766:instance/'.$instance_id.'/queue/2186a39f-25b8-43bd-b711-6a66d9980086'],
                                        ],
                                        'InstanceId' => $instance_id
            ]);

            return $result;

        } catch (AwsException $e) {
            return $e->getMessage();
        }
        
    }

    public function ListUser($instance_id){

        $auth = $this->AwsAuth();

        $listUsers = new connectSevice($auth);

        try {
            $result = $listUsers->listUsers(['InstanceId' => $instance_id]);
            return $result;

        } catch (AwsException $e) {
            return $e->getMessage();
        }
           
    }
  
}