<?php
    class settingsmodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
                
        function get_status() {
                $this->db->select('value');
                $result = $this->db->get_where('settings', array('setting' => 'status'));
                return $result->row()->value;
        }
                
        function update_status($status) {
                $this->db->where('setting', 'status');
                $result = $this->db->update('settings', array('value' => $status));
        }
        
    }
?>