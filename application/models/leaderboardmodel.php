<?php
    class leaderboardmodel extends CI_Model {
        
        function __construct() {
                parent::__construct();
        }
                
        function get_leaderboard() {
                $query = "SELECT idlogin_master, username, userlevel as level, MAX( answered_on ) AS anstime
                            FROM alldata
                            WHERE username <> 'admin'
                            GROUP BY idlogin_master, username, userlevel
                            ORDER BY userlevel DESC, anstime";
                $result = $this->db->query($query);
                $result = $result->result();
                return $result;
        }
        
    }
?>