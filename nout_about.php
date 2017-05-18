<?php require_once ("templates/top.php"); ?>
<div class="content">
		<div class="properties">
			<div class="container">
<?php 

	if(isset($_GET['id'])){
		
		$input_text = strip_tags($_GET['id']);
		$input_text = htmlspecialchars($input_text);
		$input_text = mysql_escape_string($_GET['id']);
		
		
		
		$result = mysql_query("SELECT * FROM nout");
			
			
			
			while($row = mysql_fetch_array($result)){
				if($row['id']==$input_text){

					$id=$row['id'];
					$firm_id=$row['firm_id'];
					$type_id=$row['type_id'];
					$name=$row['name'];
					$cost=$row['cost'];
					$characteristics=$row['characteristics'];
					$description=$row['description'];
					$image=$row['image'];
					
					$result_firm_unique = mysql_query("SELECT * FROM `section` WHERE id=".$row['firm_id']);
					while($row_firm_unique = mysql_fetch_array($result_firm_unique)){
						$firm=$row_firm_unique['section_name'];
						$result_type_unique = mysql_query("SELECT * FROM `type` WHERE id=".$row['type_id']);
						while($row_type_unique = mysql_fetch_array($result_type_unique)){
							$type=$row_type_unique['type'];
						
						
				
				echo "<p class='bicycle_name_handler'>$firm $name</p>";
				
				echo "<p class='bicycle_type_handler'>$type</p>";
					
					echo "<p class='center'><img src='$image'/></p>";
					
				
				
				echo "<p class='bicycle_price_handler'>Цена: $cost $</p>";
				
						
					
					echo "<p class='description_handler1'><span style='font-size:20px;'><b>Описание:</b></span> <br>$description</p>";
					echo "<p class='description_handler2'><span style='font-size:20px;'><b>Характеристики:</b></span> <br>$characteristics</p>";
					echo "<div style='width:100%; height:1px; clear:both'></div>";
					echo "<br></div>";
					}
				}		
				
			}}
	}
		
			
			
?>
</div>
</div>
</div>			
 <?php require_once ("templates/bottom.php"); ?> 