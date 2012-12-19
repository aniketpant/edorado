<?php
    class analyticsmodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        function total_participants() {
                $result = $this->db->get('login_master');
                return $result->num_rows();
        }
        
        function level_based_analysis() {
            $result = $this->db->query('SELECT COUNT(*) as `number_of_participants`, `level` FROM `user_details` WHERE login_master_idlogin_master <> 1 GROUP BY `level` ORDER BY `level` DESC LIMIT 0, 10');
            return $result->result();
        }
    }
?>