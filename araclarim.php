<?php
include("baglanti.php");

if ($login->isUserLoggedIn() == true) {
	$UserID = $_SESSION['user_id'];
	switch($_GET['sayfa']) {
		case 'kiraladigimAraclar':	
			$AraclariGetir = $Placar->kiraladigimAraclar( $UserID );
		break;
		case 'kiralananAraclarim':
			$AraclariGetir = $Placar->kiralananAraclarim( $UserID );
		break;
		case 'acikIlanlarim':
			$AraclariGetir = $Placar->acikIlanlarim( $UserID );
		break;
		case 'ilanKaldir':
			$AracID = $_GET['aracID'];
			$Placar->IlanKaldir( $AracID );
			exit("{$AracID} ID araç ilanlar sayfasından kaldırıldı. İlanlarım sayfasına yölendiriliyorsunuz <meta http-equiv=\"refresh\" content=\"2;URL='araclarim.php?sayfa=acikIlanlarim\">");
		break;
		default:
			exit('Ana sayfa\'ya yönlendiriliyorsunuz. <meta http-equiv="refresh" content="1;URL=/">');
		break;
	}	
}
else {
	exit("Bu sayfayı görmek için giriş yapmanız gerekmektedir!");
}

include("header.php");
?>

<!-- Başlık -->
<div class="full-row overlay-1 bg-img-5" id="page-banner">
  <div class="container">
    <div class="row py-60">
      <div class="col-sm-6">
        <h3 class="banner-title text-white text-uppercase">
		
		<?php
		switch($_GET['sayfa']) {
			case 'kiraladigimAraclar':
				echo "Kiraladığım Araçlar";
			break;
			case 'kiralananAraclarim':
				echo "Kiralanan Araçlarım";
			break;
			case 'acikIlanlarim':
				echo "Şuan Aktif Olan İlanlarım";
			break;
		}	
		?></h3>
      </div>
    </div>
  </div>
</div>
<!-- Başlık Sonu -->

<!-- Araç Sahibi Araçlarını Listele -->
<section class="full-row">
<?php

switch($_GET['sayfa']) {
	case 'kiraladigimAraclar':
		foreach ($AraclariGetir as $row) {
			echo '
					  <div class="container">
						<div class="room-thumb-list-1 hover_zoom bg-white mb-30">
						  <div class="row">
							<div class="col-xl-4 col-lg-4 col-md-5"> 
								<div class="overlay-5 overflow_hidden"><img src="'.$row['gorsel'].'"></div>
							</div>
							<div class="col-xl-6 col-lg-5 col-md-7">
							  <div class="py-3 h-100">
								<div class="room-info">
									<div class="down-line-left mb-3">
										<h5 class="title"><!--<a class="text-primary" href="aracdetay.php?aracID='.$row['id'].'">-->'.$row['marka'].' '.$row['model'].'<!--</a>--></h5>
										<span class="subtext"></span> 
									</div>
									<div id="ozellikler" class="tab-pane active">
										<div class="bg-white p-30 table-style-3">
											<table>
											  <tbody>
												<tr>
												  <td><span>Vites :</span>'.$row['vites'].'</td>
												  <td><span>Yılı :</span>'.$row['yil'].'</td>
												</tr>
												<tr>
												  <td><span>Kasa Tipi :</span>'.$row['kasaTipi'].'</td>
												  <td><span>Yakıt Tipi:</span>'.$row['yakitTipi'].'</td>
												</tr>
											  </tbody>
											</table>
											'.$row['ad'].' '.$row['soyad'].' kişisinin aracını '.$row['kiraladigiTarih'].' ile '.$row['teslimEttigiTarih'].' tarihleri arasında '.$row['gunluFiyat'].' gunluk fiyat karşlığında kiraladınız.
										</div>
									</div>
								</div>
							  </div>
							</div>
							<!--<div class="col-xl-2 col-lg-3">
							  <div class="for-booking">
								<div class="h5 per-night text-primary">'.$row['gunluFiyat'].' TL<small> / Günlük</small></div>
								<a href="aracdetay.php?aracID='.$row['id'].'"><div class="btn btn-default">Görüntüle</div></a>
							  </div>
							</div>-->
						  </div>
						</div>
					  </div>
					';
				}
	break;
	case 'kiralananAraclarim':
		foreach ($AraclariGetir as $row) {
			echo '
					  <div class="container">
						<div class="room-thumb-list-1 hover_zoom bg-white mb-30">
						  <div class="row">
							<div class="col-xl-4 col-lg-4 col-md-5"> 
								<div class="overlay-5 overflow_hidden"><img src="'.$row['gorsel'].'"></div>
							</div>
							<div class="col-xl-6 col-lg-5 col-md-7">
							  <div class="py-3 h-100">
								<div class="room-info">
									<div class="down-line-left mb-3">
										<h5 class="title"><!--<a class="text-primary" href="aracdetay.php?aracID='.$row['id'].'">-->'.$row['marka'].' '.$row['model'].'<!--</a>--></h5>
										<span class="subtext"></span> 
									</div>
									<div id="ozellikler" class="tab-pane active">
										<div class="bg-white p-30 table-style-3">
											<table>
											  <tbody>
												<tr>
												  <td><span>Vites :</span>'.$row['vites'].'</td>
												  <td><span>Yılı :</span>'.$row['yil'].'</td>
												</tr>
												<tr>
												  <td><span>Kasa Tipi :</span>'.$row['kasaTipi'].'</td>
												  <td><span>Yakıt Tipi:</span>'.$row['yakitTipi'].'</td>
												</tr>
											  </tbody>
											</table>
											'.$row['ad'].' '.$row['soyad'].' sizin aracınızı '.$row['kiraladigiTarih'].' ile '.$row['teslimEttigiTarih'].' tarihleri arasında '.$row['gunluFiyat'].' gunluk fiyat karşlığında kiraladı.
										</div>
									</div>
								</div>
							  </div>
							</div>
							<!--<div class="col-xl-2 col-lg-3">
							  <div class="for-booking">
								<div class="h5 per-night text-primary">'.$row['gunluFiyat'].' TL<small> / Günlük</small></div>
								<a href="aracdetay.php?aracID='.$row['id'].'"><div class="btn btn-default">Görüntüle</div></a>
							  </div>
							</div>-->
						  </div>
						</div>
					  </div>
					';
				}
	break;
	case 'acikIlanlarim':
		foreach ($AraclariGetir as $row) {
			echo '
					  <div class="container">
						<div class="room-thumb-list-1 hover_zoom bg-white mb-30">
						  <div class="row">
							<div class="col-xl-4 col-lg-4 col-md-5"> 
								<div class="overlay-5 overflow_hidden"><img src="'.$row['gorsel'].'"></div>
							</div>
							<div class="col-xl-6 col-lg-5 col-md-7">
							  <div class="py-3 h-100">
								<div class="room-info">
									<div class="down-line-left mb-3">
										<h5 class="title"><!--<a class="text-primary" href="aracdetay.php?aracID='.$row['id'].'">-->'.$row['marka'].' '.$row['model'].'<!--</a>--></h5>
										<span class="subtext"></span> 
									</div>
									<div id="ozellikler" class="tab-pane active">
										<div class="bg-white p-30 table-style-3">
											<table>
											  <tbody>
												<tr>
												  <td><span>Vites :</span>'.$row['vites'].'</td>
												  <td><span>Yılı :</span>'.$row['yil'].'</td>
												</tr>
												<tr>
												  <td><span>Kasa Tipi :</span>'.$row['kasaTipi'].'</td>
												  <td><span>Yakıt Tipi:</span>'.$row['yakitTipi'].'</td>
												</tr>
											  </tbody>
											</table>
											 '.$row['gunluFiyat'].' gunluk fiyat karşlığında ilan açıktır.
										</div>
									</div>
								</div>
							  </div>
							</div>
							<div class="col-xl-2 col-lg-3">
							  <div class="for-booking">
								<div class="h5 per-night text-primary">'.$row['gunluFiyat'].' TL<small> / Günlük</small></div>
								<a href="araclarim.php?sayfa=ilanKaldir&aracID='.$row['id'].'" onclick="return confirm(\''.$row['id'].'li '.$row['marka'].' '.$row['model'].' ilanını kaldırmak istediğinizden eminmisiniz?\')"><div class="btn btn-default">İlanı Kaldır</div></a>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					';
				}
	break;
}
		if(empty($AraclariGetir)) {?>
			<section class="full-row">
					  <div class="container">
						<div class="alert alert-danger" role="alert">
						Listenizde araç bulunamadı!
						</div>
					  </div>
					</section>
					
					<section class="full-row">
					</section>
					<section class="full-row">
					</section>
					<?php
		}

?>
</section>
<!--  Araç Sahibi Araçlarını Listele sonu-->


<?php include("footer.php");?>