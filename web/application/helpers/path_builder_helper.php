<?php

function makePath($path = []) {
    $html = "";

    $i = 0;
    $size = sizeof($path);
    foreach($path as $title => $url) {
        if ($i < $size - 1) {
            $html .= '<li class="breadcrumb-item"><a href="'.$url.'">'.$title.'</a></li>';
        } else {
            $html .= '<li class="breadcrumb-item active" aria-current="page">'.$title.'</a></li>';
        }

        $i++;
    }
    return $html;
}
