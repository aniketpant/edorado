<?php
    class adminmodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        function get_question_data($question_id) {
                $result = $this->db->get_where('questions', array('level' => $question_id));
                return $result->first_row();
        }
        
        function add_question_data($data) {
                $this->db->insert('questions', $data);
        }
        
        function update_question_data($level, $data) {
                $this->db->where('level', $level);
                $this->db->update('questions', $data);
        }
                
        function get_total_questions() {
                $rows = $this->db->count_all('questions');
                return $rows;
        }
                
        function get_total_users() {
                $rows = $this->db->count_all('login_master');
                return $rows;
        }
        
        function get_all_users() {
                $result = $this->db->get('login_master');
                return $result->result();
        }
        
        function get_user_data($user_id) {
                $this->db->order_by('answer_time', 'DESC');
                $result = $this->db->get_where('user_answers', array( 'login_master_idlogin_master' => $user_id ));
                return $result->result();
        }
        
    }
?>