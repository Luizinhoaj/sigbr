<?php
    $utf8 = header("Content-Type: text/html; charset=utf-8");
    $link = new mysqli('localhost', 'root', '','sigbr');
    $link->set_charset('utf8');
?>