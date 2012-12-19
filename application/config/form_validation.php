<?php  if(!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
            'login' => 
                array(
                    array(
                        'field'   => 'username',
                        'label'   => 'Username',
                        'rules'   => 'xss_clean|required'
                      ),
                    array(
                        'field'   => 'password',
                        'label'   => 'Password',
                        'rules'   => 'xss_clean|required'
                      )
            ),
            'admin_login' => 
                array(
                    array(
                        'field'   => 'username',
                        'label'   => 'Username',
                        'rules'   => 'xss_clean|required'
                      ),
                    array(
                        'field'   => 'password',
                        'label'   => 'Password',
                        'rules'   => 'xss_clean|required'
                      )
            ),
            'question' => 
                array(
                    array(
                        'field'   => 'answer',
                        'label'   => 'Answer',
                        'rules'   => 'xss_clean|required'
                      )
            ),
            'signup' => 
                array(
                    array(
                        'field'   => 'username',
                        'label'   => 'Username',
                        'rules'   => 'xss_clean|required'
                      ),
                    array(
                        'field'   => 'password',
                        'label'   => 'Password',
                        'rules'   => 'xss_clean|required|matches[passconf]|min_length[6]'
                      ),
                    array(
                        'field'   => 'passconf',
                        'label'   => 'Confirm Password',
                        'rules'   => 'xss_clean|required'
                    )
            ),
            'details' =>
                array(
                    array(
                        'field'   => 'contact',
                        'label'   => 'Contact',
                        'rules'   => 'xss_clean|required|min_length[10]|max_length[11]'
                    ),
                    array(
                        'field'   => 'email',
                        'label'   => 'Email',
                        'rules'   => 'xss_clean|required|valid_email|is_unique[user_details.email]'
                    ),
                    array(
                        'field'   => 'organisation',
                        'label'   => 'Organisation',
                        'rules'   => 'xss_clean|required'
                    )
                )
        );

/* End of file form_validation.php */
/* Location: /application/config/form_validation.php */ 