<?php

include("baglanti.php");

if ($login->isUserLoggedIn() == true) {
	$UserID = $_SESSION['user_id'];
	if($_GET['date1'] && $_GET['date2'] && $_GET['aracID'] && $_GET['userID'])
		exit( $Placar->AracKirala( $_GET['date1'], $_GET['date2'], $_GET['aracID'], $_GET['userID'] ) );
	else
		exit( "Hata bu işlemi gerçekleştiremiyorum! Bekleyin.. 2 saniye içerisinde önceki sayfaya gideceksiniz. <meta http-equiv=\"refresh\" content=\"2;URL=\"javascript:history.back(-1)\">" );
}
else {
	exit("Bu sayfayı görmek için giriş yapmanız gerekmektedir!");
}
?>