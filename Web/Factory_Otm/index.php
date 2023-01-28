<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kütüphane Otomasyonu</title>
	<?php include 'stil.php';?>
</head>
<body style="background:#343a40;">
	<?php include 'script.php';?>

	<center><h1 class="text-white">Personel Otomasyonu Giriş</h1></center>


	<div class="col-md-4 mx-auto bg-dark text-white mt-5">

	<form action="islem.php" method="post">
		<input type="hidden" name="islem" value="giris_yap">
		  <div class="mb-3">
		    <label  class="form-label">Kimlik Numarası</label>
		    <input type="text" class="form-control" name="tc">
		  </div>
		  <div class="mb-3">
		    <label  class="form-label">Şifre</label>
		    <input type="password" class="form-control" name="sifre">
		  </div>
		  <div  class="col-md-12 mx-auto mt-4">
		  	<button type="submit" class="btn btn-success col-md-12">Giriş Yap</button>
		  	
		  </div>
 		 
	</form>
</div>

</body>
</html>