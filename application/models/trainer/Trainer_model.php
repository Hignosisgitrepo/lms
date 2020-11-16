<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Trainer_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function addTrainer($customer_id) {
        $this->db->trans_start();
        $this->db->query("INSERT INTO `trainer` SET customer_id = '" . $customer_id . "', status = 1");
        
        $insert_id = $this->db->insert_id();
        $this->db->query("UPDATE `customer` SET is_trainer = '1' WHERE customer_id = '" . $customer_id . "'");
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    function loginMe($email, $password) {
        $query = $this->db->query("SELECT * FROM trainer WHERE email = '" . $email . "' AND status = 1 AND approve_status= 1");
        $trainer = $query->result();
        
        if(!empty($trainer)){
            if(verifyHashedPassword($password, $trainer[0]->password)){
                return $trainer;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    function edit_into_training_concept($c_name,$training_concept_id) {
        $this->db->trans_start();

        $this->db->query("UPDATE `training_concepts` SET concept_name ='" . $c_name . "' WHERE training_concept_id = '" . $training_concept_id . "' ");
        $this->db->trans_complete();
       return $training_concept_id;
   }


   function edit_into_training_section($s_name,$training_section_id,$sort_order) {
    $this->db->trans_start();

    $this->db->query("UPDATE `training_section` SET section_name ='" . $s_name . "',sort_order ='" . $sort_order . "' WHERE training_section_id = '" . $training_section_id . "' ");
    $this->db->trans_complete();
   return $training_section_id;
}

   function delete_concepts($conecpt_id){
    $this->db->trans_start();
        $this->db->query("delete from  `training_concepts` WHERE training_concept_id = '" . $conecpt_id . "' ");
        $this->db->trans_complete();
       return $conecpt_id;
   }

   function delete_section($section_id){
    $this->db->trans_start();
        $this->db->query("delete from  `training_section` WHERE training_section_id = '" . $section_id . "' ");
        $this->db->trans_complete();
       return $section_id;
   }

    function getTrainer($trainer_id) {		
		$query = $this->db->query("SELECT *  FROM `trainer`  WHERE trainer_id = '".$trainer_id."' ");

        $result = $query->row();
        return $result;
    }

   function getTrainerName($customer_id) {
        $query = $this->db->query("SELECT *  FROM `customer`  WHERE customer_id = '".$customer_id."' ");

        $result = $query->row();
        return $result;
    }

    function get_trainer_data($id, $owner) {

        $query = "SELECT * FROM training_master WHERE created_by = ? AND owner = ?  ORDER BY training_master_id DESC";

        $result = $this->db->query($query, array($id, $owner));

        return $result->result();
    }

    function get_total_lession($id) {

        $query = "SELECT COUNT(*) total_lesson FROM training_section_detail TSD INNER JOIN training_section TS ON TSD.training_section_id = TS.training_section_id INNER JOIN training_master TM ON TS.training_master_id = TM.training_master_id WHERE TM.training_master_id = ?";

        $result = $this->db->query($query, array($id));

        return $result->result();
    }

    function get_student_trainer_data($id) {
        
        $query = "SELECT * FROM training_master WHERE training_master_id = ? ORDER BY training_master_id DESC";
        
        $result = $this->db->query($query, array($id));
        
        return $result->result();
    }
    
    function insert_into_training_master($data) {
        
        $query = "INSERT INTO training_master (training_name,training_description, owner, category_id,program_level, training_type, currency_id, price,discount,price_after_discount,platform_commission,final_price, course_duration, session_duration, no_of_sessions, training_start_date, training_start_time,time_zone, training_started, created_by, created_date, modified_by, modified_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?, ?, ?)";

        $result = $this->db->query($query, array($data['training_name'],$data['training_description'], $data['owner'], $data['category_id'], $data['program_level'], $data['training_type'], $data['currencies'], $data['price'],$data['discount'],$data['price_after_discount'],$data['platform_commission'],$data['final_price'], $data['course_duration'], $data['session_duration'], $data['no_of_sessions'], $data['training_start_date'],$data['training_start_time'],$data['time_zone'], $data['training_started'], $data['created_by'], $data['created_date'], $data['modified_by'], $data['modified_date']));

        $insert_id = $this->db->insert_id();

        $data = array('insert_id' => $insert_id,
                      'result' => $result);

        return $data;
        
    }
    
    // function edit_training_master($data,$tid) {
        
    //     $query = "UPDATE training_master set training_name='".$data['training_name']."' ,training_description='".$data['training_description']."',owner='".$data['owner']."',category_id='".$data['category_id']."',program_level='".$data['program_level']."',training_type='".$data['training_type']."',currency_id='".$data['currencies']."',price='".$data['price']."',discount='".$data['discount']."',price_after_discount='".$data['price_after_discount']."',platform_commission='".$data['platform_commission']."',final_price='".$data['final_price']."',course_duration='".$data['course_duration']."', session_duration='".$data['session_duration']."', no_of_sessions='".$data['no_of_sessions']."', training_start_date='".$data['training_start_date']."',training_start_time='".$data['training_start_time']."',time_zone='".$data['time_zone']."',training_started='". $data['training_started']."', created_by='".$data['created_by']."', created_date='".$data['created_date']."',modified_by='". $data['modified_by']."',modified_date='". $data['modified_date']."' where training_master_id='".$tid."'";

    //     $result = $this->db->query($query);
    //     $insert_id = $this->db->insert_id();

    //     $data = array('insert_id' => $insert_id,
    //                   'result' => $result);

    //     return $data;
        
    // }

    function insert_into_training_days($data) {
        
        $query = "INSERT INTO training_days (training_master_id, training_day) VALUES (?, ?)";
        
        $result = $this->db->query($query, array($data['training_master_id'], $data['day']));
        
        return $result;
        
    }
    
    function insert_into_training_section($data) {
        
        $query = "INSERT INTO training_section (training_master_id, section_name, sort_order, created_by, created_date, modified_by, modified_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $result = $this->db->query($query, array($data['training_master_id'], $data['section_name'], $data['sort_order'], $data['created_by'], $data['created_date'], $data['modified_by'], $data['modified_date']));	 
        $insert_id = $this->db->insert_id();
        
        $data = array('insert_id' => $insert_id,
            'result' => $result);
        
        return $data;
        
    }

    function insert_into_training_concept($data) {
        
        $query = "INSERT INTO training_concepts (training_master_id, concept_name, created_by, created_date, modified_by, modified_date) VALUES (?, ?, ?, ?, ?, ?)";

        $result = $this->db->query($query, array($data['training_master_id'], $data['concept_name'],  $data['created_by'], $data['created_date'], $data['modified_by'], $data['modified_date']));

        $insert_id = $this->db->insert_id();

        $data = array('insert_id' => $insert_id,
                      'result' => $result);

        return $data;

    }
    
    function get_training_section_data($id) {
        
        $query = "SELECT * FROM training_section WHERE training_section_id IN (".$id.") ORDER BY sort_order ASC";
        $result = $this->db->query($query);
        
        // $sql = $this->db->last_query();
        
        // print_r($sql); exit;
        
        return $result->result();
    }

    function get_training_concepts($id) {

        $query = "SELECT * FROM training_concepts WHERE training_master_id IN (".$id.")";

        $result = $this->db->query($query);

        // $sql = $this->db->last_query();

        // print_r($sql); exit;

        return $result->result();
    }

    function getPlatformCommission($id) {

        $query = "SELECT * FROM commission WHERE trainer_id ='".$id."' and status='1' ";

        $result = $this->db->query($query);
        if($result==null){
            return $result;
        }else{
            return $result->row();
        }
        
    }

    function getCustomerId($id) {

        $query = "SELECT * FROM trainer WHERE trainer_id ='".$id."' ";

        $result = $this->db->query($query);
        if($result==null){
            return $result;
        }else{
            return $result->row();
        }
        
    }
    function get_training_concept_data($id) {

        $query = "SELECT * FROM training_concepts WHERE training_concept_id IN (".$id.") order by training_concept_id ASC";

        $result = $this->db->query($query);

        // $sql = $this->db->last_query();

        // print_r($sql); exit;

        return $result->result();
    }

    function get_training_section($id) {

        $query = "SELECT * FROM training_section WHERE training_master_id IN (".$id.") ";

        $result = $this->db->query($query);

        // $sql = $this->db->last_query();

        // print_r($sql); exit;

        return $result->result();
    }
    function insert_into_training_section_details($data) {
        
        $query = "INSERT INTO training_section_detail (training_section_id, sub_section_name, video_file_path, sort_order, created_by, created_date, modified_by, modified_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $result = $this->db->query($query, array($data['training_section_id'], $data['sub_section_name'], $data['video_file_path'], $data['sort_order'], $data['created_by'], $data['created_date'], $data['modified_by'], $data['modified_date']));
        
        return $result;
        
    }
    
    function get_training_master_details($id) {
        
        $query = "SELECT  TM.* FROM training_master TM WHERE TM.training_master_id = ?";
        
        $result = $this->db->query($query, array($id));
        //  $sql = $this->db->last_query();
        
        // print_r($sql); exit;
        
        return $result->result();
    }
    
    function get_training_section_details($id) {
        
        $query = "SELECT  TS.*, TM.*  FROM training_section TS INNER JOIN training_master TM ON TS.training_master_id = TM.training_master_id WHERE TM.training_master_id = ?";
        
        $result = $this->db->query($query, array($id));
        //  $sql = $this->db->last_query();
        
        // print_r($sql); exit;
        
        return $result->result();
    }
    
    function get_training_section_detail_details($id, $section_id) {
        
        $query = "SELECT TSD.*  FROM training_section_detail TSD INNER JOIN training_section TS ON TSD.training_section_id = TS.training_section_id INNER JOIN training_master TM ON TS.training_master_id = TM.training_master_id WHERE TM.training_master_id = ? AND TS.training_section_id = ?";
        
        $result = $this->db->query($query, array($id, $section_id));
        //  $sql = $this->db->last_query();
        
        // print_r($sql); exit;
        
        return $result->result();
    }
    
    
    function get_complete_course_details($id) {
        
        $query = "SELECT TSD.*, TS.*, TM.*  FROM training_section_detail TSD INNER JOIN training_section TS ON TSD.training_section_id = TS.training_section_id INNER JOIN training_master TM ON TS.training_master_id = TM.training_master_id WHERE TM.training_master_id = ?";
        
        $result = $this->db->query($query, array($id));
        //  $sql = $this->db->last_query();
        
        // print_r($sql); exit;
        
        return $result->result();
    }
    
    
    function add_meeting_details($data) {
        
        $query = "INSERT INTO trainer_meetings (training_master_id, training_section_id, training_section_detail_id, MeetingId, ExternalMeetingId, AudioHostUrl, AudioFallbackUrl, ScreenDataUrl, ScreenSharingUrl, ScreenViewingUrl, SignalingUrl, TurnControlUrl, MediaRegion, effectiveUri) VALUES (?, ?, ?, ?, ?, ?, ?, ? ,?, ?, ?, ?, ?, ?)";
        
        $result = $this->db->query($query, array($data['training_master_id'], $data['training_section_id'], $data['training_section_detail_id'], $data['MeetingId'], $data['ExternalMeetingId'], $data['AudioHostUrl'], $data['AudioFallbackUrl'], $data['ScreenDataUrl'], $data['ScreenSharingUrl'], $data['ScreenViewingUrl'], $data['SignalingUrl'],$data['TurnControlUrl'], $data['MediaRegion'], $data['effectiveUri']));
        
        return $result;
        
    }
    
    function getTrainingSchedules($id) {
        
        $query = "SELECT  TS.* FROM training_schedule TS WHERE TS.training_master_id = ?";
        
        $result = $this->db->query($query, array($id));
        
        return $result->result();
    }
    
    public function populate_schedule($training_master_id, $start_date, $start_time, $end_time, $no_of_sessions){
        //the below will give all the days, the trainer wants to give training on ex: sunday, tuesday, wednesday etc
        $training_days = $this->db->query("select training_day from training_days where training_master_id = '" . $training_master_id . "' order by training_day");
        
        $today_day = date("w");
        $next_date = $start_date;
        
        $this->insert_into_training_schedule($training_master_id, $next_date, $start_time, $end_time);
        
        $counter = 1;
        while ($counter <= $no_of_sessions) {
            foreach ($training_days->result() as $each_rec) {
                /*$day_num = $each_rec->training_day;
                 $next_day_num = date("w", strtotime($next_date));
                 
                 $date_to_add = date('Y-m-d', strtotime($start_date. ' + 1 days'));
                 if ($day_num > $next_day_num){
                 $next_date += $day_num - $next_day_num;
                 } else {
                 $next_date += 6 + $day_num - $next_day_num + 1;
                 }*/
                
                $counter ++;
                if ($counter <= $no_of_sessions){
                    $this->insert_into_training_schedule($training_master_id, $next_date, $start_time, $end_time);
                }
            }
            
        }
    }
    
    public function insert_into_training_schedule($training_master_id, $next_date, $start_time, $end_time){
        $this->db->trans_start();
        $nextday = date("w", strtotime($next_date));$this->db->query("insert into training_schedule(training_master_id, date, day, start_time, end_time, training_status) values ('" . $training_master_id . "', '" . $next_date . "', '" . $nextday . "', '" . $start_time . "', '" . $end_time . "', 0)");
        $this->db->trans_complete();
    }

    
    
    function add_meeting_attendees_details($data) {
        
        $query = "INSERT INTO meeting_attendees (MeetingId, customer_id, training_master_id, training_section_id, training_section_detail_id, AttendeeId, JoinToken, ExternalUserId, effectiveUri) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $result = $this->db->query($query, array($data['MeetingId'], $data['customer_id'], $data['training_master_id'], $data['training_section_id'], $data['training_section_detail_id'], $data['AttendeeId'], $data['JoinToken'], $data['ExternalUserId'], $data['effectiveUri']));

        return $result;

    }

    function get_training_meetings($id) {

        $query = "SELECT  TM.* FROM trainer_meetings TM WHERE TM.training_master_id = ?";

        $result = $this->db->query($query, array($id));

        return $result->result();
    }

    function get_meeting_id($training_master_id, $training_section_id, $training_section_detail_id) {

        $query = "SELECT  TM.* FROM trainer_meetings TM WHERE TM.training_master_id = ? AND TM.training_section_id = ? AND TM.training_section_detail_id = ?";

        $result = $this->db->query($query, array($training_master_id, $training_section_id, $training_section_detail_id));

        return $result->result();
    }

    function get_AttendeeId($training_master_id, $training_section_id, $training_section_detail_id, $meeting_id, $customer_id) {

        $query = "SELECT * FROM meeting_attendees WHERE training_master_id = ? AND training_section_id = ? AND training_section_detail_id = ? AND MeetingId = ? AND customer_id = ?";

        $result = $this->db->query($query, array($training_master_id, $training_section_id, $training_section_detail_id, $meeting_id, $customer_id));

        return $result->result();
    }

    function get_meeting_details($meeting_id) {

        $query = "SELECT * FROM trainer_meetings WHERE MeetingId = ?";

        $result = $this->db->query($query, array($meeting_id));

        return $result->result();
    }

    function get_attendee_details($meeting_id, $attendee_id, $customer_id) {

        $query = "SELECT * FROM meeting_attendees WHERE MeetingId = ? AND AttendeeId = ? AND customer_id = ?";
 
        $result = $this->db->query($query, array($meeting_id, $attendee_id, $customer_id));

        return $result->result();
    }

    
    
}
