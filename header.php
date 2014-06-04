<?php //header.php
session_start();
echo "<DOCTYPE html>\n<html>\n<head>\n<script src='OSC.js'></script>\n";
include 'functions.php';

$userstr = ' (Guest)';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = " ($user)";
}
else $loggedin = FALSE;

echo "<title>$appname$userstr</title>\n<link rel='stylesheet'" .
    "href='style.css' type='text/css' />\n" .
    "</head>\n<body><div class='appname'>$appname$userstr</div>\n";

if ($loggedin) {
    echo "<br><ul class='menu'>\n" .
        "<li><a href='members.php?view=$user'>Home</a></li>\n" .
        "<li><a href='members.php'>Members</a></li>\n" .
        "<li><a href='friends.php'>Friends</a></li>\n" .
        "<li><a href='messages.php'>Messages</a></li>\n" .
        "<li><a href='profile.php'>Edit Profile</a></li>\n" .
        "<li><a href='logout.php'>Log out</a></li></ul><br />\n";
}
else {
    echo ("<br /><ul class='menu'>\n" .
        "<li><a href='index.php'>Home</a></li>\n" .
        "<li><a href='signup.php'>Sign up</a></li>\n" .
        "<li><a href='login.php'>Log in</a></li></ul><br />\n".
        "<span class='info'>&#8658; You must be logged in to " .
        "view this page.</span><br /><br />\n");
}