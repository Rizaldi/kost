<?php

require_once 'config/Koneksi.php';

$db = new Koneksi();
$koneksi = $db->getConnection();

require_once 'class/Login.php';
require_once 'class/Html.php';

$login = new Login($koneksi);
$html = new html;
if ($login->isUserLogin() == TRUE){
    include "views/dashboard.php";
} else {
    include "views/login.php";
}