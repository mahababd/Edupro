<?php

# This Admin controller is the base controller for all Controller in this application 
# Created By : Shahed
# Created Date : September 5 2017

class ADMIN_Controller extends CI_Controller {

    private $val;
    private $page_title = null;
    private $page_sub_title = null;
    private $breadcrumbs = array();
    private $user_logged_in = false;
    private $js_files = array();
    private $css_files = array();

    public function __construct() {
        parent::__construct();

        if ($this->config->item('maintenance_mode') == TRUE && $this->session->userdata('user_maintain') != 1) {
            redirect('maintenance');
            die();
        }

        $this->get_user_info();
        //If the user is not loggend in, return to login page
        if (!$this->is_user_logged_in()) {
            redirect('login');
            exit();
        }

        //Checking user role
        $this->get_privilege();

        //Load language
        $this->lang->load('message', 'english');
    }

    public function set_value($key, $val) {
        $this->val[$key] = $val;
    }
    //THIS FUNCTION WILL LOAD CONTAINER WHICH WILL CONTAIN PAGE CONTENT
    public function load_view($view_name) {
        $this->load->view('admin/component/head');
        $this->load->view('admin/component/navigation');
	$this->load->view('admin/component/left_menu');
        $this->load->view('admin/component/container_start');
        $this->load->view($view_name, $this->val);
        $this->load->view('admin/component/container_end');
        $this->load->view('admin/component/footer',array("js"=>$this->js_files));
    }
    //THIS FUNCTION WILL LOAD VIEW WITHOUT HEADER AND FOOTER
    public function load_ajax_view($view_name) {
        $this->load->view($view_name, $this->val);
    }

    //SET THE PAGE MAIN TITLE H1
    public function set_page_title($title = '') {
        $this->page_title = $title;
    }

    //SET THE PAGE SUB TITLE H1
    public function set_page_sub_title($title = '') {
        $this->page_sub_title = $title;
    }

    //SHOW THE PAGE MAIN TITLE H1
    public function get_page_title($title = '') {
        return $this->page_title;
    }

    //SHOW THE PAGE SUB TITLE H1
    public function get_page_sub_title($title = '') {
        return $this->page_sub_title;
    }

    //SETUP BREADCRUMBS FOR PAGE
    public function set_breadcrumbs($title, $link = '') {
        #Functio defination will be writern latter
        #This will call from theme helpaer also
    }

    //LOADING PAGE HEADER SECTION, TOP MENU
    private function load_head() {
        $data['css'] = $this->css_files;
        $data['js'] = $this->js_files;
        $this->load->view('admin_lte/component/head', $data);
    }

    //LOADING PAGE FOOTER SECTION
    private function load_footer() {
        $data['css'] = $this->css_files;
        $data['js'] = $this->js_files;

        return $data;
        //$this->load->view('admin_lte/footer', $data);
    }

    //LOADING PAGE LEFT MENU
    private function load_left_menu() {
        $this->load->view('admin_lte/component/left_aside');
    }

    //LOADING NO PRIVILEGE ERROR PAGE
    private function get_privilege() {

        //get uri
        $uri_segment = $this->uri->segment(1);

        $uri_segment .= ($this->uri->segment(2)) ? '/' . $this->uri->segment(2) : '';


        if (!$this->session->userdata('access_permission')) {
            //set permitted controller to the session
            $this->session->set_userdata('access_permission', $this->auth->get_controller_by_priv_id($this->session->userdata('user_role')));
        }

        //Convert session accesspermission to array and compare it with uri segment

        $permission_array = explode(",", $this->session->userdata('access_permission'));

        //Add extra permission to all user
        $permission_array = array_merge($permission_array, $this->config->item('default_controller_permission'));

        //var_dump($permission_array);
        if (!in_array($uri_segment, $permission_array) && $this->uri->segment(1) != 'ajax' && $this->uri->segment(1) != '') {
            
            //$this->load_view('admin/err/no_privilege');
            exit('You have no privilege to access this area');
        }
    }

    ############################################
    # ------  AUTHENTICATION PROCESS -----------

    private function is_user_logged_in() {
        return ($this->session->userdata('user_logged_in')) ? true : false;
    }

    ############################################
    # ------  USER INFORMATION -----------
    //GETTING USER INFORMATION FROM SESSSION
    public function get_user_info() {
        return $this->session->userdata;
    }

    //SET MESSAGE TO THE VIEW
    public function set_message($message, $type = 'info', $time = 3) {
        $msg_data = array(
            'msg' => $message,
            'type' => $type,
            'delay' => $time
        );
        $this->session->set_flashdata($msg_data);
    }

    //set page spicific js or css
    public function set_js($path, $loc = 'footer') {
        array_push($this->js_files, $path);
    }

    public function css_js($path, $loc = 'footer') {
        array_push($this->css_files, $path);
    }
	
	
	public function get_user_center(){
		return $this->centerid = $_SESSION ['user_center'];
	}

}