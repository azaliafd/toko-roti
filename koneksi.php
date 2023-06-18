<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "toko_roti";

$db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>