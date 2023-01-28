<?php include'vt.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];;		
		$gidecek=$db->prepare("DELETE FROM kitaplar WHERE id=?");//soru işareti ile ilerde değier alıcak sorguyu hazıraldık prepare hazır sorgu oluşturdu
		$gidecek->execute(array($id));//execute ilede sorguyu doldurup gönderdi d
	}
?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
	Swal.fire({
  	icon: 'success',
 	title: 'Kitap Silindi',
 	text:'Lürfen Bekleyin , Yönlendiriliyorsunuz....',
 	showConfirmButton: false,
 	timer: 2900
})
</script>
<?=header('Refresh:3; url=kitaplar.php');?>
<!--<script type="text/javascript">
			let timerInterval
		Swal.fire({
		  title: 'Otomatik Yönlendirliyorsunuz!',
		  html: 'Yönlendirilmeye <b></b> Milisaniye Kaldı',
		  timer: 2000,
		  timerProgressBar: true,
		  didOpen: () => {
		    Swal.showLoading()
		    const b = Swal.getHtmlContainer().querySelector('b')
		    timerInterval = setInterval(() => {
		      b.textContent = Swal.getTimerLeft()
		    }, 100)
		  },
		  willClose: () => {
		    clearInterval(timerInterval)
		  }
		}).then((result) => {
		  /* Read more about handling dismissals below */
		  if (result.dismiss === Swal.DismissReason.timer) {
		  }
		})
</script>-->

</body>
</html>
	

