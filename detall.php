
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trang chu</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<?php
	include "config.php";
	include "db.php";
	
	$Db = new Db;
	$products = $Db -> getAllProducts();
	$protypes = $Db -> getAllProtypes();
	//var_dump($products);
	foreach($products as $value){
	?>
	<div class='sanpham'>
		<img src='<?php echo $value['image'] ?>'>
		<h1>
			<a href='detail.php?id=<?php echo $value['ID'] ?>'>
				<?php echo $value['name']?>
			</a></h1>
		<b>Giá: </b> <span class='gia'><?php echo $value['price'] ?></span><br>
		<p><?php echo $value['description'] ?></p>
	</div>
	<?php } ?>
</body>
</html>
