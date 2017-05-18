				<!--detail-->
		<div class="details-section">
			<div class="container">
				<div class="details-grids">
					<div class="col-md-3 detail-grid">
						<h3>О НАС:</h3>
						<p>Наши ноутбуки отличаются великолепным дизайном и потрясающей "начинкой", вы приятно удивитесь нашему качеству. В наличии ноутбуки от ведущих фирм мира!</p>
					</div>
					<div class="col-md-3 detail-grid">
						<h3>РАЗДЕЛЫ:</h3>
						<ul>
							<li><a href="index.php">Главная</a></li>
							<li><a href="about.php">О нас</a></li>
							<li><a href="nout.php">Ноутбуки</a></li>
							<li><a href="login.php">Вход</a></li>
						</ul>

					</div>
					<div class="col-md-3 detail-grid">
						<h3>СОЦ. СЕТИ:</h3>
						<ul>
							<li><a href="#">vk</a></li>
							<li><a href="#">facebook</a></li>
							<li><a href="#">instagram</a></li>
							<li><a href="#">google +</a></li>
						</ul>
					</div>
					<div class="col-md-3 detail-grid">
						<form>
							<h3>ФИРМЫ:</h3>
							<?php

				
$sections= mysql_query("SELECT * FROM `section`");
while($row = mysql_fetch_array($sections)){
	
	$name=$row['section_name'];
	$id=$row['id'];$check="";	
	
			echo "<a style='color: white; font-size:17px;' href='nout.php?firm=$name'>$name</a><br>";
}
							
							?>
							
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<!--detail-->
			<div class="footer-section">
				<div class="container">
					<div class="footer-top">
						<p>&copy; Нестерович Никита, 2017</p>
					</div>

				</div>
			</div>
			<!--footer-->

</body>
</html>
