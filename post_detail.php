<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Picture/logo2.jpg">
    <link rel="stylesheet" href="font/fontawesome-free-6.1.1-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/giaodien.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/main.js"></script>
    <title>CDA-Food Map Da Nang</title>
</head>
<?php
if(!isset($_SESSION)) {
    session_start();
}

@include 'inc/config.php';
@include 'inc/post_detail_main.php';

