<!--
==============================================================================
=  Author: CHUA YING WEI                                                     =
=          yingwei1025@gmail.com                                             =
=          Web System Backup Restore Function                                =
==============================================================================
-->

<?php 
$servername = "your server name";
$username = "your server username";
$password = "your server password";
$db = "your database name";
$conn = new mysqli($servername, $username, $password, $db);
if($conn->connect_error){
	echo "Connect Failed!<br>" . $conn->error;
}
//set your timezone , refer to php manual
date_default_timezone_set("Asia/Kuala_Lumpur");
 ?>