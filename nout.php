<?php require_once ("templates/top.php"); ?>

	<div class="content">
		<div class="properties">
			<div class="container">
			
<?php 
	if(isset($_SESSION['user_id'])&&isset($_POST['user'])&&$_POST['user']==$_SESSION['user_id']){
	if(isset($_POST['item'])&&isset($_POST['count'])&&isset($_POST['price'])){
	// Название товара
	$_SESSION['item'] = $_POST['item'];
    // Кол-во товара
    $_SESSION['count'] = $_POST['count'];
    // Цена товара
    $_SESSION['price'] = $_POST['price'];
	}
    if(isset($_SESSION['item']) and is_numeric($_SESSION['count'])){
        echo "Вы добавили товар в корзину!".$_SESSION['item']."<br/>";
        echo "Его кол-во ".$_SESSION['count']."<br/>";
        echo "Вы должны заплатить: ".$_SESSION['count'] * $_SESSION['price']." долларов<br/>";
		echo "<a style='padding:2px 5px 2px 5px;border: 2px solid black;margin:5px; border-radius: 3px; font-size:13px; font-weight: bold;texpt-decoration:none; color: black;' href='buy.php?id=".$_SESSION['user_id']."&item=".$_SESSION['item']."&count=".$_SESSION['count']."'>Купить</a><hr/>";
    }
	}
?>	

				<h1>Здесь представлены все наши ноутбуки:</h1>
				<div class="bs-docs-example">
					<table id="grid" class="table table-hover">
						<thead>
							<tr>
							  <th>ноутбук:</th>
							  <th data-type="string">(сорт.) фирма:</th>
							  <th data-type="string">(сорт.) название:</th>
							  <th>описание:</th>
							  <th data-type="number">(сорт.) цена, $:</th>
							  <th>купить:</th>
							</tr>
						</thead>
						<tbody>
							
							<?php 
							$count=0;
							if(isset($_GET['firm'])){$get_firm=$_GET['firm'];$count=1;}
							$nout= mysql_query("SELECT * FROM `nout`  ORDER BY cost");
							
							while($row = mysql_fetch_array($nout)){
		
								$id=$row['id'];
								$firm_id=$row['firm_id'];
								$type_id=$row['type_id'];
								$name=$row['name'];
								$image=$row['image'];
								$cost=$row['cost'];
								$short_description=$row['short_description'];
								$description=$row['description'];
								$characteristics=$row['characteristics'];
								if($count>0){
									$result_firm_unique =mysql_query("SELECT * FROM `section` WHERE (id=".$row['firm_id']." AND section_name='".$get_firm."')");
									}
									else{
								$result_firm_unique =mysql_query("SELECT * FROM `section` WHERE id=".$row['firm_id']);
								}
								while($row_firm_unique =mysql_fetch_array($result_firm_unique)){
									$firm=$row_firm_unique['section_name'];
									$result_type_unique = mysql_query("SELECT * FROM `type` WHERE id=".$row['type_id']);
									while($row_type_unique = mysql_fetch_array($result_type_unique)){
										$type=$row_type_unique['type'];
										
										?>
										
										<tr>
										  <td>
										    <img src="<?php echo $image; ?>">
										  </td>
										  <td>
										    <?php echo $firm." ".$type; ?>
										  </td>
										  <td>
											<?php echo $name; ?>
										  </td>
										  <td>
											<?php echo $short_description; ?><br>
											<a href="nout_about.php?id=<?php echo $id; ?>">Подробнее</a>
										  </td>
										  <td>
											<?php echo $cost; ?>
										  </td>
										  <td>
										  <?php 
										  if(isset($_SESSION['user_id'])){
										  ?>
											<form method="post">
											<input type="hidden" name="price" value="<?php echo $cost;  ?>"/>
											<input type="hidden" name="user" value="<?php echo $_SESSION['user_id']; ?>"/>
											Кол-во товара: <input type="number" name="count" value="1" min="1" max="3" step="1"><br><br>
											Купить этот товар: <input name="item" type="submit" value="<?php echo $name; ?>"/>
											</form>
											<?php 
										  }else{echo "для покупки <a href='login.php'>авторизуйтесь</a>";}
										  ?>
										  </td>
										</tr>
										
										<?php
									}
								}
							
							}
							
							?>

						</tbody>
					</table>
					 <script>
    // сортировка таблицы
    // использовать делегирование!
    // должно быть масштабируемо:
    // код работает без изменений при добавлении новых столбцов и строк

    var grid = document.getElementById('grid');

    grid.onclick = function(e) {
      if (e.target.tagName != 'TH') return;

      // Если TH -- сортируем
      sortGrid(e.target.cellIndex, e.target.getAttribute('data-type'));
    };

    function sortGrid(colNum, type) {
      var tbody = grid.getElementsByTagName('tbody')[0];

      // Составить массив из TR
      var rowsArray = [].slice.call(tbody.rows);

      // определить функцию сравнения, в зависимости от типа
      var compare;

      switch (type) {
        case 'number':
          compare = function(rowA, rowB) {
            return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;
          };
          break;
        case 'string':
          compare = function(rowA, rowB) {
            return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML ? 1 : -1;
          };
          break;
      }

      // сортировать
      rowsArray.sort(compare);

      // Убрать tbody из большого DOM документа для лучшей производительности
      grid.removeChild(tbody);

      // добавить результат в нужном порядке в TBODY
      // они автоматически будут убраны со старых мест и вставлены в правильном порядке
      for (var i = 0; i < rowsArray.length; i++) {
        tbody.appendChild(rowsArray[i]);
      }

      grid.appendChild(tbody);

    }
  </script>
				</div>
			</div>
			</div>
		</div><!-- //container-wrap -->
	</div>
	<!-- //typography -->
	
<?php require_once ("templates/bottom.php"); ?>

