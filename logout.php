<?php
session_start();

if(isset($_SESSION['codebook_userid']))
{
    $_SESSION['codebook_userid'] = NULL;
    unset($_SESSION['codebook_userid']);
}
header("Location: login.php");
die;