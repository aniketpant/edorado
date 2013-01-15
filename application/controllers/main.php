<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
        
        public function index() {
                $data['page_title'] = 'Home'; 
                $this->load->model('analyticsmodel', 'analytics');
                $total_participants = $this->analytics->total_participants();
                $data['total_participants'] = $total_participants;
                $level_based = $this->analytics->level_based_analysis();
                $data['level_based'] = $level_based;
                $this->load->view('main', $data);
        }


        public function login() {
                $data['page_title'] = 'Login';
                $this->form_validation->set_error_delimiters('<div class="alert-message error">', '</div>');
                if ($this->form_validation->run('login') == FALSE) //present and validate login form
                {                    
                    $data['error'] = '';
                    $this->load->view('login', $data);
                }
                else
                {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    $checkval = $this->simpleloginsecure->login($username, $password);

                    if ($checkval == FALSE) 
                    {
                        $data['error'] = "Incorrect username or password. Please try again.";
                        $this->load->view('login', $data);
                    }
                    else //successful login
                    {
                        $this->load->model('usermodel', 'user');
                        $this->load->model('settingsmodel', 'settings');
                        $id = $this->user->get_loginid($username);
                        $is_admin = $this->user->is_admin($id);
                        $status = $this->settings->get_status();
                        $newdata = array(
                            'username'  => $username,
                            'logged_in' => TRUE,
                            'loginid'   => $id,
                            'is_admin'  => $is_admin,
                            'status'    => $status
                        );

                        $this->session->set_userdata($newdata);

                        if ($is_admin) {
                            redirect('admin', 'location');
                        } else {
                            redirect('home', 'location');
                        }
                        
                    }
                }
        }
        
        public function register() {
                $data['page_title'] = 'Register';
                $this->form_validation->set_error_delimiters('<div class="alert-message error">', '</div>');
                if ($this->form_validation->run('signup') == FALSE) //present and validate signup form
                {                    
                    $data['error'] = '';
                    $this->load->view('register', $data);
                }
                else
                {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    $checkval = $this->simpleloginsecure->create($username, $password, false);

                    if ($checkval == FALSE) 
                    {
                        $data['error'] = "User already exists";
                        $this->load->view('register', $data);
                    }
                    else //successful registration
                    {      
                        $this->load->model('usermodel', 'user');                                       
                        $id = $this->user->get_loginid($username);
                        
                        $this->user->add_userdetails($id);
                        $this->load->view('success', $data);
                    }
                }
        }
    
        public function leaderboard() {
                $data['page_title'] = 'Leader Board';
                $this->load->model('leaderboardmodel', 'leaderboard');
                $data['leaderboard'] = $this->leaderboard->get_leaderboard();
                $this->load->view('leaderboard', $data);
        }
        
        public function contacts() {
                $data['page_title'] = 'Contacts';
                $this->load->view('contacts', $data);
        }
                
        public function solving() {
                $data['page_title'] = 'How to make your way through E-Dorado?';
                $this->load->view('how-to', $data);
        }

        public function rules() {
                $data['page_title'] = 'Rules';
                $this->load->view('rules', $data);
        }

        public function logout() {            
                $data['page_title'] = "Logged Out";
                $this->simpleloginsecure->logout();
                $this->session->sess_destroy();
                $this->session->set_userdata(array('logged_in' => FALSE));
                $this->load->view('logged_out', $data);        
        }
        
}