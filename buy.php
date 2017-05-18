<?php require_once ("templates/top.php"); ?>
<div class="content">
		<div class="properties">
			<div class="container">
<?php

if(isset($_GET['id'])&&isset($_GET['item'])&&isset($_GET['count'])){
	$subscribers= mysql_query("SELECT * FROM `subscribers`");
	while($row = mysql_fetch_array($subscribers)){
		if($_GET['id']==$row['id']){
			$name=$row['name'];
			$surname=$row['surname'];
			$mail=$row['email'];
		}	
	}
}

echo $name." ".$surname.", с вами свяжутся, на вашу почту (".$mail.") будет отправлено письмо для уточнения адреса и типа доставки";

$model=$_GET['item'];
$count=$_GET['count'];

$f = fopen("buy.txt", "a+");  

fwrite($f," \n Кому послано: $name $surname $mail"); 
 
fwrite($f,"\n Модель: $model Количество: $count"); 
 
fwrite($f,"\n ---------------"); 
 
fclose($f); 

unset($_SESSION["item"]);
unset($_SESSION["count"]);
unset($_SESSION["price"]);

?>
</div>
</div>
</div>			
 <?php require_once ("templates/bottom.php"); ?> 