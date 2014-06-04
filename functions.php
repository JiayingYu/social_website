<?php
$dbhost = 'localhost';
$dbname = 'socialNetwork';
$dbuser = 'jiaying';
$dbpass = 'warehouse';
$appname = "Jasmine's Nest";

$dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($dblink->connect_errno)
    echo $dblink->connect_error;

function createTable($name, $query) {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br />\n";
}

function queryMysql($query) {
    global $dblink;
    $result = mysqli_query($dblink, $query) or die(mysqli_error($dblink));
    return $result;
}

function destroySession() {
    $_SESSION = array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592999, '/');

    session_destroy();
}

function sanitizeString($var) {
    global $dblink;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysqli_real_escape_string($dblink, $var);
}

function showProfile($user) {
    if (file_exists("$user.jpg"))
        echo "<img src='$user.jpg' align='left' />";

    $result = queryMysql("SELECT * FROM profiles WHERE USER='$user'");

    if(mysqli_num_rows($result)) {
        $row = mysqli_fetch_row($result);
        echo stripslashes($row[1]) . "<br clear='left'/><br />";
    }
}