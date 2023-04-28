<?php
$db = new mysqli("localhost","root","","db_tutoring_classes");
if($db->connect_error){
die("connection field" .$db->connect_error);}
?>