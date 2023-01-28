<?php include 'vt.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kitaplar</title>
	    <?php include 'stil.php';?>

</head>
<body style="background:#343a40;">	
	<?php include 'menu.php'; ?>
	<?php include 'script.php';?>

	<center><h1 style="color: white;">Yapılan İşler</h1></center>
	
	<div class="container  col-md-11 bg-dark"><!--mt üstten boşluk veriri bootstrapde-->

	<?php 
		
		$kitaplar = $db->query('SELECT kayit.kayit_id, tbl_personel.prsnl_ad,tbl_hazir_isler.is_ad, kayit.kayit_baslangic 
		FROM tbl_is_kayit as kayit 
		INNER JOIN tbl_personel ON kayit.prsnl_id_ref = tbl_personel.prsnl_id 
		INNER JOIN tbl_hazir_isler ON kayit.is_id_ref= tbl_hazir_isler.is_id 
		where kayit.kayit_bitis IS NULL 
		ORDER BY kayit.kayit_id ASC;')
		->fetchAll(PDO::FETCH_ASSOC);//iş kayıt tablosunu getirdi 	
	?>
	<table class="table table-striped table-warning table-hover">
		<tr>
			<th>ID</th>
			<th>Personel ADI</th>
			<th>İş Adı</th> 
			<th>Kayıt Başlangıç</th>

		</tr>
		<?php foreach ($kitaplar as $kitap) { ?> <!--foreeach en iyi dizi yazdırmak için-->
			<tr >
				<td><?=$kitap['kayit_id'];?></td>
				<td><?=$kitap['prsnl_ad'];?></td>
				<td><?=$kitap['is_ad'];?></td>
				<td><?=$kitap['kayit_baslangic'];?></td>
				
			</tr>
		<?php } ?>


	</table>

	</div>

	<!------------------------------------------------------------------------------------------------------------->
	<!------------------------------------------------------------------------------------------------------------->
	<!------------------------------------------------------------------------------------------------------------->
	<center><h1 style="color: white;">Bitmiş İşler</h1></center>

	<div class="container  col-md-11 bg-dark"><!--mt üstten boşluk veriri bootstrapde-->

	<?php 
		
		$kitaplar = $db->query('SELECT kayit.kayit_id, tbl_personel.prsnl_ad,tbl_hazir_isler.is_ad, kayit.kayit_baslangic, kayit.kayit_bitis
		FROM tbl_is_kayit as kayit 
		INNER JOIN tbl_personel ON kayit.prsnl_id_ref = tbl_personel.prsnl_id 
		INNER JOIN tbl_hazir_isler ON kayit.is_id_ref= tbl_hazir_isler.is_id 
		where kayit.kayit_bitis IS NOT NULL 
		ORDER BY kayit.kayit_id ASC;')
		->fetchAll(PDO::FETCH_ASSOC);//iş kayıt tablosunu getirdi 	
	?>
	<table class="table table-striped table-warning table-hover">
		<tr>
			<th>ID</th>
			<th>Personel ADI</th>
			<th>İş Adı</th> 
			<th>Kayıt Başlangıç</th>
			<th>Kayıt Bitiş</th>

		</tr>
		<?php foreach ($kitaplar as $kitap) { ?> <!--foreeach en iyi dizi yazdırmak için-->
			<tr >
				<td><?=$kitap['kayit_id'];?></td>
				<td><?=$kitap['prsnl_ad'];?></td>
				<td><?=$kitap['is_ad'];?></td>
				<td><?=$kitap['kayit_baslangic'];?></td>
				<td><?=$kitap['kayit_bitis'];?></td>
				
			</tr>
		<?php } ?>


	</table>

	</div>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
</body>
</html>