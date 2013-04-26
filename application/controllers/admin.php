<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
        public function index() {
                $data['page_title'] = 'Administrator';
                if ($this->input->server('REQUEST_METHOD') === 'POST') {
                    $status = $this->input->post('status');
                    $this->load->model('settingsmodel', 'settings');
                    $this->settings->update_status($status);
                    $this->session->set_userdata(array('status' => $this->settings->get_status()));
                }
                $this->load->view('admin/dashboard', $data);
        }
    
        public function questions() {
                if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('is_admin') == TRUE) {
                    $data['page_title'] = 'All Questions';
                    $this->load->model('adminmodel', 'admin');
                    $num_questions = $this->admin->get_total_questions();
                    $data['num_questions'] = $num_questions;
                    $this->load->view('admin/questions', $data);
                }
                else {
                    $this->session->set_userdata(array('logged_in' => FALSE, 'is_admin' => FALSE));
                    redirect('admin', 'location');
                }
        }
        
        public function show_question($question_id) {
                $this->load->model('adminmodel', 'admin');
                $question_data = $this->admin->get_question_data($question_id);
                $data['question'] = $question_data;
                $this->load->view('admin/show_question', $data);
        }
        
        public function add_question() {
                if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('is_admin') == TRUE) {
                    $data['page_title'] = 'Add Question';
                    $this->form_validation->set_error_delimiters('<div class="alert-message error">', '</div>');
                    if ($this->form_validation->run('question') == FALSE) //present and validate login form
                    {                    
                        $data['error'] = '';
                        $this->load->view('admin/add_question', $data);
                    }
                    else
                    {
                        // echo var_dump(is_dir('./uploads/'));

                        if ( ! $this->upload->do_upload() ) {
                            $error = array('error' => $this->upload->display_errors());
                        } else {
                            $upload_data = $this->upload->data();
                        }

                        $comment = $this->input->post('comment');
                        $answer = $this->input->post('answer');
                        $this->load->model('adminmodel', 'admin');
                        $num_questions = $this->admin->get_total_questions();
                        $question_data = array(
                            'level'         =>  $num_questions+1,
                            'comment'       => $comment,
                            'answer'        => $answer,
                            'image_name'    => $upload_data['file_name'],
                            'image_ext'     => $upload_data['file_ext']
                        );
                        $question_data = $this->admin->add_question_data($question_data);
                        redirect('admin/questions', 'location');
                    }
                }
                else {
                    $this->session->set_userdata(array('logged_in' => FALSE, 'is_admin' => FALSE));
                    redirect('admin', 'location');
                }
        }
        
        public function edit_question($question_id) {
                if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('is_admin') == TRUE) {
                    $data['page_title'] = 'Edit Questions';
                    $this->load->model('adminmodel', 'admin');
                    $question_data = $this->admin->get_question_data($question_id);
                    $data['error'] = '';
                    $data['question'] = $question_data;
                    $this->load->view('admin/edit_question', $data);
                }
                else {
                    $this->session->set_userdata(array('logged_in' => FALSE, 'is_admin' => FALSE));
                    redirect('admin', 'location');
                }
        }
        
        public function update_question() {                            
                if ( ! $this->upload->do_upload())
        		{
        			$error = array('error' => $this->upload->display_errors());
        		}
        		else
        		{
        			$upload_data = $this->upload->data();
        		}
                        
                        $comment = $this->input->post('comment');
                        $answer = $this->input->post('answer');
                        $questionid = $this->input->post('questionid');
                        $question_data = array(
                            'comment'       => $comment,
                            'answer'        => $answer
                        );
        		if ($upload_data['file_name']) {
        			$question_data['image_name'] = $upload_data['file_name'];
        			$question_data['image_ext'] = $upload_data['file_ext'];
        		}
                $this->load->model('adminmodel', 'admin');
                $question_data = $this->admin->update_question_data($questionid, $question_data);
                redirect('admin/questions', 'location');
        }
        
        public function users() {
                if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('is_admin') == TRUE) {
                    $data['page_title'] = 'All Users';
                    $this->load->model('adminmodel', 'admin');
                    $user_data = $this->admin->get_all_users();
                    $total_users = $this->admin->get_total_users();
                    $data['total_users'] = $total_users;
                    $data['user_data'] = $user_data;
                    $data['error'] = '';
                    $this->load->view('admin/all_users', $data);
                }
                else {
                    $this->session->set_userdata(array('logged_in' => FALSE, 'is_admin' => FALSE));
                    redirect('admin', 'location');
                }
        }
        
        public function user_answers($user_id) {
                if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('is_admin') == TRUE) {
                    $data['page_title'] = "User's Answers";
                    $this->load->model('adminmodel', 'admin');
                    $this->load->model('usermodel', 'user');
                    $user_data = $this->admin->get_user_data($user_id);
                    $user_details = $this->user->get_user_data($user_id);
                    $data['error'] = '';
                    $data['user_data'] = $user_data;
                    $data['user_details'] = $user_details;
                    $this->load->view('admin/user_answers', $data);
                }
                else {
                    $this->session->set_userdata(array('logged_in' => FALSE, 'is_admin' => FALSE));
                    redirect('admin', 'location');
                }
        }
        
        public function get_notices() {
                $this->load->model('noticemodel', 'notice');
                $data['notice_data'] = $this->notice->get_notices();
                $this->load->view('admin/get_notices', $data);
        }
        
        public function add_notice() {
                $this->load->model('noticemodel', 'notice');
                $level = $this->input->post('level');
                $notice_type = $this->input->post('notice-type');
                $notice_message = $this->input->post('notice-message');
                $notice_data = array(
                    'level'             => $level,
                    'notice_type'       => $notice_type,
                    'notice_message'    => $notice_message
                );
                $this->notice->add_notice($notice_data);
        }
        
        public function update_notice() {
                $idnotice = $this->input->post('idnotice');
                $level = $this->input->post('level');
                $notice_type = $this->input->post('notice-type');
                $notice_message = $this->input->post('notice-message');
                $data = array(
                    'level'             => $level,
                    'notice_type'       => $notice_type,
                    'notice_message'    => $notice_message
                );
                $this->load->model('noticemodel', 'notice');
                $this->notice->update_notice($data, $idnotice);
        }
        
        public function delete_notice() {
                $idnotice = $this->input->post('idnotice');
                echo $idnotice;
                $this->load->model('noticemodel', 'notice');
                $this->notice->delete_notice($idnotice);
        }

        public function notices() {
                if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('is_admin') == TRUE) {
                    $data['page_title'] = "Manage Notices";
                    $data['error'] = '';
                    $this->load->view('admin/manage_notices', $data);
                }
                else {
                    $this->session->set_userdata(array('logged_in' => FALSE, 'is_admin' => FALSE));
                    redirect('admin', 'location');
                }
        }
}