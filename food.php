<?php
if(!isset($_SESSION)) {
    session_start();
}

@include 'inc/config.php';
@include 'inc/header.php';
@include 'inc/main_food.php';
@include 'inc/footer.php';