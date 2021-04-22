<html>
    <head>
        <title> Crimson Network Developer Test</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
    <body>
		<div class="container-fluid">
			<h1> Menghitung Hasil Pecahan Uang </h1>
			

			<form method="POST" action="no1.php">
				<div class="form-group">
					<label>Total dibutuhkan: </label>
					<input type= "tel" name= "uang" id="uang"><br><br>
					<label>Stok Pecahan 20 rb: </label>
					<input type= "tel" name= "20"id="20"><br><br>
					<label>Stok Pecahan 50 rb: </label>
					<input type= "tel" name= "50"id="50"><br><br>
					<label>Stok Pecahan 100 rb: </label>
					<input type= "tel" name= "100"id="100"><br><br>
				</div>
				<button type="submit" class="btn btn-primary">Hitung Pecahan</button>
				<button type="reset" class="btn btn-primary">Reset Form</button>
				<button type="button" onClick="location.href=location.href" class="btn btn-primary">Refresh Page</button>
			</form>
			
			<?php
				$tempuang = $_POST["uang"] ?? "";
				$temp100 = $_POST["100"] ?? "";
				$temp50 = $_POST["50"] ?? "";
				$temp20 = $_POST["20"] ?? "";
				
				$dataa = (int)$tempuang % 100000;
				$a = ((int)$tempuang - (int)$dataa) / 100000;
				if ($a <= $temp100){
					$datab = (int)$dataa % 50000;
					$b = ((int)$dataa - (int)$datab) / 50000;

					$datac = (int)$datab % 20000;
					$c = ((int)$datab - (int)$datac) / 20000;

					$sisa = (int)$tempuang - (100000*(int)$a) - (50000*(int)$b) - (20000*(int)$c);
					
					if($a == 0 && $b == 0){
						echo "".$c." pecahan 20 rb.<br>";
						echo "Sisa : ".$sisa."<br>";
					}else if($a == 0 && $c == 0){
						echo "".$b." pecahan 50 rb.<br>";
						echo "Sisa : ".$sisa."<br>";
					}else if($b == 0 && $c == 0){
						echo "".$a." pecahan 100 rb.<br>";
						echo "Sisa : ".$sisa."<br>";
					}elseif($a == 0){
						echo "".$b." pecahan 50 rb, ".$c." pecahan 20 rb.<br>";
						echo "Sisa : ".$sisa."<br>";
					}else if($b == 0){
						echo "".$a." pecahan 100 rb, ".$c." pecahan 20 rb.<br>";
						echo "Sisa : ".$sisa."<br>";
					}else if($c == 0){
						echo "".$a." pecahan 100 rb, ".$b." pecahan 50 rb.<br>";
						echo "Sisa : ".$sisa."<br>";
					}else{
						echo "".$a." pecahan 100 rb, ".$b." pecahan 50 rb, ".$c." pecahan 20 rb.<br>";
						echo "Sisa : ".$sisa."<br>";
					}
				}else if($a > $temp100){
					$datab = (int)$temp100 * 100000;
					$b = (int)$datab / 50000;

					$datac = (int)$temp20 * 20000;
					$c = (int)$datac / 20000;

					$sisa = (int)$tempuang - (100000*(int)$temp100) - (50000*(int)$b) - (20000*(int)$c);
					
					if($temp100 != null){
						echo "".$temp100." pecahan 100 rb, ".$b." pecahan 50 rb, ".$c." pecahan 20 rb.<br>";
						echo "Sisa : ".$sisa."<br>";
					}
				}
			?>
		</div>
    </body>
</html>