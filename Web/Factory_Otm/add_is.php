<?php include 'vt.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tür Ekle</title>
	<?php include 'stil.php';?>
</head>
<body style="background:#343a40;"> 
	<?php include 'menu.php'; ?>
	<?php include 'script.php';?>

	<center><h1 style="color: white;">İş Planı Ekle</h1></center>

	<?php if (($_SESSION['yetki']==1)) {?>
	

	<div class="container col-md-8 text-light">
		
		<form action="islem.php" method="post">
			<input type="hidden" name="islem" value="is_ekle">
			<div class="input-goup mb-3 mt-5">
				<div class="input-group mb-3">
					<span class="input-group-text" id="bassic-addon1">İş Adı</span>
					<input type="text" class="form-control" name="isad" required="">
					
				</div>
				
			</div>
			<div class="input-goup mb-3">
				<div class="input-group mb-3">
					<span class="input-group-text" id="bassic-addon1">İş Süresi</span>	
					<input class="form-control" name="issure" required="">
				</div>
				
				
			</div>
			<div class="btn btn-success d-grid mb-2 mt-3">
				<button class="btn btn-success">Ekle</button>
			</div>
			
		</form>
	</div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<?php
	/* 
		if(isset($_POST['baslik'])){
		
		}
		*/
	?>
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

</script>
</body>
</html>