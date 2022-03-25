<?php
session_start();
$site_title = "Upload Image - Selfie Challenge";
if(isset($_SESSION['temp_image'])){
	unlink($_SESSION['temp_image']);
	unset($_SESSION['temp_image']);
}

if(!isset($_SESSION['dogname']) || !isset($_SESSION['username']) || !isset($_SESSION['user_id'])){
	header("Location: register.php");
}
 include('header.php');



?>

    <style>
	html {
  font-family: sans-serif; /* 1 */
  -ms-text-size-adjust: 100%; /* 2 */
  -webkit-text-size-adjust: 100%; /* 2 */
}
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 5px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 279px;   /* will produce 540 */
        height:270px;   /* will produce 520 */
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .cropit-preview-background {
        opacity: .2;
        cursor: auto;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input, .export {
        /* Use relative position to prevent from being covered by image background */
        position: relative;
        z-index: 10;
        display: inline-block;
      }

      .cropit-image-input, .cropit-preview {
        margin-left: auto;
        margin-right: auto;
      }
	  
	  button {
        margin-top: 10px;
      }
    </style>
 
<section id="works" class="section-padding">
	<div class="container">
	
		<div class="text-center mb-20">
		  <h3 class="text-uppercase">Upload your selfie</h3>
		  <h4 class="alert alert-info"><b>NOTE</b> - To qualify for the contest, your selfie must include your dog!!!</h4>
		  <h4 class="alert alert-warning">Uploaded image must be avove 600px in width and 600px in height!!!</h4>
	  </div>
		
		<div class="col-sm-6 col-sm-offset-3">
			<div class="image-editor">
				<div class="">
					<input type="hidden" id="refresh" value="no">
					<input type="file" class="cropit-image-input btn btn-primary">
				</div>
				<div class="col-xs-12 col-md-12">
					<div class="cropit-preview"></div>
				</div>
				<div class="image-size-label">Resize image</div>
				<input type="range" class="cropit-image-zoom-input">
				<div class="center">
				  <button class="rotate-ccw btn btn-warning"><i class="fa fa-rotate-left"></i></button>
				  <button class="rotate-cw btn btn-warning"><i class="fa fa-rotate-right"></i></button>
				  <button class="export btn btn-primary">Next</button>
				</div>
			</div>
		</div>
    </div>
</section>
	
<?php include('footer.php'); ?>
	
	<script src="assets/dist/jquery.cropit.js"></script>
	<script>
		$('#preloader')
			.hide()  // Hide it initially
			.ajaxStart(function() {
				$(this).show();
			})
			.ajaxStop(function() {
				$(this).hide();
			})
		;
		$(document).ready(function(e) {
			var $input = $('#refresh');

			$input.val() == 'yes' ? location.reload(true) : $input.val('yes');
		});
      
	  $(function() {
        $('.image-editor').cropit({
          exportZoom: 2,
          imageBackground: true,
          imageBackgroundBorderWidth: 20,
		  smallImage: 'reject',
          imageState: {
            src: 'http://lorempixel.com/500/400/',
          },
        });

        $('.rotate-cw').click(function() {
          $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
          $('.image-editor').cropit('rotateCCW');
        });

        $('.export').click(function() {
			$('#preloader').show();
          var imageData = $('.image-editor').cropit('export');
		  
		  if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					//alert(xmlhttp.responseText);
					var resp = xmlhttp.responseText;
					if(resp == 'ok'){
						window.location = 'create.php';
					} else {
						alert('Invalid image type select another image')
					}
					//alert(resp);
					//
				}
			}
			xmlhttp.open("POST","crop_image.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("read="+imageData);
		  
        });
      }); 
    </script>

