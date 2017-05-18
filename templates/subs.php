<?php
$a=$_POST['select'];

$sections= mysql_query("SELECT (email) FROM `subscribers` WHERE (sections_id = '".$a."' OR sections_id LIKE '%".$a.".%' OR sections_id LIKE '%.".$a."')");
while($row =@mysql_fetch_array($sections)){
	
	$email=$row['email'];
	
	echo $email."<br><br>";
	
	require_once ("templates/deliver.php");
}
?>

	
	
	
	