<?php 

$text="";

foreach($_POST['chb'] as $key=>$value){
	$text=$text.$value.".";
}

$text = substr($text, 0, -1);

?>
	
	
	
	