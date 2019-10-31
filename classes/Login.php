<?php

class Login {
    private $db_connection = null;
	
    public $errors = array();
	
    public $messages = array();
	
    public function __construct() {
        session_start();
		
        if (isset($_GET["logout"])) {
			$this->doLogout();
        }
        elseif (isset($_POST["login"])) {
			$this->dologinWithPostData();
        }
    }
	
    private function dologinWithPostData() {
		$anaSayfaYonlendirmeKodu = '3 saniye içerisinde ana sayfaya yönlendiriliyorsunuz. <meta http-equiv="refresh" content="3;URL=/">';
		$girisSayfasinaYonlendirmeKodu = '3 saniye içerisinde giriş sayfasına yönlendiriliyorsunuz. <meta http-equiv="refresh" content="3;URL=/login.php">';
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Kullanıcı adı alanı boştu. \n{$girisSayfasinaYonlendirmeKodu}";
        }
		elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Şifre alanı boştu. \n{$girisSayfasinaYonlendirmeKodu}";
        }
		elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
			
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error . "\n{$anaSayfaYonlendirmeKodu}";
            }

            if (!$this->db_connection->connect_errno) {
				
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);
				
                $sql = "SELECT user_id, user_name, user_email, user_password_hash
                        FROM users
                        WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                if ($result_of_login_check->num_rows == 1) {

                    $result_row = $result_of_login_check->fetch_object();

                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_id'] = $result_row->user_id;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_login_status'] = 1;

                    }
					else {
                        $this->errors[] = "Yanlış şifre. Tekrar deneyin. \n{$girisSayfasinaYonlendirmeKodu}";
                    }
                }
				else {
                    $this->errors[] = "Böyle bir kullanıcı yoktur. \n{$girisSayfasinaYonlendirmeKodu}";
                }
            }
			else {
                $this->errors[] = "Veritabanı bağlantısı problemi. \n{$anaSayfaYonlendirmeKodu}";
            }
        }
    }
	
    public function doLogout() {
		$anaSayfaYonlendirmeKodu = '3 saniye içerisinde ana sayfaya yönlendiriliyorsunuz. <meta http-equiv="refresh" content="3;URL=/">';
        $_SESSION = array();
        session_destroy();
        $this->messages[] = "Çıkış yaptınız. \n{$anaSayfaYonlendirmeKodu}";

    }
	
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        return false;
    }
}
