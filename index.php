<?php
include_once 'header.php';

echo "<br />\n" .
    "<span class='main'>Welcome to $appname, ";

if ($loggedin) echo "$user, you are logged in.";
else echo "please sign up and/or log in to join in.";
?>

</span><br /></body></html>