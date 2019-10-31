<?php
include("baglanti.php");

if ($login->isUserLoggedIn() == true) {
	$UserID = $_SESSION['user_id'];
	if($_POST) {
		exit($Placar->AddNewCar( $UserID, $_POST['ilanbaslangic'], $_POST['ilanbitis'], $_POST['marka'], $_POST['model'], $_POST['yil'], $_POST['gunluFiyat'], 
		$_POST['vites'], $_POST['kasaTipi'], $_POST['yakitTipi'], $_POST['renk'], $_POST['motor'], $_POST['gorsel'] ));
	}
}
else {
	exit("Bu sayfayı görmek için giriş yapmanız gerekmektedir! <meta http-equiv=\"refresh\" content=\"2;URL=/login.php\">");
}

include("header.php");
?>
<script>
    function preview_images()
    {
        var total_file=document.getElementById("images").files.length;
        for(var i=0;i<total_file;i++)
        {
            $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
        }
    }

    $('#add_more').click(function() {
        "use strict";
        $(this).before($("<div/>", {
            id: 'filediv'
        }).fadeIn('slow').append(
            $("<input/>", {
                name: 'file[]',
                type: 'file',
                id: 'file',
                multiple: 'multiple',
                accept: 'image/*'
            })
        ));
    });

    $('#upload').click(function(e) {
        "use strict";
        e.preventDefault();

        if (window.filesToUpload.length === 0 || typeof window.filesToUpload === "undefined") {
            alert("No files are selected.");
            return false;
        }

        // Now, upload the files below...
        // https://developer.mozilla.org/en-US/docs/Using_files_from_web_applications#Handling_the_upload_process_for_a_file.2C_asynchronously
    });

    deletePreview = function (ele, i) {
        "use strict";
        try {
            $(ele).parent().remove();
            window.filesToUpload.splice(i, 1);
        } catch (e) {
            console.log(e.message);
        }
    }

    $("#file").on('change', function() {
        "use strict";

        // create an empty array for the files to reside.
        window.filesToUpload = [];

        if (this.files.length >= 1) {
            $("[id^=previewImg]").remove();
            $.each(this.files, function(i, img) {
                var reader = new FileReader(),
                    newElement = $("<div id='previewImg" + i + "' class='previewBox'><img /></div>"),
                    deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'>X</span>").prependTo(newElement),
                    preview = newElement.find("img");

                reader.onloadend = function() {
                    preview.attr("src", reader.result);
                    preview.attr("alt", img.name);
                };

                try {
                    window.filesToUpload.push(document.getElementById("file").files[i]);
                } catch (e) {
                    console.log(e.message);
                }

                if (img) {
                    reader.readAsDataURL(img);
                } else {
                    preview.src = "";
                }

                newElement.appendTo("#filediv");
            });
        }
    });
</script>
<style>
    .container{
        margin-top:20px;
    }
    .image-preview-input {
        position: relative;
        overflow: hidden;
        margin: 0px;
        color: #333;
        background-color: #fff;
        border-color: #ccc;
    }
    .image-preview-input input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    .image-preview-input-title {
        margin-left:2px;
    }
</style>
<div class="full-row overlay-1 bg-img-5" id="page-banner">
    <div class="container">
        <div class="row py-60">
            <div class="col-sm-6">
                <h3 class="banner-title text-white text-uppercase">Araç Ekle</h3>
            </div>
        </div>
    </div>
</div>

<section class="full-row py-80">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="contact-form-1 form-style-1">
					<form class="" method="post">
						<div class="row">
							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">İlan Başlangıç Tarihi:</label>
                                    <input type="date" name="ilanbaslangic" class="form-control" placeholder="baslangictarih" title="Kiralama Tarihi">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">İlan Bitiş Tarihi:</label>
                                    <input type="date" name="ilanbitis" class="form-control" placeholder="bitistarih">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Araç Markası:</label>
                                    <input class="form-control" id="marka" name="marka" placeholder="Araç Markası" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="model">Model:</label>
                                    <input class="form-control" id="model" name="model" placeholder="Araç Modeli" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="yil">Üretim Yılı:</label>
                                    <input class="form-control" id="yil" name="yil" placeholder="Üretim Yılı" min="1900" max="2099" type="number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fiyat">Günlük Fiyat:</label>
                                    <input class="form-control" id="gunluFiyat" name="gunluFiyat" placeholder="fiyat" type="number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vites:</label>
                                    <select class="selectpicker form-control" name="vites">
                                        <?php
										$Array = $Placar->VitesAdlari();
										foreach($Array as $row)
											echo "<option value='{$row}'>{$row}</option>";
										?>
                                    </select>
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="kasaTipi">Araç Tipi:</label>
                                    <input class="form-control" id="kasaTipi" name="kasaTipi" placeholder="Araç Tipi" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Yakıt Tipi:</label>
                                    <select class="selectpicker form-control" name="yakitTipi">
                                        <?php
										$Array = $Placar->yakitTipiAdlari();
										foreach($Array as $row)
											echo "<option value='{$row}'>{$row}</option>";
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Renk:</label>
                                    <input class="form-control" id="renk" name="renk" placeholder="Renk" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Motor Gücü:</label>
                                    <input class="form-control" id="motor" name="motor" placeholder="Motor" type="number">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Araç Görseli:</label>
                                    <input class="form-control" id="gorsel" name="gorsel" placeholder="https://...." type="text">
                                </div>
                            </div>
                            <!--<div class="col-md-12">
                                <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
                            </div>
                            <div class="row" id="image_preview"></div>-->

                            <div class="col-md-12">
							    <button type="submit" class="btn btn-default-bg mt-3">Aracı Ekle</button>
						    </div>
						</div>
					  </form>
				  </div>
			</div>
		</div>
	</div>
</section>



<?php include("footer.php");?>