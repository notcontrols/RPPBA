<?php require_once ("templates/top.php"); ?>
<div class="content">
		<div class="properties">
			<div class="container">

<?php 
			
			if(isset($_POST['select'])&&isset($_POST['message'])){
				echo $_POST['select']."<br>".$_POST['message'];
				require_once ("templates/subs.php");
				
			}
			
			if(isset($_GET['a'])&&$_GET['a']=="exit"){
				unset($_SESSION["user_id"]);
			}
			
			if(isset($_GET['sub'])&&$_GET['sub']=="no"&&isset($_SESSION['user_id'])){
				$resultUnsub = mysql_query ("UPDATE `subscribers` SET sections_id='' WHERE id=".$_SESSION['user_id']);
			}
			
			if((isset($_POST['email'])&&isset($_POST['password']))||isset($_SESSION['user_id'])){ 
			
			if(!isset($_SESSION['user_id'])){
			$postPassword=$_POST['password'];
			$postEmail=$_POST['email'];

			$result= mysql_query("SELECT * FROM `subscribers`");
			
			$proverka=0;
			$id=999999999;
			
			while($row = mysql_fetch_array($result)){
								
				$email=$row['email'];
				$password=$row['password'];

				if($email==$postEmail&&$postPassword==$password&&$row['id']!=0){$proverka=1;$id=$row['id'];}else if($email==$postEmail&&$postPassword==$password&&$row['id']==0){$proverka=2;$id=0;}
				
				
			}
			}else{if($_SESSION['user_id']!=0){$proverka=1;$id=$_SESSION['user_id'];}else {$proverka=2;$id=$_SESSION['user_id'];}}
			
			
			
			if($proverka==2){
				
				$_SESSION['user_id'] = $id;
				
				echo"<p style='float:left;'>Вы админ</p>";
				echo "<a style='cursor:pointer; float:right;' href='login.php?a=exit'>выйти</a>";
				?>
				
					<form action= "login.php" method= "POST"> 
						<h1>Рассылка подписчикам:</h1>				  
						<p>Производитель:</p>  
						<select	name='select'>
	
						<?php
							
							$sections= mysql_query("SELECT * FROM `section`");
							while($row = mysql_fetch_array($sections)){
								
								$name=$row['section_name'];
								
								$idSection=$row['id'];
								
								echo "<option value=".$idSection.">$name</option>";
								
							}			
							

						?>	
									
						</select>
									  
						<div style=" width:100%; height:1px; clear:both"></div>
											
						<p>Рассылка:</p>
								
						<div style="text-align: center;">
							<textarea style="width: 100%;" placeholder="Текст рассылки" rows= "7" name= "message"></textarea></p> 
												
							<input type= "submit" value= "Разослать">
						
						</div>
						
					</form>
				<h1>Добавление товара в бд:</h1>	
				
				
					<form enctype="multipart/form-data" action="addProduct.php" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
	<p><b>Название:</b></p>
   <input name="name">
   <p><b>Цена:</b></p>
   <input name="cost">
	<p><b>Фирма:</b></p>
	<?php
		$sections= mysql_query("SELECT * FROM `section`");
			while($rowSection = mysql_fetch_array($sections)){
								$name=$rowSection['section_name'];
								$idSection=$rowSection['id'];
								echo "<input name='firm' type='radio' value=".$idSection.">$name";
			}			
	?>	
	<p><b>Тип:</b></p>
	<?php
		$typeQuery= mysql_query("SELECT * FROM `type`");
			while($rowType = mysql_fetch_array($typeQuery)){
								$type=$rowType['type'];
								$idType=$rowType['id'];
								echo "<input name='type' type='radio' value=".$idType.">$type";
			}			
	?>	
   <p><b>Картинка:</b></p>
   <input name="userfile" type="file" />
   <p><b>Краткое описание:</b></p>
   <input style="width: 100%;" name="short_description">
	<p><b>Описание:</b></p>
	<textarea style="width: 100%;" placeholder="Тут описание" rows= "7" name= "description"></textarea>
	<p><b>Характеристики:</b></p>
	<textarea style="width: 100%;" placeholder="Тут характеристики" rows= "7" name= "characteristics"></textarea>
    <input type="submit" value="Добавить товар" />
	
`				</form>
				
				

				<?php
			}
			
			if($proverka==1){
				
				$_SESSION['user_id'] = $id;
				
				$resultSub= mysql_query("SELECT * FROM `subscribers` WHERE id=".$_SESSION['user_id']);
				
				while($rowSub = mysql_fetch_array($resultSub)){			
				$sections_id=$rowSub['sections_id'];
				$name=$rowSub['name'];
				}
				
				echo "<h3 style='text-align:center;'>Здравствуйте ".$name.", добро пожаловать в личный кабинет</h3>";
				
				echo "<a style='cursor:pointer; float:right;' href='login.php?a=exit'>выйти</a>";
				
				require_once ("templates/send.php");
				
				
				
				
				
				
			}else if($proverka!=2){echo "<h3 style='padding-left:20px;text-align:center;'>Вы ввели некорректные данные</h3>";}
			}
			
			if (isset($_POST['chb'])){
				require_once ("templates/idByDot.php");
				$resultUpdates = mysql_query ("UPDATE `subscribers` SET sections_id='".$text."' WHERE id=".$_SESSION['user_id']);
				?>
<script>
	document.location.href='login.php';
</script>
				<?php
			} 

			
			if(!isset($_SESSION['user_id'])&&!isset($_POST['name'])&&!isset($_POST['surname'])&&!isset($_POST['email'])&&!isset($_POST['password'])){
			?>
				<p style="font-weight: bold;text-align: center; font-size:19px;">Введите ваш e-mail и пароль или <a style="color: blue;" href="register.php">зарегистрируйтесь</a></p>
				
				<form method="post" action="login.php">
				
				<div>e-mail</div>
				<div><input name="email" type="email"></div>
				<div style=" width:100%; height:1px; clear:both"></div>
				<div>пароль:</div>
				<div><input name="password" type="password"></div>
				<div style=" width:100%; height:1px; clear:both"></div>
				
				<div><input style="font-size:16px; margin-top:10px;" class="send" type="submit" value="войти"></div>
				</form>
			<?php } ?>
</div>
</div>	</div>	
 <?php require_once ("templates/bottom.php"); ?> 