<?php

class Registration {
	
	public function inputvalidation($data) {
		return $data;
	}
	
    private $db_connection = null;
	
    public $errors = array();
	
    public $messages = array();
	
    public function __construct() {
        if (isset($_POST["register"])) {
            $this->registerNewUser();
        }
    }
	
    private function registerNewUser() {
		$geriDonKodu = 'Bekleyin.. 2 saniye içerisinde önceki sayfaya gideceksiniz. <meta http-equiv="refresh" content="2;URL="javascript:history.back(-1)">';
		$loginEkraninaGitKodu = '3 saniye içerisinde giriş sayfasına yönlendiriliyorsunuz. <meta http-equiv="refresh" content="3;URL=/login.php">';
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Boş kullanıcı adı\n{$geriDonKodu}";
        } elseif (empty($_POST['name'])) {
            $this->errors[] = "Boş ad bilgisi\n{$geriDonKodu}";
        } elseif (empty($_POST['lastname'])) {
            $this->errors[] = "Boş soyad bilgisi\n{$geriDonKodu}";
        } elseif (empty($_POST['tc'])) {
            $this->errors[] = "Boş TC numarası\n{$geriDonKodu}";
        } elseif (empty($_POST['phone'])) {
            $this->errors[] = "Boş telefon numarası\n{$geriDonKodu}";
        } elseif (empty($_POST['adres'])) {
            $this->errors[] = "Boş adres bilgisi\n{$geriDonKodu}";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "Boş Parola\n{$geriDonKodu}";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $this->errors[] = "Parola ve parola tekrarı aynı değil\n{$geriDonKodu}";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $this->errors[] = "Parola en az 6 karakter uzunluğunda olmalı\n{$geriDonKodu}";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $this->errors[] = "Kullanıcı adı 2 karakterden kısa veya 64 karakterden uzun olamaz\n{$geriDonKodu}";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $this->errors[] = "Kullanıcı adı şemaya uymuyor: sadece a-Z ve sayılara izin verilir, 2 ila 64 karakter\n{$geriDonKodu}";
        } elseif (empty($_POST['user_email'])) {
            $this->errors[] = "E-posta boş olamaz\n{$geriDonKodu}";
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "E-posta 64 karakterden uzun olamaz\n{$geriDonKodu}";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "E-posta adresiniz geçerli bir e-posta biçiminde değil\n{$geriDonKodu}";
        } elseif (!empty($_POST['user_name'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }
			
            if (!$this->db_connection->connect_errno) {
				
				$name = $this->inputvalidation($_POST['name']);
				$lastname = $this->inputvalidation($_POST['lastname']);
				$user_email = $this->inputvalidation($_POST['user_email']);
				$user_name = $this->inputvalidation($_POST['user_name']);
				$tc = $this->inputvalidation($_POST['tc']);
				$user_password_new = $this->inputvalidation($_POST['user_password_new']);
				$user_password_repeat = $this->inputvalidation($_POST['user_password_repeat']);
				$phone = $this->inputvalidation($_POST['phone']);
				$adres = $this->inputvalidation($_POST['adres']);
				$tur = $this->inputvalidation($_POST['tur']);
				
                //$user_password = $_POST['user_password_new'];
				
                $user_password_hash = password_hash($user_password_new, PASSWORD_DEFAULT);
				
                $sql = "SELECT * FROM users WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_email . "';";
                $query_check_user_name = $this->db_connection->query($sql);

                if ($query_check_user_name->num_rows == 1) {
                    $this->errors[] = "Üzgünüz, bu kullanıcı adı / e-posta adresi zaten alınmış.\n{$geriDonKodu}";
                }
				else {
					$sql = "INSERT INTO users(user_id, tur, user_name, user_password_hash, user_email, ad, soyad, tc, tel, adres) 
VALUES (null, '" . $tur . "', '" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "', '" . $name . "', '" . $lastname . "', '" . $tc . "', '" . $phone . "', '" . $adres . "');";
                    $query_new_user_insert = $this->db_connection->query($sql);
					
                    if ($query_new_user_insert) {
                        $this->messages[] = "Hesabınız Başarıyla Oluşturuldu. Şimdi giriş yapabilirsiniz.\n{$loginEkraninaGitKodu}";
                    }
					else {
                        $this->errors[] = "Üzgünüz, kaydınız başarısız oldu. Lütfen geri dön ve tekrar dene.\n{$geriDonKodu}";
                    }
                }
            }
			else {
                $this->errors[] = "Üzgünüm, veritabanı bağlantısı yok.\n{$geriDonKodu}";
            }
        }
		else {
            $this->errors[] = "Bilinmeyen bir hata oluştu.\n{$geriDonKodu}";
        }
    }
}
