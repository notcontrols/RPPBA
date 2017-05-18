<?php require_once ("templates/top.php"); ?>
<div class="content">
		<div class="properties">
			<div class="container">
<?php 
			
			if(isset($_POST['name'])&&isset($_POST['surname'])&&isset($_POST['email'])&&isset($_POST['password'])&&stristr($_POST['name'], '"') === FALSE&&stristr($_POST['surname'], '"') === FALSE&&stristr($_POST['email'], '"') === FALSE&&stristr($_POST['password'], '"') === FALSE){ 

			$a=0;
			
			$postName=$_POST['name'];
			$postSurname=$_POST['surname'];
			$postPassword=$_POST['password'];
			$postEmail=$_POST['email'];
			
			if(!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is",strtolower($postEmail))){
				$a=1;
				echo "<h3 style='padding-left:20px;text-align:center;'>e-mail введён некорректно!</h3>";
			}
			
			$result= mysql_query("SELECT * FROM subscribers");
			$proverka=0;
			while($row = mysql_fetch_array($result)){
								
				$email=$row['email'];

				if($email==$postEmail){$proverka=1;}
			}
			
			if($proverka==1){
				echo "<h3 style='padding-left:20px;text-align:center;'>Вы уже зарегистрированы!</h3>";
			}
			
			if($proverka==0&&$a==0){
				$resultInsert = mysql_query ("INSERT INTO subscribers(name, surname, email, password) VALUES ('".$postName."','".$postSurname."','".$postEmail."','".$postPassword."')");
				
				unset($_SESSION["user_id"]);
				
				echo "<h3 style='text-align:center;'>Вы зарегистрированы!</h3>";
				
				echo "<div style='text-align:center;'><a style='cursor:pointer;' href='login.php'>Перейти ко входу</a></div>";
				
			}

			} 
			
			
			
			if(!isset($_POST['name'])&&!isset($_POST['surname'])&&!isset($_POST['email'])&&!isset($_POST['password'])){
			?>
			
            <p style="font-weight: bold;text-align: center; font-size:19px;">Введите ваше имя, фамилию, e-mail и придумайте пароль</p>
			
			<form method="post" action="register.php">
			<div class="log_values_left">имя:</div>
			<div class="log_values_right"><input name="name"></div>
			<div style=" width:100%; height:1px; clear:both"></div>
			<div class="log_values_left">фамилия:</div>			
			<div class="log_values_right"><input name="surname"></div>
			<div style=" width:100%; height:1px; clear:both"></div>
			<div class="log_values_left">e-mail</div>
			<div class="log_values_right"><input name="email" type="email"></div>
			<div style=" width:100%; height:1px; clear:both"></div>
			<div class="log_values_left">пароль:</div>
			<div class="log_values_right"><input name="password" type="password"></div>
			<div style=" width:100%; height:1px; clear:both"></div>
			
			<div style="text-align:center;"><input style="font-size:16px; margin-top:20px;" class="send" type="submit" value="зарегистрироваться"></div>
			</form>
			
			<?php  } ?>
</div>
</div>
</div>			
 <?php require_once ("templates/bottom.php"); ?> 