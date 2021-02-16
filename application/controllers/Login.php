<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* * ************************************************* */
// Filename: login.php
// Created By:Shahed
// Change history:
//
// @copyright   Copyright (c) 2018 - 2019, BIT Soft.
// @license An open source application
// @Version     1.0
// Function list: index,process,logout,
//
/* * ************************************************* */

/**
 * Description of login
 *
 * @author shahed
 */
class login extends CI_Controller {

    private $user_id = null;
    private $user_nice_name = null;
    private $user_name = null;

    public function index() {
        if ($this->session->userdata("user_logged_in")) {
            redirect('dashboard');
        }
        // $this->session->sess_destroy();
        $this->load->view('admin/login');
    }

    public function process() {

        $user_name = $this->input->post('em');
        $user_pass = $this->input->post('pass');
        $user_remember = $this->input->post('remember');

        //Store all user data to $user
        $user = $this->auth->check_user_by_email_pass($user_name, $user_pass);

        // var_dump($user);
        //When login is success. Store user information to session and redirect to login
        if ($user) {
            $user_status = $this->auth->userstatus($user->id);
            $role_status = $this->auth->rolestatus($user->user_role);

            if ($user_status == 1 && $role_status == 1) {
                $user_data = array(
                    'user_db_id' => $user->id,
                    'user_id' => $user->employee_id,
                    'user_name' => $user->user_name,
                    'user_nice_name' => $user->user_nicename,
                    'user_role_id' => $user->user_role,
                    'user_email' => $user->user_email,
                    'user_center' => $user->posting_center,
                    'user_logged_in' => TRUE,
                    'user_maintain' => $user->maintanence_mood,
                    'user_role' => $this->auth->get_permission_by_role_id($user->user_role),
                    'user_role_rank' => $this->auth->get_role_rank_by_role_id($user->user_role),
                );
                //var_dump($user_data);
                $action_name = "User Login"; //** log file create**/
                //log_create($action_name, json_encode($user_data));

                if ($user_remember) {
                    $this->session->set_userdata($user_data, 32140800);
                } else {
                    $this->session->set_userdata($user_data);
                }

                redirect('dashboard');
            } else {
                // $this->session->sess_destroy();

                $this->session->set_flashdata('message', 'Your userid/ role is inactivated, please contact with System Admin.');

                redirect('login');
            }
        } //When user is not authorised. Redirect to login page and remove session if stored
        else {
            // $this->session->sess_destroy();

            $this->session->set_flashdata('message', 'Wrong user id, password combination.');

            redirect('login');
        }
    }

    /**
     * logged out
     */
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
