<?php
function permission_check($url) {
    $ci = & get_instance();
    $permission_array = explode(",", $ci->session->userdata('access_permission'));
    if (in_array($url, $permission_array)) {
         return true;
    }
    return false;
}

function permitted_button($permission, $btn_icon = null, $btn_class = null, $btn_id = "", $data = "", $on_click = "", $btn_title = "") {
    if (permission_check($permission)) {
        $btn = '<button title="' . $btn_title . '" class="' . $btn_class . '" data-' . $data . ' onclick="' . $on_click . '">';
        $btn .= '<span class="' . $btn_icon . '" aria-hidden="true"></span>';
        $btn .= '</button>';
        echo $btn;
    }
}