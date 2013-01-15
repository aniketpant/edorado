<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
        public function index() 
        {
                if ($this->session->userdata('logged_in')) {
                    $data['loggedin'] = $this->session->userdata('logged_in');
                    $this->load->model('usermodel', 'user');
                    $this->load->model('noticemodel', 'notice');
                    $this->load->model('adminmodel', 'admin');

                    $username = $this->session->userdata('username');
                    $loginid = $this->session->userdata('loginid');
                    $is_complete = $this->user->is_profile_complete($loginid);
                    $data['is_complete'] = $is_complete;
                    $data['username'] = $username;
                    $level = $this->user->get_level($loginid);
                    $notices = $this->notice->get_notice($level+1);
                    $public_notices = $this->notice->get_public_notices();
                    $num_questions = $this->admin->get_total_questions();

                    if ($this->session->userdata('status') == 'running') {
                        if ($level == 85) {
                            redirect('home/complete', 'location');
                        }
                        else if ($level == $num_questions) {
                            redirect('home/wait_for_it', 'location');
                        }
                        else {
                            $data['page_title'] = 'Current Level';
                            $data['notices'] = $notices;
                            $data['public_notices'] = $public_notices;
                            $data['level'] = $level;
                            $this->session->set_userdata(array('current' => $level+1));
                            $this->load->view('user/current', $data);
                        }
                    } else {
                        redirect('home/wait_for_it', 'location');
                    }
                }
                else {
                    redirect('404', 'location');
                }
        }

        public function question() {
                if ($this->session->userdata('logged_in')) {
                    $this->load->model('usermodel', 'user');
                    $this->load->model('questionmodel', 'question');
                    $this->load->model('answermodel', 'answer');
                    $this->load->model('adminmodel', 'admin');

                    $username = $this->session->userdata('username');
                    $loginid = $this->session->userdata('loginid');
                    $level = $this->user->get_level($loginid);
                    $last_answers = $this->answer->get_last_answers($level+1, $loginid);
                    $data['last_answers'] = $last_answers;
                    $num_questions = $this->admin->get_total_questions();

                    if ($level == 85) {
                        redirect('home/complete', 'location');
                    }
                    else if ($level == $num_questions) {
                        redirect('home/wait_for_it', 'location');
                    }
                    else {
                        $data['page_title'] = 'Question #'.($level+1);
                        $data['loggedin'] = $this->session->userdata('logged_in');
                        $data['level'] = $level;
                        $current = $level+1;
                        $question = $this->question->get_question($current);
                        $data['question'] = $question;
                        $this->load->view('user/question', $data);
                    }
                }
                else {
                    redirect('404', 'location');
                }
        }

        public function submitanswer() {
                if ($this->session->userdata('logged_in')) {
                    $username = $this->session->userdata('username');
                    $loginid = $this->session->userdata('loginid');

                    $this->load->model('usermodel', 'user');
                    $this->load->model('questionmodel', 'question');
                    $this->load->model('answermodel', 'answer');

                    $level = $this->user->get_level($loginid);
                    $data['level'] = $level;
                    $current = $level+1;
                    $correct_answer = $this->question->get_answer($current);
                    $answer = $this->input->post('answer');
                    $this->answer->save_answer($answer, $current, $loginid);

                    if ($answer == $correct_answer) {
                        $this->user->update_level($loginid, $level);
                    }
                    redirect('home/question', 'location');
                }
                else {
                    redirect('404', 'location');
                }
        }
        
        public function profile() {
                if ($this->session->userdata('logged_in')) {
                    $data['page_title'] = 'Profile';
                    $this->form_validation->set_error_delimiters('<div class="alert-message error">', '</div>');

                    $this->load->model('usermodel', 'user');
                        
                    $loginid = $this->session->userdata('loginid');
                    $user_data = $this->user->get_user_details($loginid);
                    
                    $data['contact'] = $user_data->contact;
                    $data['email'] = $user_data->email;
                    $data['organisation'] = $user_data->organisation;
                    
                    if ($this->form_validation->run('details') == FALSE) //present and validate login form
                    {                    
                        $data['error'] = '';
                        $this->load->view('user/profile', $data);
                    }
                    else
                    {
                        $contact = $this->input->post('contact');
                        $email = $this->input->post('email');
                        $organisation = $this->input->post('organisation');
                        
                        $update_data = array(
                            'contact'       => $contact,
                            'email'         => $email,
                            'organisation'  => $organisation
                        );
                        if (!is_null($contact) && !is_null($email) && !is_null($organisation)) {
                            $update_data['is_complete'] = 1;
                        }
                        $this->user->update_user_details($loginid, $update_data);
                        redirect('home', 'location');
                    }
                }
                else {
                    redirect('404', 'location');
                }
        }
        
        public function wait_for_it() {
                if ($this->session->userdata('logged_in')) {
                    $data['page_title'] = 'Wait for it';
                    $this->load->helper('date');
                    $data['remaining'] = unix_to_human((human_to_unix('21/01/2013') - now()), TRUE, 'us');
                    $this->load->view('user/wait-for-it', $data);
                }
                else {
                    redirect('404', 'location');
                }
        }

        public function complete() {
                if ($this->session->userdata('logged_in')) {
                    $data['page_title'] = 'Congratulations';
                    $this->load->view('user/completed', $data);
                }
                else {
                    redirect('404', 'location');
                }
        }
    
}