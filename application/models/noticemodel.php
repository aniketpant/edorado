<?php
    class noticemodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
        
        function get_notices() {
                $result = $this->db->get('notices');
                return $result->result();
        }
        
        function get_notice($level) {
                $result = $this->db->get_where('notices', array('level' => $level));
                if ($result->num_rows()) {
                    return $result->result();
                }
                else {
                    return null;
                }
        }

        function get_public_notices() {
                $result = $this->db->get_where('notices', array('level' => 0));
                if ($result->num_rows()) {
                    return $result->result();
                }
                else {
                    return null;
                }
        }
        
        function add_notice($data) {
                $result = $this->db->insert('notices', $data);
        }
        
        function update_notice($data, $idnotice) {
                $this->db->where('idnotice', $idnotice);
                $result = $this->db->update('notices', $data);
        }
        
        function delete_notice($idnotice) {
                $result = $this->db->delete('notices', array( 'idnotice' => $idnotice ));
        }
        
    }
?>