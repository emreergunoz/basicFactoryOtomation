
<?php include 'script.php';?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top border border-top-0 border-warning rounded-bottom">
  <div class="container-fluid ">

   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"> 
          <a class="nav-link active" aria-current="page" href="index.php"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active h3" aria-current="page" href="is_kayit.php">İşler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h3">|</a>
        </li>   
        <?php if($_SESSION['yetki']==1||$_SESSION['yetki']==2) { ?>
        <li class="nav-item">
          <a class="nav-link active h4 mt-1" aria-current="page" href="is_hazir.php">Yapılabilir İşler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h3">|</a>
        </li>
        <?php } ?>   
        <li class="nav-item">
          <a class="nav-link  mt-2 h5" aria-current="page" href="personeller.php">Personeller</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mt-1 h4">|</a>
        </li>
         
        <?php if($_SESSION['yetki']==1) { ?>
        
        <li class="nav-item">
          <a class="nav-link  mt-2 h5" aria-current="page" href="add_prsnl.php">Personel Ekle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  mt-1 h4">|</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  mt-2 h5" aria-current="page" href="add_is.php">İş Planı Ekle</a>
          </li>
        </li>
        <li class="nav-item">
          <a class="nav-link  mt-1 h4">|</a>
        </li>
        
         <li class="nav-item">
          <a class="nav-link  mt-2 " aria-current="page" href="add_uye.php">Yetkili Ekle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  mt-1 h4">|</a>
        </li>

        <li class="nav-item">
          <a class="nav-link  mt-2 " aria-current="page" href="uyeler.php">Yetkililer</a>
        </li>
         <?php } ?>

      </ul>

      <ul class="navbar-nav ms-auto">
         <?php if($_SESSION) { ?>

          <div>
            <li class="nav-item ">
           <a class="nav-link h5" aria-current="page" href="#">Hoş Geldin ,<?php echo$_SESSION['ad'];?></a>
          </li> 
          </div>
          <li class="nav-item">
          <a class="nav-link   h5">|</a>
        </li>
          <li class="nav-item">
           <a class="nav-link btn btn-info text-light" aria-current="page" href="islem.php?islem=cikis&id=345" >Çıkış Yap</a>
          </li>  
            
        <?php }else { 
           header('Refresh:1; url=index.php');?>
           <script type="text/javascript">
            Swal.fire({
              icon: 'error',
              title: 'Lütfen Giriş Yapınız',
              showConfirmButton: false,
              timer: 1000
            });
          </script>

      <?php  } ?>

      


        <!-- çalışmayan dropdownlar
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kitaplar
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="kitaplar.php">Kitaplar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="add_ktp.php">Kitap Ekle</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Türler
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="turler.php">Türler</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="add_tur.php">Tür Ekle</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
