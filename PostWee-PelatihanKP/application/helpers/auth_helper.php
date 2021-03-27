<?php
function logged_in()
{
    $ci = get_instance();
    if ($ci->session->userdata('user_id')) {
        return true;
    } else {
        return false;
    }
}
