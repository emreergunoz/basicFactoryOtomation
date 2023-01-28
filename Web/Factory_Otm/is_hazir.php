<?php include 'vt.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HAzır İşler</title>
	    <?php include 'stil.php';?>

</head>
<body style="background:#343a40;">	
	<?php include 'menu.php'; ?>
	<?php include 'script.php';?>

	<center><h1 style="color: white;">Hazır İşler</h1></center>
	
	<div class="container  col-md-11 bg-dark"><!--mt üstten boşluk veriri bootstrapde-->

	<?php 
		
		$iade = $db->query('Select * from tbl_hazir_isler')->fetchAll(PDO::FETCH_ASSOC);//kiatplar tablosunu getirdi 	
		
	?>
	<table class="table table-striped table-warning table-hover">
		<tr>
			<th>İş İD</th>
			<th>İş Adı</th>
			<th>Tahmini Süre (DK)</th>

			<?php if($_SESSION['yetki']==1){?>
			<th>Güncelle</th>
			<th>Sil</th>
			<?php } ?>

		</tr>
		<?php foreach ($iade as $al) { ?> <!--foreeach en iyi dizi yazdırmak için-->
			<tr >
				<td><?=$al['is_id'];?> 
				<td><?=$al['is_ad'];?></td>
				<td><?=$al['id_sure'];?></td>

				<?php if($_SESSION['yetki']==1){?>
				<td class="text-center col-md-1"><a href="guncelleis.php?id=<?=$al['is_id'];?>" class="btn btn-primary d-grid">Güncelle</a></td>
				<td class="text-center col-md-1"><a onClick="deletee(<?=$al['is_id'];?>)" class="btn btn-danger d-grid">Çıkar</td>

				<?php }?>

			</tr>
		<?php } ?>


	</table>

	</div>

	<script type="text/javascript">
    function deletee(id){
        Swal.fire({
          title: 'İş Emrini Silmek Emin misiniz?',
          text: "İş Emri Kaldırılacak!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Evet, Sil!',
          cancelButtonText:'Hayır, İptal Et!'
        }).then((result) => {
          if (result.value) {
              window.location.href='islem.php?islem=issil&id='+id;   //karşıya id diye veri göndeecek bu verid eburda prsnl_id verisi 

          }
        });
    }
</script>
</body>
</html>