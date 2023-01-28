<?php include 'vt.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Yetkili Ekle</title>
	<?php include 'stil.php';?>
</head>
<body style="background:#343a40;">
	<?php include 'menu.php'; ?>
	<?php include 'script.php';?>
	<center><h1 style="color: white;">Yetkili Ekle</h1></center>

	<?php if (($_SESSION['yetki']==1)) {?>

	<div class="container col-md-8 text-light">
		
		<form action="islem.php" method="post">
			<input type="hidden" name="islem" value="uye_ekle">
			<div class="row mt-5">
				<div class="col-3 mt-1">
					<label>AD</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="ad" required="">	
				</div>	
			</div>
			<div class="row mt-2">
				<div class="col-3 mt-2">
					<label>Soyad</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="soyad" required="">	
				</div>	
			</div>
			<div class="row mt-2">
				<div class="col-3 mt-2">
					<label>Şifresi</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="sifre" required="">	
				</div>	
			</div>
			<div class="row mt-2">
				<div class="col-3 mt-2">
					<label>Üye Yetkisi</label>	
				</div>
				<?php $yetkiler=$db->query("SELECT * FROM yetki")->fetchALL(PDO::FETCH_ASSOC);?>

				<div class="col-9">
					<select class="form-control" name="yetki">
						<?php foreach ($yetkiler as $ytk) {?>
							<option value="<?=$ytk['id'];?>"><?=$ytk['yetki_ismi'];?></option><!-- id veri tabanında gel,yor bunu yerine foreach de value değerini br artıtırız seçilen option un values,nini alabiliriz-->
						<?php } ?>
					</select>	
				</div>	
			</div>
			<div class="row mt-2">
				<div class="col-3 mt-2">
					<label>Durum</label>	
				</div>
				<div class="col-9">
					<input type="checkbox" class="form-check-input" name="durum" >	
				</div>	
			</div>

			
			<button class="btn btn-success mt-5 col-12">Üye Ekle</button>

			
		</form>
	</div>

<?php }else { ?>
	
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