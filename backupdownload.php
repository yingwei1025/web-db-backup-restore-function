<!--
==============================================================================
=  Author: CHUA YING WEI                                                     =
=          yingwei1025@gmail.com                                             =
=          Web System Backup Restore Function                                =
==============================================================================
-->

<?php
require_once('config.php');



if (isset($_POST['download'])) {



	/* backup the db OR just a table */
	function backup_tables($servername,$username,$password,$db,$tables = '*')
	{
		
		$link = mysqli_connect($servername,$username,$password);
		mysqli_select_db($link,$db);
		
		//get all of the tables
		if($tables == '*')
		{
			$tables = array();
			$result = mysqli_query($link, 'SHOW TABLES');
			while($row = mysqli_fetch_row($result))
			{
				$tables[] = $row[0];
			}
		}
		else
		{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}
		
		//cycle through
		
                $return = '';
		foreach($tables as $table)
		{
			$result = mysqli_query($link, 'SELECT * FROM '.$table);
			$num_fields = mysqli_field_count($link);
			
			// $return.= 'DROP TABLE '.$table.';';
			$return.= 'DROP TABLE IF EXISTS '.$table.';'; //avoid error while uploading backedup database into blank database
			$row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			
			 for ($i = 0; $i < $num_fields; $i++)  
			 {
				while($row = mysqli_fetch_row($result))
				{
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j < $num_fields; $j++) 
					{
						$row[$j] = addslashes($row[$j]);
						$row[$j] = preg_replace("/\n/","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j < ($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			 }
			$return.="\n\n\n";
		}
		
		//save file to the browser (download)
		header("Content-Type: text/plain");
		//declare the file name
		header("Content-Disposition: attachment; filename=\"".'db-backup-'.date('Y-m-d (h.i.s a)').".sql\"");
		header("Content-Length: " . strlen($return));
		header("Content-Transfer-Encoding: binary");
		echo $return;


	}
	backup_tables($servername, $username, $password, $db);
} else {
	echo "Fail:".mysql_error();
}
?>


