<?php
    class usermodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        function add_userdetails($id) {
                $arr = array(
                    'login_master_idlogin_master'   => $id
                );
                $query = $this->db->insert('user_details', $arr);
                if ($query) {
                    return FALSE;
                }
                else {
                    return TRUE;
                }
        }

        function get_loginid($username) {
                $result = $this->db->get_where('login_master', array('username' => $username), 1);
                return $result->first_row()->idlogin_master;
        }
        
        function get_level($id) {
                $result = $this->db->get_where('user_details', array('login_master_idlogin_master' => $id));
                return $result->first_row()->level;
        }

        function is_admin($id) {
                $result = $this->db->get_where('user_details', array('login_master_idlogin_master' => $id));
                return $result->first_row()->is_admin?TRUE:FALSE;
        }
        
        function update_level($id, $level) {
                $data = array(
                    'level' => $level+1
                );
                $this->db->where('login_master_idlogin_master', $id);
                $this->db->update('user_details', $data);
                $arr = array(
                    'idlogin_master'    => $id,
                    'level'             => $level
                );
                $result = $this->db->insert('answer_details', $arr);
        }
        
        function get_user_data($id) {
                $result = $this->db->get_where('login_master', array( 'idlogin_master' => $id ));
                return $result->first_row();
        }
        
        function get_user_details($id) {
                $result = $this->db->get_where('user_details', array( 'login_master_idlogin_master' => $id ));
                return $result->first_row();
        }
        
        function update_user_details($id, $data) {
                $this->db->where('login_master_idlogin_master', $id);
                $this->db->update('user_details', $data);
        }
        
        function is_profile_complete($id) {
                $result = $this->db->get_where('user_details', array( 'login_master_idlogin_master' => $id ));
                return $result->first_row()->is_complete;
        }
    }

?>