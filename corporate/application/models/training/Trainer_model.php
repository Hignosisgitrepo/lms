<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Trainer_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function get_trainer_data($id, $owner) {
        
        $query = "SELECT * FROM training_master WHERE created_by = ? AND owner = ? ORDER BY training_master_id DESC";
        
        $result = $this->db->query($query, array($id, $owner));
        
        return $result->result();
    }
    
    function get_total_lession($id) {
        
        $query = "SELECT COUNT(*) total_lesson FROM training_section_detail TSD INNER JOIN training_section TS ON TSD.training_section_id = TS.training_section_id INNER JOIN training_master TM ON TS.training_master_id = TM.training_master_id WHERE TM.training_master_id = ?";
        
        $result = $this->db->query($query, array($id));
        
        return $result->result();
    }
    
    function insert_into_training_master($data) {
        
        $query = "INSERT INTO training_master (training_name, owner, category_id, training_type, currency_id, price, course_duration, session_duration, no_of_sessions, training_start_date, training_start_time, training_started, created_by, created_date, modified_by, modified_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $result = $this->db->query($query, array($data['training_name'], $data['owner'], $data['category_id'], $data['training_type'], $data['currencies'], $data['price'], $data['course_duration'], $data['session_duration'], $data['no_of_sessions'], $data['training_start_date'],$data['training_start_time'], $data['training_started'], $data['created_by'], $data['created_date'], $data['modified_by'], $data['modified_date']));
        
        $insert_id = $this->db->insert_id();
        
        $data = array('insert_id' => $insert_id,
            'result' => $result);
        
        return $data;
        
    }
    
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
    
    function get_training_section_data($id) {
        
        $query = "SELECT * FROM training_section WHERE training_section_id IN (".$id.") ORDER BY sort_order ASC";
        
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
        
        $query = "INSERT INTO trainer_meetings (training_master_id, training_section_id, training_section_detail_id, MeetingId, AudioHostUrl, AudioFallbackUrl, ScreenDataUrl, ScreenSharingUrl, ScreenViewingUrl, SignalingUrl, TurnControlUrl, MediaRegion, effectiveUri) VALUES (?, ?, ?, ?, ?, ?, ?, ? ,?, ?, ?, ?, ?)";
        
        $result = $this->db->query($query, array($data['training_master_id'], $data['training_section_id'], $data['training_section_detail_id'], $data['MeetingId'], $data['AudioHostUrl'], $data['AudioFallbackUrl'], $data['ScreenDataUrl'], $data['ScreenSharingUrl'], $data['ScreenViewingUrl'], $data['SignalingUrl'],$data['TurnControlUrl'], $data['MediaRegion'], $data['effectiveUri']));
        
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
    
}
