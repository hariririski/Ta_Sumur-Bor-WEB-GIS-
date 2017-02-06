<?php
$con = mysqli_connect('localhost', 'root', '', 'sumur_bor');

if (!$con) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING|E_ALL));


?>