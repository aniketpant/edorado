<?php
    class answermodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
                
        function save_answer($answer, $level, $loginid) {
                $data = array(
                    'login_master_idlogin_master'   => $loginid,
                    'level'                         => $level,
                    'answer_submitted'              => $answer
                );
                $this->db->insert('user_answers', $data);
        }
        
        function get_last_answers($level, $loginid) {
                $this->db->order_by('answer_time', 'desc');
                $this->db->limit(10);
                $result = $this->db->get_where('user_answers', array('level' => $level, 'login_master_idlogin_master' => $loginid));
                if ($result->num_rows() > 0) {
                    return $result->result();
                }
                else {
                    return FALSE;
                }
        }
        
    }
?>