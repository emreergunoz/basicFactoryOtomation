<?php session_start();
include 'vt.php' 
echo "Çıkış Yapılıyor, Yönlendindiriliyorsunuz";
session_destroy();//sessionı yok ettik bu sayede giren küşünin verileri silindi

header("Refresh:2; url=anasayfa.php");//yönlendirme
$db=null;//$db->null;$db->conneciton=null;$db->conneciton=close;



 ?>