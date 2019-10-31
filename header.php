<!doctype html>
    <html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Placar Araç Kiralama">
    <meta name="keywords" content="placar, rentacar, araç kiralama, araba kiralama">
    <!--<meta name="author" content="Placar">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-4.1.3.min.css">
    <link href="css/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/loaders.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/layerslider.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/default_animation.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/responsive.css">

    <title>Placar Araç Kiralama</title>
</head>
<body>
<!-- Start page loader -->
<!--<div class="preloader bg-primary">
	<div id="tout">
	  <div>
		<div>
		  <div>
		  </div>
		</div>
	  </div>
	</div>
</div> 

<div class="preloader bg-primary">
	<div class="loader-circle">Yükleniyor...</div>
</div>
-->
<div class="preloader bg-default">
    <div id = "cupcake" class = "box">
        <span class = "letter">P</span>
<!--
        <div class = "cupcakeCircle box">
            <div class = "cupcakeInner box">
                <div class = "cupcakeCore box"></div>
            </div>
        </div>
-->
        <span class = "letter box">L</span>
        <span class = "letter box">A</span>
        <span class = "letter box">C</span>
        <span class = "letter box">A</span>
        <span class = "letter box">R</span>
    </div>
</div>

<header class="full-row header-1 nav-on-banner" id="header">
    <div class="top-header text-white icon-default py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="float-left"><i class="fas fa-map-marker-alt"></i><span>Merkez Adresi</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="float-right">
                        <li><i class="fas fa-envelope"></i>destek@placar.tk</li>
                        <li><i class="fas fa-phone"></i>+90-123-456-7890</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-header">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light w-100"> <a class="navbar-brand" href="/"><img src="img/logo/logo.png" alt="PLACAR"  style="width:200px"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Araçlar</a>
                                <ul class="dropdown-menu">
									<?php
									$Array = $Placar->kasaTipiAdlari();
									foreach($Array as $row)
										echo "<li><a class='dropdown-item' href='araclar.php?kasaTipi={$row}'>{$row}</a></li>";
									?>
                                </ul>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="aracekle.php">Aracını Kirala</a> </li>
<?php
if ($login->isUserLoggedIn() == true) {
   echo '
   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Merhaba, '.$_SESSION['user_name'].'</a>
        <ul class="dropdown-menu">
			<li><a class="dropdown-item" href="araclarim.php?sayfa=kiraladigimAraclar">Kiraladığım Araçlar</a></li>
			<li><a class="dropdown-item" href="araclarim.php?sayfa=kiralananAraclarim">Kiralanan Araçlarım</a></li>
			<li><a class="dropdown-item" href="araclarim.php?sayfa=acikIlanlarim">Açık İlanlarım</a></li>
			<li><a class="dropdown-item" href="aracekle.php">Araç İlan Ekle</a></li>
			<li><a class="dropdown-item" href="profilduzenle.php">Profil Düzenle</a></li>
			<li><a class="dropdown-item" href="index.php?logout">Çıkış Yap</a></li>
        </ul>
    </li>
	</ul>';
}
else {
    echo '</ul>
	<a class="btn btn-default-bg ml-2" style="display: inline-block;" href="login.php">Giriş Yap</a> <a class="btn btn-default-bg ml-2" style="display: inline-block;" href="register.php">Kayıt OL</a> ';
}
?>
						</div>
                </nav>
            </div>
        </div>
    </div>
</header>