<?php
if(!isset($_SESSION)) {
    session_start();
}

@include 'inc/config.php';
@include 'inc/header.php';
@include 'inc/posts_main.php';
@include 'inc/footer.php';
