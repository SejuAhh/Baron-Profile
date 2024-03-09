<?php
/* Database credentials for MySQLi. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'sql210.infinityfree.com');
define('DB_USERNAME', 'if0_36128661');
define('DB_PASSWORD', '1ujhrq72SF');
define('DB_NAME', 'if0_36128661_profile');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check MySQLi connection
if ($link === false) {
    die("ERROR: Could not connect using MySQLi. " . mysqli_connect_error());
}

?>
