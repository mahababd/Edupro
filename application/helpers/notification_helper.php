<?php

function get_notification($user_id = NULL, $sender_id = NULL, $status = 1, $arrival_date = NULL, $read_date = NULL, $return_type = NULL)
{

    $ci = &get_instance();

    $ci->db->select("*");
    $ci->db->from('notifications');

    if ($user_id != NULL)
        $ci->db->where('user_id', $user_id);
    else {
        $ci->db->where('user_id', $ci->session->userdata['user_db_id']);
    }

    if ($sender_id != NULL)
        $ci->db->where('user_form', $sender_id);

    if ($arrival_date != NULL)
        $ci->db->where('arrival_date', $arrival_date);

    if ($read_date != NULL)
        $ci->db->where('read_date', $read_date);

    if ($status != NULL)
        $ci->db->where('status', $status);

    $res = $ci->db->get();

    if ($return_type == "array")
        return $res->result();

    if ($res->num_rows > 0) {
        build_notification_popup($res->result());
    } else {
        echo '0';
    }
}

function build_notification_popup($json)
{

    //print_r( $json);

    $total_notification = sizeof($json);

    if ($total_notification > 0) {
        $popup = '<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         <i class="fa fa-bell-o"></i>
                         <span class="label label-warning">' . $total_notification . '</span>
                     </a>
                     <ul class="dropdown-menu" >' .
            '<li class="header">You have ' . $total_notification . ' notifications</li>
                         <li>

                             <ul class="menu">';

        foreach ($json as $js) {

            $popup .= '<li data-notice_id="' . $js->id . '" ' . 'data-notice_url="' . $js->action . '" class="notice-item">
                                <a href="#">
                                    <i class="fa fa-bell-o text-aqua"></i> ' . $js->notic_title . '
                                </a>
                            </li>';
        }


        $popup .=
            '</ul>
                         </li>
                         <li class="footer"><a href="' . base_url() . 'notifications/">View all</a></li></ul>';
    } else {
        $popup = '<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                         <i class="fa fa-bell-o"></i>
                         <span class="label label-warning">' . $total_notification . '</span>
                     </a><ul class="dropdown-menu" ><li class="footer"><a href="' . base_url() . 'notifications/">View all</a></li></ul>';
    }

    echo $popup;
}

function update_status($id)
{
    $ci = &get_instance();
    $data = array(
        'status' => 0,
        'read_date' => date("Y-m-d H:i:s")
    );

    $ci->db->where('id', $id);
    $ci->db->update('notifications', $data);

    //echo $id;
}

function set_notification($notice = NULL, $title = NULL, $action = NULL, $user_id = NULL, $refference_id = NULL, $process = NULL, $sender_id = NULL, $status = 1)
{
    $ci = &get_instance();
    $data = array(
        'user_id ' => $user_id != NULL ? $user_id : NULL,
        'user_form' => $sender_id == NULL ? $ci->session->userdata['user_db_id'] : NULL,
        'notic_title' => $notice != NULL ? $notice : NULL,
        'detail' => $title != NULL ? $title : NULL,
        'action' => $action != NULL ? $action : NULL,
        'status' => $status
    );

    $ci->db->insert('notifications', $data);
    $insert_id = $ci->db->insert_id();

    $map = array(
        'n_id' => $insert_id != NULL ? $insert_id : NULL,
        'r_id' => $refference_id != NULL ? $refference_id : NULL,
        'refference' => $process != NULL ? $process : NULL
    );

    $ci->db->insert('notification_map', $map);
}