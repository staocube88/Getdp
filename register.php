<?php
$site_title = "Registration - Selfie Challenge";
	session_start();
	
	session_destroy();
	
	include('header.php');
	include 'z_db.php';
	
	
	
?>

        <!-- contact-form-section -->
        <section class="section-padding gray-bg">
          
          <div class="container">
            <div class="row">
				<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
					<form name="reg_form" id="reg_form">
						<div class="col-md-6">
							<div class="input-field">
								<input id="fname" type="text" name="fname" class="validate" maxlength="20" required>
								<label for="name">Name (Nickname)*</label>
							</div>

							<div class="input-field">
								<input id="dog_name" type="text" name="dog_name" class="validate" maxlength="20" required>
								<label for="dog_name">Dog Name*</label>
							</div>
						
							<div class="input-field">
								<input id="email" type="email" name="email" class="validate" required>
								<label for="email" data-error="wrong" data-success="right">Email Address*</label>
							</div>
						
							<div class="input-field">
								<input id="mobile" type="text" name="mobile" class="validate" maxlength="11" required>
								<label for="mobile">Mobile*</label>
							</div>
						</div>
					  
						<div class="col-md-6"><br/>
							<div class="input-field">
								<input id="facebook" type="text" name="facebook" class="validate" maxlength="20">
								<label for="facebook">Facebook Username</label>
							</div>

							<div class="input-field">
								<input id="twitter" type="text" name="twitter" class="validate" maxlength="20">
								<label for="twitter">Twitter Username</label>
							</div>

							<div class="input-field">
								<input id="instagram" type="text" name="instagram" class="validate" maxlength="20">
								<label for="instagram">Instagram Username</label>
							</div>
						</div>
					
					</form>
					<div class="text-center">
					  <button id="btn_next" type="submit" name="submit" class="pull-right waves-effect waves-light btn btn-lg text-capitalize text-bold mt-80">Next</button>
					</div>
					
				</div>
            </div>
          </div>

        </section>
        <!-- contact-form-section End -->


<?php include('footer.php') ?>

        <script>
		  
		  document.getElementById("btn_next").onclick = function () {
			  var fname = document.getElementById("fname").value;
			  var dog_name = document.getElementById("dog_name").value;
			  var email = document.getElementById("email").value;
			  var mobile = document.getElementById("mobile").value;
			  var facebook = document.getElementById("facebook").value;
			  var twitter = document.getElementById("twitter").value;
			  var instagram = document.getElementById("instagram").value;
			  
			if(fname == '' || dog_name == '' || email == '' || mobile == ''){
				alert('Fields marked with (*) cannot be empty');
			} else {
			  
			  if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						var resp = xmlhttp.responseText;
						//alert(resp);
						if(resp == 'existed'){
							alert('You cannot register for the contest twice contact administrator for any misunderstanding');
						} else if(resp == 'notok'){
							alert('registration failed please try again');
						} else {
							window.location = "image.php";
						}
					}
				}
				xmlhttp.open("POST","model.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("fname="+fname+"&dog_name="+dog_name+"&email="+email+"&mobile="+mobile+"&facebook="+facebook+"&twitter="+twitter+"&instagram="+instagram+"&post_type=register");
			}  
          };
        </script>