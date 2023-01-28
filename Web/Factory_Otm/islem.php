<?php include 'vt.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>İşlem</title>
</head>
<body>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<?php
	if (isset($_POST['islem'])) {//hidden dan veri geldiyse bu çalışcak
		switch ($_POST['islem']) {// islem hidden değişkeneinden geliyor

			case 'giris_yap':
				$tc = $_POST['tc'];
				$sifre=md5($_POST['sifre']);

				$kisi = $db->query("SELECT uye.id, uye.ad, yetki.yetki_ismi, uye.yetki FROM uye INNER JOIN yetki ON uye.yetki=yetki.id WHERE uye.id =\"$tc\" AND uye.sifre =\"$sifre\"")->fetch(PDO::FETCH_ASSOC);
				

				if($kisi) {
					$_SESSION['ad']=$kisi['ad'];
					$_SESSION['yetki']=$kisi['yetki'];?>

					<script type="text/javascript">
						Swal.fire({
						  icon: 'success',
						  title: 'Başarı İle Giriş Yapıldı',
						  text: 'Yönlenidirliyorsunuz',
						  showConfirmButton: false,
						  timer: 3000
						});
					</script>

				<?php

					header('Refresh:1; url=is_kayit.php');
				}else{?>

					<script type="text/javascript">
						Swal.fire({
						  icon: 'error',
						  title: 'Giriş Yapılamadı',
						  text: 'Bilgilerinizi Kontrol Ediniz',
						  showConfirmButton: false,
						  timer: 1000
						});
					</script>
				<?php

				header('Refresh:1; url=index.php');
				}
				//print_r($_SESSION['ad']);die();
					

				break;

			//Bu case Tür Eklemek için
			case 'is_ekle': //hidden ın valuesindeki veride burda kontrol edilir
				$baslik = $_POST['isad'];
				$aciklama=$_POST['issure'];
				$sorgu= $db->prepare("INSERT INTO tbl_hazir_isler(is_ad,id_sure) VALUES (? ,? )");
				$ekle=$sorgu->execute(array($baslik,$aciklama));

				if($ekle){ ?>
					<script type="text/javascript">
						Swal.fire({
						  icon: 'success',
						  title: 'Tür Eklendi',
						  showConfirmButton: false,
						  timer: 1000
						});
					</script>
				<?php 
					}else{ ?>
						<script type="text/javascript">
							Swal.fire({
							  icon: 'error',
							  title: 'Tür Eklenemedi',
							  text:'',
							  showConfirmButton: false,
							  timer: 1000
							});
						</script>
					<?php 
					}
					header('Refresh:1; url=is_hazir.php');
					break;

			//Bu case kitap eklemek için
			case 'personel_ekle':
				$ad = $_POST['ad'];
				$yazar= $_POST['soyad'];
				$turler= $_POST['seviye'];
				
			

				$sorgu= $db->prepare("INSERT INTO tbl_personel (prsnl_ad , prsnl_syd , prsnl_svy) VALUES (? ,? ,? )");

				$ekle=$sorgu->execute(array($ad,$yazar,$turler));

				if($ekle){ ?>
					<script type="text/javascript">
						Swal.fire({
						  icon: 'success',
						  title: 'Personel Eklendi',
						  text:'Yönlendiriliyorsunuz...',
						  showConfirmButton: false,
						  timer: 1900
						});
					</script>

				<?php 
					}else{ ?>
						<script type="text/javascript">
							Swal.fire({
							  icon: 'error',
							  title: 'Personel Eklenemedi',
							  text:'',
							  showConfirmButton: false,
							  timer: 1900
							});
						</script>
					<?php 
						}
					header('Refresh:2; url=is_kayit.php');
					break;

			//Üye Ekleyen Kısım
			case 'uye_ekle':
				$ad = trim($_POST['ad']);
				$soyad= strtoupper(trim($_POST['soyad']));
				$sifre= md5($_POST['sifre']);
				$yetki= $_POST['yetki'];
				//$stok=$_POST['stok'];
				$durum=(isset($_POST['durum'])) ? 1: 0;// bu kullanım ile stok chekboxı seçili durumda yani on dönerken 1 yapıyor, seçili dğeilse null ise 0 yapıyor

				$sorgu= $db->prepare("INSERT INTO uye (ad , soyad , sifre , durum , yetki) VALUES (? ,? ,? ,? ,?)");

				$ekle=$sorgu->execute(array($ad,$soyad,$sifre,$durum,$yetki));

				if($ekle){ ?>
					<script type="text/javascript">
						Swal.fire({
						  icon: 'success',
						  title: 'Üye Eklendi',
						  text:'Yönlendiriliyorsunuz...',
						  showConfirmButton: false,
						  timer: 1900
						});
					</script>

				<?php 
					}else{ ?>
						<script type="text/javascript">
							Swal.fire({
							  icon: 'error',
							  title: 'Üye Eklenemedi',
							  text:'',
							  showConfirmButton: false,
							  timer: 1900
							});
						</script>
					<?php 
						}
					header('Refresh:2; url=uyeler.php');
					break;

			//Bu case kitap güncallemek için
			case 'is_guncelle':
				$id=$_POST['id'];
				$ad=$_POST['isad'];
				$sure=$_POST['issure'];
				
				
				$sorgu= $db->prepare("UPDATE tbl_hazir_isler SET is_ad = ? , id_sure= ? WHERE is_id=?");
				
		
				$update = $sorgu->execute(array($ad,$sure,$id));

				header('Refresh:2; url=is_hazir.php');
				if ($update) { ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'success',
					 	title: 'İş Planı Güncellendi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
					})

					</script>
				<?php }else{ ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'error',
					 	title: 'İş Planı Güncellenemedi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
						})
						</script>
				<?php }
				
				
				break;

			

			//Bu case türleri günceller
			case 'personel_guncelle' :
				$id=$_POST['id'];
				$ad=$_POST['ad'];
				$soyad=$_POST['soyad'];
				$seviye=$_POST['seviye'];
				
				$sorgu=$db->prepare("UPDATE tbl_personel SET prsnl_ad= ?,prsnl_syd= ?,prsnl_svy=? WHERE prsnl_id=?");//soru işareti ile sorgu hazırlama

				$update = $sorgu->execute(array($ad,$soyad,$seviye,$id));
				
				header('Refresh:2; url=personeller.php');
				?>
				<?php if ($update) { ?>
					<script type="text/javascript">
					Swal.fire({
					  	icon: 'success',
					 	title: 'Personel Verisi Güncellendi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
					})
				</script>
				<?php 
					} else { ?>
						<script type="text/javascript">
						Swal.fire({
					  	icon: 'error',
					 	title: 'Personel Verisi Güncellenemedi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
						})
						</script>

				<?php }	
			
			
				break;	
			case 'uye_guncelle':
				$id=$_POST['id'];
				$ad = trim($_POST['ad']);
				$soyad= strtoupper(trim($_POST['soyad']));
				$sifre= md5($_POST['sifre']);
				$yetki= $_POST['yetki'];
				$durum=(isset($_POST['durum'])) ? 1: 0;// bu kullanım ile stok chekboxı seçili durumda yani on dönerken 1 yapıyor, seçili dğeilse null ise 0 yapıyor
				

				$sorgu=$db->prepare("UPDATE uye SET ad= ?,soyad= ?,sifre= ?,yetki= ?, durum= ? WHERE id=$id");//soru işareti ile sorgu hazırlama
				$update = $sorgu->execute(array($ad,$soyad,$sifre,$yetki,$durum));//soru işareti gördüğü yere sırası ile bunlar gelicek

				header('Refresh:2; url=uyeler.php');
				if ($update) { ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'success',
					 	title: 'Üye Verileri Güncellendi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
					})

					</script>
				<?php }else{ ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'error',
					 	title: 'Üye Güncellenemedi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
						})
						</script>
				<?php }
				
				
				break;					
			default:
				// code...
				break;
		}
	} //bunlar post ile gelenler bunun dışında get ile gelenelrid ebakmak lazım



	if (isset($_GET['islem'])&&isset($_GET['id'])) {
		$id=$_GET['id'];
		//Kitap Silinen kısım
		switch ($_GET['islem']) {
			case 'issil':
				$gidecek=$db->prepare("DELETE FROM tbl_hazir_isler WHERE is_id=?");//soru işareti ile ilerde değier alıcak sorguyu hazıraldık prepare hazır sorgu oluşturdu
				$gidecek->execute(array($id));//execute ilede sorguyu doldurup gönderdi 

				header('Refresh:2; url=is_hazirs.php');
				if ($gidecek) { ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'success',
					 	title: 'Kitap Silindi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
					})

					</script>
				<?php }else{ ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'error',
					 	title: 'Kitap Silinemedi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
						})
						</script>
				<?php }
				break;

			//Tur silinen kısım
			case 'personelsil':
				
				
				$gidecek=$db->prepare("DELETE FROM tbl_personel WHERE prsnl_id=?");//soru işareti ile ilerde değier alıcak sorguyu hazıraldık prepare hazır sorgu oluşturdu
				
				$gidecek->execute(array($id));//execute ilede sorguyu doldurup gönderdi 

				header('Refresh:2; url=personeller.php');
				if ($gidecek) { ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'success',
					 	title: 'Personel Çıkarıldı',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
					})

					</script>
				<?php }else{ ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'error',
					 	title: 'Personel Çıkarılamadı',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
						})
						</script>
				<?php }
				break;

			//Üye Silen Kısım
			case 'uyesil' :
				$gidecek=$db->prepare("DELETE FROM uye WHERE id=?");//soru işareti ile ilerde değier alıcak sorguyu hazıraldık prepare hazır sorgu oluşturdu
				$gidecek->execute(array($id));//execute ilede sorguyu doldurup gönderdi 

				header('Refresh:2; url=uyeler.php');
				if ($gidecek) { ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'success',
					 	title: 'Tür Silindi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
					})

					</script>
				<?php }else{ ?>
					<script type="text/javascript">
						Swal.fire({
					  	icon: 'error',
					 	title: 'Tür Silinemedi',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
						})
						</script>
				<?php }
				break;

			case 'cikis':
			
				session_destroy();?>

				<script type="text/javascript">
						Swal.fire({
					  	icon: 'success',
					 	title: 'Çıkış Yapılıyor',
					 	text:'Lütfen Bekleyin , Yönlendiriliyorsunuz....',
					 	showConfirmButton: false,
					 	timer: 1900
					})
				</script> 
				<?php

				header('Refresh:2; url=index.php');

			break;
			default:
				// code...
				break;
		}

	}

	if (isset($_GET['islem'])&&isset($_GET['kitapid'])&&isset($_GET['uyeid'])) {

		$kitapid=$_GET['kitapid'];
		$uyeid=$_GET['uyeid'];

		switch ($_GET['islem']) {
			case 'kirala':
				$kira= $db->prepare("INSERT INTO kira (uye_id, kitap_id) VALUES (? ,? )");
				
				$ekle= $kira->execute(array($uyeid, $kitapid));

				if($ekle){ 
					$db->exec("UPDATE kitaplar SET stok=stok-1 WHERE id=$kitapid");
					$db->exec("UPDATE uye SET izin=0 WHERE id=$uyeid");

					?>

					<script type="text/javascript">
						Swal.fire({
						  icon: 'success',
						  title: 'Kitap Verildi',
						  showConfirmButton: false,
						  timer: 1000
						});
					</script>
				<?php 
					}else{ ?>
						<script type="text/javascript">
							Swal.fire({
							  icon: 'error',
							  title: 'Hata',
							  text:'Lütfen Tekrar Deneyin',
							  showConfirmButton: false,
							  timer: 1000
							});
						</script>
					<?php 
					}
					header('Refresh:1; url=kitaplar.php');

					
				

				break;
			
			case 'kira_al':

			$kiraid=$_GET['kiraid'];

			$iade= $db->prepare("UPDATE kira SET durum= 1 WHERE id= ?");
				
			$al= $iade->execute(array($kiraid));

			if($al){ 
					$db->exec("UPDATE kitaplar SET stok=stok+1 WHERE id=$kitapid");
					$db->exec("UPDATE uye SET izin=1 WHERE id=$uyeid");

					?>

					<script type="text/javascript">
						Swal.fire({
						  icon: 'success',
						  title: 'Kitap Geri Alındı',
						  showConfirmButton: false,
						  timer: 1000
						});
					</script>
				<?php 
					}else{ ?>
						<script type="text/javascript">
							Swal.fire({
							  icon: 'error',
							  title: 'Hata',
							  text:'Kitap Alınamadı',
							  showConfirmButton: false,
							  timer: 1000
							});
						</script>
					<?php 
					}
					header('Refresh:1; url=iadeler.php');

				break;
			default:
				// code...
				break;
		}
	}



$db=null;
	?>

</body>
</html>