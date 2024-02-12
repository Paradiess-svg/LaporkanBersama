
<?php
$host = 'localhost';
$user = 'root';
$pw = '';
$db = 'db_pengaduanV2';

$conn = mysqli_connect($host, $user, $pw , $db );

mysqli_select_db($conn, $db);

?>
