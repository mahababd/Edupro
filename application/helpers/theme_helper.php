<?php
# This helper file is used for load theme related data to the view
# CSS/Script will load using this file

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('load_css')) {

    function load_css($css_file = '', $type = '') {
        $css = '<link rel="stylesheet" ';
        $css .= 'href="' . base_url() . 'theme/' . $css_file . '"';
        $css .= ' />';

        echo $css;
    }

}

if (!function_exists('load_js')) {

    function load_js($js_file = '', $type = '') {
        $js = '<script ';
        $js .= 'src="' . base_url() . 'theme/' . $js_file . '">';
        $js .= '</script>';

        echo $js;
    }

}

if (!function_exists('load_json')) {

    function load_json($json_file = '', $type = '') {
        $js = '<script ';
        $js .= 'src="' . base_url() . 'theme/' . $json_file . '">';
        $js .= '</script>';

        echo $js;
    }

}

if (!function_exists('load_img')) {

    function load_img($img_file = '', $attr = '', $width = '', $height = '') {
        $img = '<img ';
        $img .= 'src="' . base_url() . 'theme/' . $img_file . '"';

        if ($width != '')
            $img .= ' width="' . $width . '"';

        if ($height != '')
            $img .= ' height = "' . $height . '"';

        $img .= ' ' . $attr . " />";

        echo $img;
    }

}

if (!function_exists('page_title')) {

    function page_title() {
        $ci = &get_instance();
        echo $ci->get_page_title();
    }

}

if (!function_exists('page_sub_title')) {

    function page_sub_title() {
        $ci = &get_instance();
        echo $ci->get_page_sub_title();
    }

}

if (!function_exists('breadcrumb')) {

    function breadcrumb() {
        $ci = &get_instance();
        echo $ci->get_page_sub_title();
    }

}

//showing message
if (!function_exists('get_message')) {

    function get_message() {
        $ci = &get_instance();

        $msg = $ci->session->flashdata('msg');
        $info = '<div class="alert alert-';
        $info .= $ci->session->flashdata('type') . '" id="msg">';
        $info .= $ci->session->flashdata('msg') . '</div>';

        $script = '<script>$(document).ready(function(){$("#msg").delay(' . $ci->session->flashdata('delay') * 1000 . ').slideUp("slow");});</script>';


        echo $info, $script;
    }

}

if (!function_exists('load_message')) {
    function load_message($key) {
        $CI = &get_instance();
        return $CI->lang->line($key);
    }
}

if (!function_exists('get_geo_loc')) {
    function get_geo_loc($office_id) {
        $ci = &get_instance();
        $ci->db->select('geo_loc ');
        $ci->db->from('office');
        $ci->db->where('office_id', $office_id);
        $query = $ci->db->get();
        if ($query->num_rows() > 0) {
            $res = $query->result();

            if (is_array($res)) {
                return $res[0]->geo_loc;
            }
        } else {
            return false;
        }
    }
}

if (!function_exists('label')) {
    function label($type) {
        switch ($type) {
            case 'Registered':
                echo '<span class="label label-success">Registered</span>';
                break;
            case 'Allocated':
                echo '<span class="label label-warning">Allocated</span>';
                break;
            case 'Deadstate':
                echo '<span class="label label-danger">Deadstate</span>';
                break;
            case 'Disposed':
                echo '<span class="label label-danger">Disposed</span>';
                break;
            case 'Maintenance':
                echo '<span class="label label-primary">Maintenance</span>';
                break;
            case 'Transfered':
                echo '<span class="label label-info">Transfered</span>';
                break;
            default :
                echo $type;
        }
    }
}

function bdt_format($val) {
    $val = str_split($val);
    var_dump ($val);
    $val=array_reverse($val);
}

function show_badge($class = "default", $msg=null){
    echo "<span class=\"badge badge-$class\">$msg</span>";
}