<?php

include("baglanti.php");
include("header.php");

if($_GET['aracID']) {
	$aracID = intval($_GET['aracID']); 
	$Getir = $Placar->BringCarDetail( $aracID );
	$KiraVerir = $Placar->AracKiraVerirTarihleriniGetir( $aracID );
	$aracmodel = $Getir['marka']." ".$Getir['model'];
	$vites = $Getir['vites'];
	$gorsel = $Getir['gorsel'];
	$gunluFiyat = $Getir['gunluFiyat'];
	$plaka = $Getir['plaka'];
	$motorGucu = $Getir['motorGucu'];
	$kasaTipi = $Getir['kasaTipi'];
	$yakitTipi = $Getir['yakitTipi'];
	$renk = $Getir['renk'];
	$yil = $Getir['yil'];
	$ilanBasTarihi = $KiraVerir['ilanBasTarihi'];
	$ilanBitTarihi = $KiraVerir['ilanBitTarihi'];
}
else {
	exit();
}
?>
<!-- Başlık -->
<div class="full-row overlay-1 bg-img-5" id="page-banner">
    <div class="container">
        <div class="row py-60">
            <div class="col-sm-6">
                <h3 class="banner-title text-white text-uppercase"><?php echo $aracmodel; ?></h3>
            </div>
            <div class="col-sm-6">
                <ul class="pages-link">
                    <li><a href="#">Araçlar</a></li>
                    <li>/</li>
                    <li><?php echo $aracmodel; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Başlık Sonu -->

<section class="full-row bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="room-item-details">
					<div class="img-slide">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">
							<div class="carousel-item active">
							  <img src="<?=$gorsel;?>" alt="Image not found!">
							</div>
							<div class="carousel-item">
							  <img src="<?=$gorsel;?>" alt="Image not found!">
							</div>
						  </div>
						  <div class="slider-arrow">
						  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<i class="fas fa-angle-double-left"></i>
							  </a>
							  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<i class="fas fa-angle-double-right"></i>
							  </a>
						  </div>
						</div>
					</div>
					<div class="room-detail-info bg-white">
						<div class="float-left">
						<h3><?php echo $aracmodel; ?></h3>
						</div>
						<div class="float-right text-right">
                            <div class="amount-per-night"><b><?php echo $gunluFiyat;?> TL/</b> <span>Günlük </span></div>
						</div>
					</div>
					<div class="tab-menu-1 mt-4">

					  <!-- Tab panes -->
					  <div class="tab-content">
						<div id="features" class="tab-pane active">
					  	<div class="bg-white p-30 table-style-3">
						  <table>
							  <tbody>
								<tr>
								  <td><span>Vites :</span><?=$vites;?></td>
								  <td><span>Yılı :</span><?=$yil;?></td>
								</tr>
								<tr>
								  <td><span>Kasa Tipi :</span><?=$kasaTipi;?></td>
								  <td><span>Motor Gücü :</span><?=$motorGucu;?></td>
								</tr>
								<tr>
								  <td><span>Renk :</span><?=$renk;?></td>
								  <td><span>Yakit Tipi:</span><?=$yakitTipi;?></td>
								</tr>
							  </tbody>
							</table>
						  </div>
						</div>
					  </div>
					</div>
                    <!--
					<div class="main-title-area mt-4 mb-5">
					  <h2 class="title mb-3">Araç Hakkında Yorumlar</h2>
                    </div>

					  <div class="contact-form-3 bg-white p-5 mt-5">
						  <form class="form-style-1" method="post">
							<div class="row">
							  <div class="col-lg-12">
								<div class="form-group">
								  <textarea class="form-control" name="message" cols="30" rows="5" placeholder="Yorum"></textarea>
								</div>
							  </div>
							  <div class="col-lg-12">
								<button type="submit" class="btn btn-default-bg x-center mt-3">Gönder</button>
							  </div>
							</div>
						  </form>
						</div>
						<div class="all-review mt-5">
						<div class="comment-item mb-30">
							<img src="img/round/12.png" alt="Kullanıcı adı">
							<div class="content">
								<div class="name-date">
									<span>Ad Soyad</span>
									– 03/11/2018
								</div>
								<p>Temiz bir araç.</p>
							</div>
						</div>
						</div>
                    -->
				</div>
			</div>
			<div class="col-lg-4">
				<div class="widget check-form">
<?
if ($login->isUserLoggedIn() == true) {
   echo '<h3>Araç Kirala</h3>
					<form action="kirala.php" method="get">
						<div class="form-group"><input type="date" name="date1" min="'.$ilanBasTarihi.'" max="'.$ilanBitTarihi.'" class="form-control" placeholder="Kiralama Tarihi"></div>
		  				<div class="form-group"><input type="date" name="date2" min="'.$ilanBasTarihi.'" max="'.$ilanBitTarihi.'" class="form-control" placeholder="Bitiş Tarihi"></div>
		  				<input type="text" name="aracID" class="form-control" value="'.$aracID.'" hidden>
		  				<input type="text" name="userID" class="form-control" value="'.$_SESSION['user_id'].'" hidden>
                        <input class="btn btn-default-bg" value="Kontrol Et" type="submit">
					</form>';
}
else {
    echo '<h3>Kiralamak için</h3>
	<a class="btn btn-default-bg ml-2" href="login.php">Giriş Yap</a> <a class="btn btn-default-bg ml-2" href="register.php">Kayıt OL</a> ';
}
?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include("footer.php");?>