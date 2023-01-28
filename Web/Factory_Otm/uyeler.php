<?php include 'vt.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Üyeler</title>
	    <?php include 'stil.php';?>

</head>
<body style="background:#343a40;">	
	<?php include 'menu.php'; ?>
	<?php include 'script.php';?>
	<center><h1 style="color: white;">Yetkililer</h1></center>


	<?php if (($_SESSION['yetki']==1)) {?>
	<hr style="color:white">
	<div class="container  col-md-11 bg-dark"><!--mt üstten boşluk veriri bootstrapde-->

	<?php 
		
		$uyeler = $db->query('SELECT uye.id, uye.ad, uye.soyad, yetki.yetki_ismi,  uye.durum, uye.sifre FROM uye INNER JOIN yetki ON uye.yetki = yetki.id ORDER BY yetki.id ASC')->fetchAll(PDO::FETCH_ASSOC);//kiatplar tablosunu getirdi 	
	?>
	<table class="table table-striped table-light table-hover">
		<tr>
			<th>ID</th>
			<th>Üye Adı</th>
			<th>Üye Soyadı</th> 
			<th>Statü</th>
			<th>Şifre</th>
			<th>Durum</th>
			<th>Güncelle</th>
			<th>Sil</th>
		</tr>
		<?php foreach ($uyeler as $uye) { ?> <!--foreeach en iyi dizi yazdırmak için-->
			<tr >
				<td><?=$uye['id'];?></td>
				<td><?=$uye['ad'];?></td>
				<td><?=$uye['soyad'];?></td>
				<td><?=$uye['yetki_ismi'];?></td>
				<td><?=$uye['sifre'];?></td>
				<td class="text-center"><?=$uye['durum'];?></td>
				<td class="text-center col-md-1"><a href="guncelleuye.php?id=<?=$uye['id'];?>" class="btn btn-primary d-grid">Güncelle</a></td>
				<td class="text-center col-md-1"><a onClick="deletee(<?=$uye['id'];?>)" class="btn btn-danger d-grid">Sil</td><!-- d-grid artık btn-block yerine alanı kaplıyor--><!-- bu şekilde "delete.php?id=<?=$kitapid;?>" bu kullanım ile delete sayfasına id yi hangi aidyi o anda bastığımız rawdaki idyi göndericek-->
			</tr>
		<?php } ?>


	</table>

	</div>
	
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">
		function deletee(id){
			Swal.fire({
			  title: 'Silmek İstediğinize Emin misiniz?',
			  text: "Üye Sonsuza Kadar Silinecek!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Evet, Sil!',
			  cancelButtonText:'Hayır, İptal Et!'
			}).then((result) => {
			  if (result.value) {
			  	window.location.href='islem.php?islem=uyesil&id='+id;//burda veri get ile gidoyor ve kullandığımız yerde islme ve id lazım olduğu için 2 veri gidiyor
			    
			  }
			});
		}
	</script>

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