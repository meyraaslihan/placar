<?php

class Placar {
	
	public function FetchStatisticsFromDB() {
		$query1 = $this->db_connection->query("SELECT count(*) as toplam FROM araclar")->fetch(PDO::FETCH_ASSOC);
		$query2 = $this->db_connection->query("SELECT count(*) as toplam FROM users WHERE tur=2")->fetch(PDO::FETCH_ASSOC);
		$query3 = $this->db_connection->query("SELECT count(*) as toplam FROM users WHERE tur=3")->fetch(PDO::FETCH_ASSOC);
		$query4 = $this->db_connection->query("SELECT count(*) as toplam FROM kiralar")->fetch(PDO::FETCH_ASSOC);
		
		return array(
			"toplam_arac" => $query1['toplam'], 
			"arac_sahibi" => $query2['toplam'], 
			"mutlu_musteri" => $query3['toplam'], 
			"kiralan_arac" => $query4['toplam'], 
		);
    }
	
	private function ConnectDB() {
		try {
			$this->db_connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
			$this->db_connection->query("SET CHARACTER SET utf8");
			$this->db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch ( PDOException $e ){
			print $e->getMessage();
		}
	}
	
	public function AracKirala( $kiraladigiTarih, $teslimEttigiTarih, $aracID, $musteriID ) {
		$query = $this->db_connection->prepare("INSERT INTO kiralar SET
		id = :id,
		aracID = :aracID,
		musteriID = :musteriID,
		kiraladigiTarih = :kiraladigiTarih,
		teslimEttigiTarih = :teslimEttigiTarih");
		$insert = $query->execute(array(
			  "id" => null,
			  "aracID" => intval($aracID),
			  "musteriID" => intval($musteriID),
			  "kiraladigiTarih" => $kiraladigiTarih,
			  "teslimEttigiTarih" => $teslimEttigiTarih
		));
		if ( $insert ) {
			//$aracID = $this->db_connection->lastInsertId();
			return "Araç kiralama işlemi başarılı! Ana sayfa\'ya yönlendiriliyorsunuz. <meta http-equiv=\"refresh\" content=\"1;URL=/\">";
		}
		else
			return "Hata bu işlemi gerçekleştiremiyorum! Bekleyin.. 2 saniye içerisinde önceki sayfaya gideceksiniz. <meta http-equiv=\"refresh\" content=\"2;URL=\"javascript:history.back(-1)\">";
	}
	
	public function AddNewCar( $UserID, $ilanbaslangic, $ilanbitis, $marka, $model, $yil, $gunluFiyat, $vites, $kasaTipi, $yakitTipi, $renk, $motorGucu, $gorsel ) {
		$query = $this->db_connection->prepare("INSERT INTO araclar SET
		model = :model,
		vites = :vites,
		gunluFiyat = :gunluFiyat,
		marka = :marka,
		motorGucu = :motorGucu,
		kasaTipi = :kasaTipi,
		yakitTipi = :yakitTipi,
		renk = :renk,
		yil = :yil,
		aracSahibiID = :aracSahibiID,
		subelerID = :subelerID,
		gorsel = :gorsel");
		$insert = $query->execute(array(
			  "model" => $model,
			  "vites" => $vites,
			  "gunluFiyat" => $gunluFiyat,
			  "marka" => $marka,
			  "motorGucu" => $motorGucu,
			  "kasaTipi" => $kasaTipi,
			  "yakitTipi" => $yakitTipi,
			  "renk" => $renk,
			  "yil" => $yil,
			  "aracSahibiID" => $UserID,
			  "subelerID" => 52,
			  "gorsel" => $gorsel
		));
		if ( $insert ) {
			$aracID = $this->db_connection->lastInsertId();
			$query2 = $this->db_connection->prepare("INSERT INTO kiraverir SET
			aracID = :aracID,
			ilanBasTarihi = :ilanBasTarihi,
			ilanBitTarihi = :ilanBitTarihi");
			$insert2 = $query2->execute(array(
				  "aracID" => $aracID,
				  "ilanBasTarihi" => $ilanbaslangic,
				  "ilanBitTarihi" => $ilanbitis
			));
			if ( $insert2 ) {
				return 'insert işlemi başarılı! Ana sayfa\'ya yönlendiriliyorsunuz. <meta http-equiv="refresh" content="1;URL=/">';
			}
			return "bir sorun olustu" . 'Ana sayfa\'ya yönlendiriliyorsunuz. <meta http-equiv="refresh" content="1;URL=/">';
		}
		return "bir sorun olustu" . 'Ana sayfa\'ya yönlendiriliyorsunuz. <meta http-equiv="refresh" content="1;URL=/">';
	}
	
	public function BringCarsWithQuery( $date1, $date2, $yakitTipi, $kasaTipi, $vites ) {
		$sorgu = "araclar.id = kiraverir.aracID";
		if($yakitTipi != null)
			$sorgu .= " and yakitTipi = '{$yakitTipi}'";
		if($kasaTipi != null)
			$sorgu .= " and kasaTipi = '{$kasaTipi}'";
		if($vites != null)
			$sorgu .= " and vites = '{$vites}'";
		if($date1 and $date2)
			$sorgu .= " and kiraverir.ilanBasTarihi <= '{$date1}' AND kiraverir.ilanBitTarihi >= '{$date2}'";
		
		$query = $this->db_connection->query("SELECT id, gorsel, marka, yil, vites, model, yakitTipi, gunluFiyat FROM kiraverir, araclar WHERE {$sorgu} order by araclar.id desc")->fetchall(PDO::FETCH_ASSOC);
		return $query;
	}
	
	public function IlanKaldir( $AracID ) {
		$query = $this->db_connection->prepare("DELETE FROM araclar WHERE id = :id");
		$delete = $query->execute(array(
			'id' => $AracID
		));
		
		$query2 = $this->db_connection->prepare("DELETE FROM kiraverir WHERE aracID = :id");
		$delete2 = $query2->execute(array(
			'id' => $AracID
		));
		
		if( $delete && $delete2 )
			return "İlan başarıyla kaldırıldı!";
		else
			return "Bir hata oluştu!";
	}
	
	public function kiraladigimAraclar( $userID ) {
		$query = $this->db_connection->query("SELECT * FROM araclar, kiralar, users WHERE kiralar.musteriID = {$userID} AND kiralar.aracID = araclar.id AND araclar.aracSahibiID = users.user_id order by araclar.id desc")->fetchall(PDO::FETCH_ASSOC);
		return $query;
	}
	
	public function kiralananAraclarim( $userID ) {
		$query = $this->db_connection->query("SELECT * FROM araclar, kiralar, users WHERE araclar.aracSahibiID = {$userID} AND araclar.id = kiralar.aracID AND kiralar.musteriID = users.user_id order by araclar.id desc")->fetchall(PDO::FETCH_ASSOC);
		return $query;
	}
	
	public function acikIlanlarim( $userID ) {
		$query = $this->db_connection->query("SELECT * FROM araclar, kiraverir WHERE araclar.aracSahibiID = {$userID} AND kiraverir.aracID = araclar.id order by araclar.id desc")->fetchall(PDO::FETCH_ASSOC);
		return $query;
	}
	
	public function BringAllCars($limit=null) {
		if($limit != null)
			$kisitla = " limit {$limit}";
		$query = $this->db_connection->query("SELECT id, gorsel, marka, yil, vites, model, yakitTipi, gunluFiyat FROM kiraverir, araclar WHERE araclar.id = kiraverir.aracID order by id desc {$kisitla}")->fetchall(PDO::FETCH_ASSOC);
		return $query;
	}
	
	public function BringCarDetail(int $aracID) {
		$query = $this->db_connection->query("SELECT * FROM araclar WHERE id = '{$aracID}' ")->fetch(PDO::FETCH_ASSOC);
		if ( $query ) {
			return $query;
		}
		return false;
	}
	
	public function AracKiraVerirTarihleriniGetir(int $aracID) {
		$query = $this->db_connection->query("SELECT * FROM kiraverir WHERE aracID = '{$aracID}' ")->fetch(PDO::FETCH_ASSOC);
		if ( $query ) {
			return $query;
		}
		return false;
	}
	
	public function VitesAdlari() {
		$query = $this->db_connection->query("SELECT vites FROM araclar GROUP BY vites", PDO::FETCH_ASSOC);
		$Array = array();
		if ( $query->rowCount() ) {
			foreach( $query as $row ) {
				$Array[] = $row['vites'];
			}
		}
		return $Array;
	}
	
	public function yakitTipiAdlari() {
		$query = $this->db_connection->query("SELECT yakitTipi FROM araclar GROUP BY yakitTipi", PDO::FETCH_ASSOC);
		$Array = array();
		if ( $query->rowCount() ) {
			foreach( $query as $row ) {
				$Array[] = $row['yakitTipi'];
			}
		}
		return $Array;
	}
	
	public function kasaTipiAdlari() {
		$query = $this->db_connection->query("SELECT kasaTipi FROM araclar GROUP BY kasaTipi", PDO::FETCH_ASSOC);
		$Array = array();
		if ( $query->rowCount() ) {
			foreach( $query as $row ) {
				$Array[] = $row['kasaTipi'];
			}
		}
		return $Array;
	}
	
    private $db_connection = null;
	
    public $errors = array();
	
    public $messages = array();
	
    public function __construct() {
		$this->ConnectDB();
    }
	
	public function BringUserData(int $userID) {
		$query = $this->db_connection->query("SELECT * FROM users WHERE user_id = {$userID} ")->fetch(PDO::FETCH_ASSOC);
		if ( $query ) {
			return $query;
		}
		return null;
	}
	
	public function UpdateProfileData($user_id, $user_email, $ad, $soyad, $tc, $tel, $adres) {
		$query = $this->db_connection->prepare("UPDATE users SET
			user_email = :user_email,
			ad = :ad,
			soyad = :soyad,
			tc = :tc,
			tel = :tel,
			adres = :adres
			WHERE user_id = :user_id");
		$update = $query->execute(array(
			"user_email" => $user_email,
			"ad" => $ad,
			"soyad" => $soyad,
			"tc" => $tc,
			"tel" => $tel,
			"adres" => $adres,
			"user_id" => $user_id
		));
		if ( $update ) {
			return "{$ad} {$soyad} için güncelleme başarılı! yönlendiriliyorsunuz. <meta http-equiv=\"refresh\" content=\"2;URL=/profilduzenle.php\">";
		}
		return "hata!";
	}
}
