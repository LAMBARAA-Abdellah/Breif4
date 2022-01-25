<?php
session_start();
$id = $_GET['id_p'];
require 'sql.php';
$cnx = new sql();
$prep = $cnx->supprimer($id);
$_SESSION['message'] = "Record has been deleted";
$_SESSION['msg_type'] = "danger";
header("location:dashbord.php");
