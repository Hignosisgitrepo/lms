<?php

require AWS_LIB.'/aws-autoloader.php';
use Aws\Chime\ChimeClient AS chime_client;
use Aws\Chime\Exception\ChimeException;
	
class Chime_attendees{

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

	public function aws_creating_attendees($training_master_id, $training_section_id, $training_section_detail_id, $meeting_id, $customer_id, $region){

  		$auth = $this->Aws_auth($region);

        $meeting = new chime_client($auth);

        $ExternalUserId = $training_master_id.'_'.$training_section_id.'_'.$training_section_detail_id.'_'.$meeting_id.'_'.$customer_id;

        try {
            $response = $meeting->createAttendee([
                'ExternalUserId' => $ExternalUserId,
                'MeetingId' => $meeting_id, 
                'Tags' => [
                    [
                        'Key' => $ExternalUserId, 
                        'Value' => 'abc', 
                    ]
                ],
            ]);

            return $response;

        } catch (AwsException $e) {
            return $e->getMessage();
        }
	}
}