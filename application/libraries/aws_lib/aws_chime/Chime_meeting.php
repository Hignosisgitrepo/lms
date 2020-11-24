<?php

require AWS_LIB.'/aws-autoloader.php';
use Aws\Chime\ChimeClient AS chime_client;
use Aws\Chime\Exception\ChimeException;

class Chime_meeting{

    private $_CI;
    public function __construct()
    {
        $this->_CI = & get_instance();
        $this->_CI->load->model('trainer/trainer_model','tm');
    }

   
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

public function aws_creating_meeting($training_master_id, $training_schedule_id, $isMeetingHost, $customer_id, $region){

  $auth = $this->Aws_auth($region);

        $meeting = new chime_client($auth);

        $ClientRequestToken = $training_master_id.'_'.$training_schedule_id.'_'.$isMeetingHost.'_'.$customer_id;
        $ExternalMeetingId = $training_master_id.'_'.$training_schedule_id.'_'.$isMeetingHost.'_'.$customer_id;
        $ExternalUserId = $training_master_id.'_'.$training_schedule_id.'_'.$isMeetingHost.'_'.$customer_id;

        $data = [
                'ClientRequestToken' => $ClientRequestToken,
                'ExternalMeetingId' => $ExternalMeetingId,
                'MediaRegion' => $region,
                'Tags' => [
                    [
                        'Key' => $training_master_id.'_'.$training_schedule_id.'_'.$isMeetingHost.'_'.$customer_id,
                        'Value' => 'abc',
                    ]
                ],
            ];
        try {
            $response = $meeting->createMeeting($data);

            $response_att = $meeting->createAttendee([
                'ExternalUserId' => $ExternalUserId,
                'MeetingId' => $response['Meeting']['MeetingId'],
                'Tags' => [
                    [
                        'Key' => $ExternalUserId,
                        'Value' => 'abc',
                    ]
                ],
            ]);

            $MetaData_status_code = isset($response_att['@metadata']['statusCode'])? $response_att['@metadata']['statusCode'] : 0;

            if($MetaData_status_code == 201){
                $insert_meeting_attendees_details = array(
                    'training_master_id'  => $training_master_id,
                    'training_schedule_id'  => $training_schedule_id,
                    'isMeetingHost'  => $isMeetingHost,
                    'MeetingId' => $response['Meeting']['MeetingId'],
                    'customer_id' => $customer_id,
                    'AttendeeId' => $response_att['Attendee']['AttendeeId'],
                    'JoinToken' => $response_att['Attendee']['JoinToken'],
                    'ExternalUserId' => $response_att['Attendee']['ExternalUserId'],
                    'effectiveUri' => $response_att['@metadata']['effectiveUri'],
                );

                $add_meeting_attendees_details = $this->_CI->tm->add_meeting_attendees_details($insert_meeting_attendees_details);
            }
           
            return $response;

        } catch (AwsException $e) {
            return $e->getMessage();
        }
}
}