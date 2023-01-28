<?php session_start();

try{
	$db = new PDO('mysql:host=localhost;dbname=factor_db;charset=utf8mb4','root','');
	//charsetutf8 sayesinde türkeç getirdi
	//bağlantıyı pdo ile yaptık
	//echo'Veri Tabanına Bağlanıldı <br>';
}catch(Exception $e){
	echo'Veri Tabanına Bağlanılamadı';
	echo $e->getMessage();
}

?>