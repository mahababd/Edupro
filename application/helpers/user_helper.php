<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
  
if (!function_exists('get_user_nice_name')) {
    function get_user_nice_name()
    {
        $ci = &get_instance();
        echo $ci->session->userdata('user_nice_name');
    }
}

if (!function_exists('get_user_email')) {

    function get_user_user_email()
    {
        $ci = &get_instance();
        echo $ci->session->userdata('user_email');
    }
}

if (!function_exists('get_user_phone')) {

    function get_user_user_phone($id)
    {
        $result = sci_select_db('fams_user', ['userid' => $id], 'phone');
        echo $result[0]->phone;
    }
}

if (!function_exists('get_user_mobile')) {

    function get_user_user_mobile($id)
    {
        $result = sci_select_db('fams_user', ['userid' => $id], 'mobile');
        echo $result[0]->mobile;
    }
}

if (!function_exists('get_user_fullname')) {
    function get_user_fullname($id)
    {
        $result = sci_select_db('fams_user', ['userid' => $id], 'fullname');
        if ($result <> false) {
            echo $result[0]->fullname;
        } else {
            $result1 = sci_select_db('fams_login', ['id' => $id], 'user_nicename');
            if ($result1 <> false) {
                echo $result1[0]->user_nicename;
            } else {
                echo "";
            }
        }
    }
}

if (!function_exists('get_user_designation')) {
    function get_user_designation($id)
    {
        $result = sci_select_db('fams_user', ['userid' => $id], 'designation');
        if ($result <> false) {
            echo $result[0]->designation;
        } else {
            echo "";
        }
    }
}


if (!function_exists('get_user_location')) {
    function get_user_location($id)
    {
        $result = sci_select_db('fams_user', ['userid' => $id], 'posting_village, posting_upazella, posting_district,posting_postcode');
        echo $result[0]->posting_village . ',' . $result[0]->posting_upazella . ',' . $result[0]->posting_district . ',' . $result[0]->posting_postcode . ', Bangladesh';
    }
}

function get_user_db_id()
{
    $ci = &get_instance();
    echo $ci->session->userdata('user_db_id');
}

function get_user_id()
{
    $ci = &get_instance();
    echo $ci->session->userdata('user_id');
}

function get_user_login_status()
{
    $ci = &get_instance();
    return $ci->session->userdata('user_logged_in');
}

function get_user_permission()
{
    $ci = &get_instance();
    return explode(",", $ci->session->userdata('user_role'));
}

if (!function_exists('get_user_role_name')) {
    function get_user_role_name()
    {
        $ci = &get_instance();
        $result = sci_select_db('fams_role', ['role_id' => $ci->session->userdata('user_role_id')], 'role_name');
        return $result[0]->role_name;
    }
}

if (!function_exists('get_user_role_name_by_id')) {
    function get_user_role_name_by_id($id)
    {
        $ci = &get_instance();
        $result = sci_select_db('fams_role', ['role_id' => $id], 'role_name');
        return $result[0]->role_name;
    }
}