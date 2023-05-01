<?php
$db = new mysqli("localhost","root","","db_exp_tracker");
if($db->connect_error){
die("connection field" .$db->connect_error);}
?>