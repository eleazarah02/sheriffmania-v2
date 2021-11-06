<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inicio | Sheriffmania</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/logo.png"/>
  <link href="css/bootstrap.css" rel="stylesheet">
    </head>
<body>
	<div class="container">
		<?php include 'menu.php' ?> 