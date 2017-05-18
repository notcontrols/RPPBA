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
		if($nameProverka==$postName){$proverka=1;}
	}
			
	if($proverka==1){
		echo "<h3 style='padding-left:20px;text-align:center;'>Вы уже зарегистрированы!</h3>";
	}
$uploaddir = '../images/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Ошибка!\n";
}

echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";
	

}else{echo "Вы что-то не заполнили, <a style='cursor:pointer;' href='../login.php'>вернуться</a>";}

?>
</div>
</div>	</div>	
 <?php require_once ("templates/bottom.php"); ?> 
	
	
	
	