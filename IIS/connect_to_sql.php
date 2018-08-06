<?php
DEFINE('DB_USER', 'xmojzi07');
DEFINE('DB_PASS', 'usumto7n');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'xmojzi07');

$dbc = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, null, '/var/run/mysql/mysql.sock')
OR die('Unable to connecto to mysql database :('. mysqli_connect_error());
?>