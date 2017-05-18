<?php require_once ("templates/top.php"); ?>
<div class="content">
		<div class="properties">
			<div class="container">
<?php
if(isset($_POST['name'])&&isset($_POST['cost'])&&isset($_POST['firm'])&&isset($_POST['type'])&&isset($_POST['short_description'])&&isset($_POST['description'])&&isset($_POST['characteristics'])){
	
	$postName=$_POST['name'];
	$postCost=$_POST['cost'];
	$postFirm=$_POST['firm'];
	$postType=$_POST['type'];
	$postShort_description=$_POST['short_description'];
	$postDescription=$_POST['description'];
	$postCharacteristics=$_POST['characteristics'];
	
	
	$proverka=0;
	$result = mysql_query("SELECT * FROM `nout`");
	while($rowProverka = mysql_fetch_array($result)){
								
		$nameProverka=$rowProverka['name'];
		$firm_idProverka=$rowProverka['firm_id'];
		if($nameProverka==$postName&&$firm_idProverka==$postFirm){$proverka=1;}
	}
			
	if($proverka==1){
		echo "<h3 style='padding-left:20px;text-align:center;'>Такой товар уже есть!</h3>";
	}
	if($proverka==0){
$uploaddir = 'images/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Добавлено в бд, <a style='cursor:pointer;' href='login.php'>вернуться</a>\n";
	$resultInsert = mysql_query ("INSERT INTO nout(cost, name, firm_id, type_id,characteristics,description,short_description,image) VALUES ('".$postCost."','".$postName."','".$postFirm."','".$postType."','".$postCharacteristics."','".$postDescription."','".$postShort_description."','".$uploadfile."')");
} else {
    echo "Ошибка!\n";
}

	}	

}else{echo "Вы что-то не заполнили, <a style='cursor:pointer;' href='login.php'>вернуться</a>";}

?>
</div>
</div>	</div>	
 <?php require_once ("templates/bottom.php"); ?> 
	
	
	
	