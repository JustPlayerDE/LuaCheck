<?php

function maininclude()
{
    $o = "";
    $page = "";
    $s = "";
    $sel = "";
    $page = isset($_GET['p']) ? $_GET['p'] : '';
    $s = array();

    $s[] = 'home';
    $s[] = 'check';
    if (!empty($page)) {
        if (in_array($page, $s)) {
            if (file_exists('./include/' . $page . '.php')) {
                $o = $page;
            } else {
                $o = 'home';
            }
        } else {
            $o = 'home';
        }
    } else {
        $o = 'home';
    }
    return $o . '.php';
}
