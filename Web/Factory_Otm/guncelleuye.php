<?php include 'vt.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kitap Güncelle</title>
	<?php include 'stil.php';?>
</head>
<body style="background:#343a40;">
	<?php include 'menu.php'; ?>
	<?php include 'script.php';?>

	<?php if (($_SESSION['yetki']==1)) {?>

	<?php if(isset($_GET['id'])){
		$id= $_GET['id'];
		$uyeler=$db->query("SELECT * FROM  uye WHERE id=$id ")->fetch(PDO::FETCH_ASSOC);

	}?>

	<center><h1 style="color: white;">Üye Güncelle</h1></center>

	<div class="container col-8 text-light">
		<form action="islem.php" method="post">
			<input type="hidden" name="islem" value="uye_guncelle">
			<input type="hidden" name="id" value="<?$uyeler['id';]?>">
			<div class="row mb-1 mt-5">
				<div class="col-3 mb-1">
					<label>Üye İD</label>
				</div>	
				<div class="col-9">
					<input type="text" class="form-control" name="id" value="<?=$uyeler['id'];?>"readonly="">	
				</div>
			</div>
			<div class="row mb-2 mt-3">
				<div class="col-3 mb-2">
					<label>Üye Adı</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="ad" value="<?=$uyeler['ad'];?>" required="">	
				</div>	
			</div>
			<div class="row mb-2 mt-3">
				<div class="col-3 mt-2">
					<label>Üye Soyad</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="soyad" value="<?=$uyeler['soyad'];?>" required="">	
				</div>	
			</div>
			<div class="row mb-2 mt-3">
				<div class="col-3 mt-2">
					<label>Şifre</label>	
				</div>
				<div class="col-9">
					<input type="text" class="form-control" name="sifre" value="<?=$uyeler['sifre'];?>" required="">	
				</div>	
			</div>

			<div class="row mb-2 mt-3">
				<?php
					$uyeyetki=$db->query("SELECT * FROM yetki")->fetchAll(PDO::FETCH_ASSOC);
				?>
				<div class="col-3 mt-2">
					<label>Yetki</label>
				</div>	
				<div class="col-9">
					<select name="yetki" class="form-control">
					<?php 
						foreach($uyeyetki as $ytk) { ?>
							<option value="<?=$ytk['id'];?>"
								<?php echo ($uyeler['yetki']==$ytk['id']) ? 'selected' : '' ?>><!-- se.ilen kitanın tur ıd sine denk id deki türü çekti, çekilen veri selected ile seçildi -->
								<?=$ytk['yetki_ismi']; ?>		
							</option>
		    		<?php } ?>
						
					</select>
			</div>
			<div class="row mb-2 mt-3">
				<div class="col-3 mt-2">
					<label>Durum</label>
				</div>	
				<div class="col-9">
					<input type="checkbox" class="form-check-input" name="durum" <?=($uyeler['durum']==1) ? 'checked' : ''; ?> >
				</div>
			</div>
			
			
			<button class="btn btn-success d-grid mb-2 mt-3">Üye Güncelle</button>
			
			
			



			
		</form>
		

	</div>

	<?php }else {?>
	
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

	<!-- <div class="container col-8 text-light">
		
		<form  action="islem.php" method="post">
			<input type="hidden" name="islem" value="uye_guncelle">
			<input type="hidden" name="id" value="<?$uyeler['id';]?>"> Güncellerken id gerek bu yüzden hiiden  ile onuda gönderdirk 
			<div class="row mb-3 mt-5">
				<div class="col-3 mb-3">
					<label>Üye İD</label>
				</div>	
				<div class="col-9">
					<input type="text" class="form-control" name="id" value="<?=$uyeler['id'];?>"readonly="">	
				</div>
			</div>
			<div class="row mb-1 mt-4">
				<div class="col-3 mb-3">
					<label>Üye Adı</label>
				</div>	
				<div class="col-9">
					<input type="text" class="form-control" name="ad"  value="<?=$uyeler['ad'];?>" required="">	
			</div>
			<div class="row mb-1 mt-4">
				<div class="col-3 mb-3">
					<label>Üye Soyad</label>
				</div>	
				<div class="col-9">
					<input type="text" class="form-control" name="soyad" value="<?=$uyeler['soyad'];?>" required="">
			</div>
			<div class="row mb-1 mt-4">
				<div class="col-3 mb-3">
					<label>Şifre</label>
				</div>	
				<div class="col-9">
					<input type="text" class="form-control" name="sifre" value="<?=$uyeler['sifre'];?>" required="">
			</div>
			<div class="row mb-1 mt-4">
				<?php
					$uyeyetki=$db->query("SELECT * FROM yetki")->fetchAll(PDO::FETCH_ASSOC);
				?>
				<div class="col-3 mb-3">
					<label>Yetki</label>
				</div>	
				<div class="col-9">
					<select name="yetki" class="form-control">
					<?php 
						foreach($uyeyetki as $ytk) { ?>
							<option value="<?=$ytk['id'];?>"
								<?php echo ($uyeler['yetki']==$ytk['id']) ? 'selected' : '' ?>> se.ilen kitanın tur ıd sine denk id deki türü çekti, çekilen veri selected ile seçildi 
								<?=$ytk['yetki_ismi']; ?>		
							</option>
		    		<?php } ?>
						
					</select>
			</div>
			<div class="row mb-3 mt-5">
				<div class="col-3 mb-3">
					<label>Durum</label>
				</div>	
				<div class="col-9">
					<input type="checkbox" name="durum" <?=($uyeler['durum']==1) ? 'checked' : ''; ?> >
			</div>
			
			<div class="col-12 d-grid mx-auto">
				<button class="btn btn-success">Üye Güncelle</button>
			</div>
		</form>
	</div>
 -->
</script>
</body>
</html>