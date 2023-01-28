<?php include 'vt.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Personel Ekle</title>
	<?php include 'stil.php';?>
</head>
<body style="background:#343a40;">
	<?php include 'menu.php'; ?>
	<?php include 'script.php';?>

	<center><h1 style="color: white;">Personel Ekle</h1></center>

	<?php if (($_SESSION['yetki']==1)) {?>
		
	

	<div class="container col-md-8 text-light">
		
		<form action="islem.php" method="post">
			<input type="hidden" name="islem" value="personel_ekle">
			<div class="row mt-5">
				<div class="col-3 mt-1">
					<label>Personel AD</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="ad" required="">	
				</div>	
			</div>
			<div class="row mt-2">
				<div class="col-3 mt-2">
					<label>Personel Soyad</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="soyad" required="">	
				</div>	
			</div>
			<div class="row mt-2">
				<div class="col-3 mt-2">
					<label>Personel Seviye</label>	
				</div>

				<div class="col-9">
					<div class="row">
						<div class="col-4">
							<input type="radio" id="1" name="seviye" value="1">
  							<label for="1">1. Seviye</label>
						</div>
						<div class="col-4">
  							<input type="radio" id="2" name="seviye" value="2">
  							<label for="2">2. Seviye</label>
						</div>

						<div class="col-4">
  							<input type="radio" id="3" name="seviye" value="3">
  							<label for="3">3. Seviye</label>
						</div>
					</div>
				</div>	
			</div>
			

			
			<button class="btn btn-success mt-5 col-12">Personel EKle</button>

			
		</form>
	</div>

<?php }else{ ?>
	
		<script type="text/javascript">
				Swal.fire({
				  icon: 'error',
				  title: 'Yetkisiz Giriş',
				  text: 'Bilgilerinizi Kontrol Ediniz',
				  showConfirmButton: false,
				  timer: 1000
				});
		</script>

					

<?php header('Refresh:1; url=index.php');}?>
	

</script>
</body>
</html>