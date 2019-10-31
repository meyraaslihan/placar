<?php
include("baglanti.php");

if(empty($_SESSION['user_id']))
	exit("lütfen öncelikle giriş yapın! <a href='login.php'>Giriş Yap</a>");

$Arrayy = $Placar->BringUserData($_SESSION['user_id']);

if(isset($_POST['duzenle'])) {
	$Sorgu = $Placar->UpdateProfileData($_SESSION['user_id'], $_POST['user_email'], $_POST['ad'], $_POST['soyad'], $_POST['tc'], $_POST['tel'], $_POST['adres']);
	exit($Sorgu);
}

include("header.php");
?>

<div class="full-row overlay-1 bg-img-5" id="page-banner">
    <div class="container">
        <div class="row py-60">
            <div class="col-sm-6">
                <h3 class="banner-title text-white text-uppercase">Profil Düzenle</h3>
            </div>
        </div>
    </div>
</div>

<section class="full-row py-80">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="contact-form-1 form-style-1">
					<form method="post" action="" name="registerform">
						<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Ad:</label>
                                    <input class="form-control" id="name" name="ad" placeholder="<?=$Arrayy['ad'];?>" type="text" value="<?=$Arrayy['ad'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Soyad:</label>
                                    <input class="form-control" id="lastname" name="soyad" placeholder="<?=$Arrayy['soyad'];?>" type="text" value="<?=$Arrayy['soyad'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
									<input class="form-control" type="email" placeholder="<?=$Arrayy['user_email'];?>" name="user_email" value="<?=$Arrayy['user_email'];?>" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Kullanıcı Adı:</label>
									<input class="form-control" type="text" placeholder="<?=$Arrayy['user_name'];?>" pattern="[a-zA-Z0-9]{2,64}" name="user_name" value="<?=$Arrayy['user_name'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tc">TC Kimlik No:</label>
                                    <input class="form-control" id="tc" name="tc" placeholder="<?=$Arrayy['tc'];?>" type="number" min="10000000000" max="99999999999" value="<?=$Arrayy['tc'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Parola:</label>
									<input class="form-control" type="password" name="user_password_new" placeholder="Parola" pattern=".{6,}" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Parolayı Tekrarla:</label>
									<input class="form-control" type="password" placeholder="Parolayı Tekrarla" name="user_password_repeat" pattern=".{6,}" autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                   <label for="phone">Telefon Numarası:</label>
                                   <input class="form-control" id="phone" name="tel" placeholder="<?=$Arrayy['tel'];?>" value="<?=$Arrayy['tel'];?>" type="tel">
                               </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Adres:</label>
                                    <textarea class="form-control" name="adres" cols="30" rows="5" placeholder="<?=$Arrayy['adres'];?>"><?=$Arrayy['adres'];?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="duzenle" class="btn btn-default-bg mt-3">Profili Düzenle</button>
                            </div>
                        </div>
					  </form>
				  </div>
			</div>
		</div>
	</div>
</section>

<?php include("footer.php");?>