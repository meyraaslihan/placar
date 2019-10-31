<?php 
include("baglanti.php");
include("header.php");
?>

<!-- Başlık -->
<div class="full-row overlay-1 bg-img-5" id="page-banner">
  <div class="container">
    <div class="row py-60">
      <div class="col-sm-6">
        <h3 class="banner-title text-white text-uppercase">Araçlar</h3>
      </div>
    </div>
  </div>
</div>
<!-- Başlık Sonu -->

<!-- Araç Arama -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="property-search-form-1 shadow">
                        <form action="araclar.php" method="get">
                            <div class="row">
                                <div class="form-group col-lg-2 col-sm-6">
                                    <input type="date" name="date1" class="form-control" placeholder="baslangictarih">
                                </div>
                                <div class="form-group col-lg-2 col-sm-6">
                                    <input type="date" name="date2" class="form-control" placeholder="bitistarih">
                                </div>
                                <div class="form-group col-lg-2 col-sm-6">
                                    <select name="kasaTipi" class="selectpicker form-control">
                                        <option value="">Araç Tipi</option>
                                        <?php
										$Array = $Placar->kasaTipiAdlari();
										foreach($Array as $row)
											echo "<option value='{$row}'>{$row}</option>";
										?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-2 col-sm-6">
                                    <select name="yakitTipi" class="selectpicker form-control">
                                        <option value="">Yakıt Tipi</option>
                                        <?php
										$Array = $Placar->yakitTipiAdlari();
										foreach($Array as $row)
											echo "<option value='{$row}'>{$row}</option>";
										?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-2 col-sm-6">
                                    <select name="vites" class="selectpicker form-control">
                                        <option value="">Vites</option>
                                        <?php
										$Array = $Placar->VitesAdlari();
										foreach($Array as $row)
											echo "<option value='{$row}'>{$row}</option>";
										?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-2 col-sm-6">
                                    <input type="submit" class="btn btn-default-bg w-100" value="Araç Ara">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Araç Arama Sonu -->

<section class="full-row">
    <div class="container">
        <div class="row">
        <?php
		$sorgu = $Placar->BringCarsWithQuery( 
			(isset($_GET['date1']) ? $_GET['date1'] : null), 
			(isset($_GET['date2']) ? $_GET['date2'] : null), 
			(isset($_GET['yakitTipi']) ? $_GET['yakitTipi'] : null), 
			(isset($_GET['kasaTipi']) ? $_GET['kasaTipi'] : null), 
			(isset($_GET['vites']) ? $_GET['vites'] : null) 
		);
		foreach ($sorgu as $row) {
			echo '
            <div class="col-md-6 col-lg-4">
                <div class="room-thumb-grid-1 hover_zoom bg-white mb-30">
                    <div class="thumb-top position-relative">
                        <ul class="facility-icon upper-place-bottom-left">
                        </ul>
                        <div class="overlay-5 overflow_hidden"><img width="350px" height="218px" src="'.$row['gorsel'].'" alt="'.$row['marka'].' '.$row['model'].'"></div>
                    </div>
                    <div class="room-info">
                        <div class="down-line-left mb-3">
                            <h6 class="title"><a class="text-primary" href="aracdetay.php?aracID='.$row['id'].'">'.$row['marka'].' '.$row['model'].'</a></h6>
                            <span class="subtext">'.$row['vites'].', '.$row['yakitTipi'].', '.$row['yil'].' model</span> </div>
                        <div class="h5 per-night text-primary">'.$row['gunluFiyat'].' TL<small> / Günlük</small></div>';
echo ' <div class="btn btn-default float-right"><a class="text-primary" href="aracdetay.php?aracID='.$row['id'].'">Kirala</a></div>';
echo '
                    </div>
                </div>
            </div>';
		}
		if(empty($sorgu))
			echo "<b>Arama sonucuna uygun sonuç bulunamadı!</b>";
	?>
        </div>
        <!--
        <div class="row">
            <div class="col-lg-12">
                <nav class="x-center" aria-label="Page navigation">
                    <ul class="pagination">
                      <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                      </li>
                      <li class="page-item active">
                          <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item">...</li>
                      <li class="page-item"><a class="page-link" href="#">10</a></li>
                      <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                      </li>
                    </ul>
                </nav>
            </div>
        </div>
        -->
    </div>
</section>
<?php include("footer.php");?>