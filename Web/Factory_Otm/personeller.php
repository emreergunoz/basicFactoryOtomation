<?php include 'vt.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Personeller</title>
	   <?php include 'stil.php';?>

</head>
<body style="background:#343a40;">
	<?php include 'menu.php'; ?>
	<?php include 'script.php';?>

	<center><h1 style="color: white;">Personeller</h1></center>
	<hr style="color:white">
	<div class="container col-md-11 bg-dark "><!--mt üstten boşluk veriri bootstrapde-->
	<?php 
		
		$turler = $db->query('SELECT * FROM tbl_personel ')->fetchAll(PDO::FETCH_ASSOC);//kiatplar tablosunu getirdi 	
	?>
	<table class="table table-striped table-light table-hover">
		<tr>
			<th>ID</th>
			<th>Personel Ad</th>
			<th>Personel Soyad</th> 
			<th>Personel Seviye</th>

			<?php if($_SESSION['yetki']==1){?>
			<th>Güncelle</th>
			<th>Sil</th>
			<?php } ?>

		</tr>
		<?php foreach ($turler as $ktptur) { ?> <!--foreeach en iyi dizi yazdırmak için-->
			<tr >
				<td><?=$ktptur['prsnl_id'];?></td>
				<td><?=$ktptur['prsnl_ad'];?></td>
				<td><?=$ktptur['prsnl_syd'];?></td>
				<td><?=$ktptur['prsnl_svy'];?></td>

				<?php if($_SESSION['yetki']==1){?>
				<td class="text-center col-md-1"><a href="guncellepersonel.php?id=<?=$ktptur['prsnl_id'];?>" class="btn btn-primary d-grid">Güncelle</a></td>
				<td class="text-center col-md-1"><a onClick="deletee(<?=$ktptur['prsnl_id'];?>)" class="btn btn-danger d-grid">Çıkar</td>

				<?php }?>
				
			</tr>
		<?php } ?>


	</table>

	</div>
	
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript">
		function deletee(id){
			Swal.fire({
			  title: 'Personeli Çıkark İstediğinizden Emin misiniz?',
			  text: "Personel Çıkarılacak!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Evet, Sil!',
			  cancelButtonText:'Hayır, İptal Et!'
			}).then((result) => {
			  if (result.value) {
			  	window.location.href='islem.php?islem=personelsil&id='+id;   //karşıya id diye veri göndeecek bu verid eburda prsnl_id verisi 

			  }
			});
		}
	</script>
</body>
</html>