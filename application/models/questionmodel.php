<?php
    class questionmodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        function get_question($level) {
                $result = $this->db->get_where('questions', array('level' => $level));
                return $result->first_row();
        }
        
        function get_answer($level) {
                $result = $this->db->get_where('questions', array('level' => $level));
                return $result->first_row()->answer;
        }
        
    }

?>