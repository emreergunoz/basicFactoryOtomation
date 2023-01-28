<?php include 'vt.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Persoenl Verisi Güncelle</title>
	<?php include 'stil.php';?>
</head>
<body style="background:#343a40;">
	<?php include 'menu.php'; ?>
	<?php include 'script.php';?>

	<?php if (($_SESSION['yetki']==1)) {?>

	<?php if(isset($_GET['id'])){

			$id=$_GET['id'] ;
			$tur=$db->query("SELECT * FROM tbl_personel WHERE prsnl_id=$id")->fetch(PDO::FETCH_ASSOC);
			
		}?>

	<div class="container col-6  mx-auto d-grid gap-2	text-light">
		

		<center><h1 style="color: white;">Personel Güncelle</h1></center>
	
		<form action="islem.php" method="post">
			<input type="hidden" name="islem" value="personel_guncelle">
			<input type="hidden" name="id" value="<?$tur['prsnl_id';]?>">
			<div class="row mb-3 mt-5">
				<div class="col-3 mb-3">
					<label>İD</label>
				</div>	
				<div class="col-9">
				<input type="text" class="form-control" name="id" value="<?=$tur['prsnl_id'];?>" readonly=""> 
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-3 mt-1">
					<label>Personel AD</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="ad" value="<?=$tur['prsnl_ad'];?>"required="">	
				</div>	
			</div>
			<div class="row mt-5">
				<div class="col-3 mt-1">
					<label>Personel Soyad</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="soyad" value="<?=$tur['prsnl_syd'];?>"required="">	
				</div>	
			</div>

			<input type="hidden" name="seviye" value="<?=$tur['prsnl_svy'];?>">
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

			
				
			<div class="col-12 d-grid gap-2 mx-auto mt-2">
				<button class="btn btn-success">Personeli Güncelle</button>
			</div>
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


</body>
</html>