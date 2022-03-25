<?php
$site_title = "Create Image - Selfie Challenge";
	session_start();
	
	if(!isset($_SESSION['temp_image']) || !isset($_SESSION['dogname']) || !isset($_SESSION['username']) || !isset($_SESSION['user_id'])){
		header("Location: register.php");
	}
	
	include('header.php');
	
	
	
?>

        <!-- contact-form-section -->
        <section class="section-padding gray-bg">
          
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-sm-12 col-xs-12">
				  <div class="col-md-10">
					  <form name="contact-form" id="contactForm">

						<!--div class="input-field">
						  <input id="email" type="email" name="email" class="validate" >
						  <label for="email" data-error="wrong" data-success="right">Email Address*</label>
						</div-->
						<div class="row">
						  <div class="col-md-6 col-sm-6 col-xs-4">
							<div class="input-field">
								<select id="bg" onchange="change('bg-sm', this.value, 'jpg')">
									<option value="blue" selected>Blue Theme</option>
									<option value="brown">Brown Theme</option>
								</select>
							</div>
						  </div><!-- /.col-md-6 -->

						  <div class="col-md-6 col-sm-6 col-xs-8">
							<img id="bg-sm" src="assets/img/edit/bg-sm-blue.jpg" style="height:50px;width:auto;padding-top:10px" />
						  </div><!-- /.col-md-6 -->
						</div><!-- /.row -->
						
						
						<div class="row">
						  <div class="col-md-6 col-sm-6 col-xs-4">
							<div class="input-field">
								<select id="bottom_color" onchange="change('bottom', this.value, 'png')">
									<option value="blue">Blue</option>
									<option value="brown" selected>Brown</option>
								</select>
							</div>
						  </div><!-- /.col-md-6 -->

						  <div class="col-md-6 col-sm-6 col-xs-8">
							<img id="bottom" src="assets/img/edit/bottom-brown.png" style="height:60px;width:auto;padding-top:10px" />
						  </div><!-- /.col-md-6 -->
						</div><!-- /.row -->
						
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-8">
							  <div class="input-field">
								<input id="fname" type="text" name="fname" class="validate" maxlength="22" value="<?php echo $_SESSION['username'] ?>" required>
								<label for="website">Your name</label>
							  </div>
							</div><!-- /.col-md-6 -->
							<div class="col-md-3 col-sm-6 col-xs-4">
								<div class="input-field">
									<select id="fname-pos-val">
										<option value="10">Position +10</option>
										<option value="20" selected>Position +20</option>
										<option value="30">Position +30</option>
										<option value="340">Position +40</option>
										<option value="50">Position +50</option>
										<option value="70">Position +70</option>
									</select>
								</div>
							</div><!-- /.col-md-6 -->
						</div><!-- /.row -->
						
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-8">
							  <div class="input-field">
								<input id="dogname" type="text" name="dogname" class="validate" maxlength="22" value="<?php echo $_SESSION['dogname'] ?>" required>
								<label for="website">Dog name</label>
							  </div>
							</div><!-- /.col-md-6 -->
							<div class="col-md-3 col-sm-6 col-xs-4">
								<div class="input-field">
									<select id="dogname-color-val">
										<option value="255,255,255">White</option>
									</select>
								</div>
							</div><!-- /.col-md-6 -->
						</div><!-- /.row -->
						<div class="text-center">
						  <button id="btn_preview" type="submit" name="submit" class="pull-left waves-effect waves-dark btn btn-warning btn-lg text-capitalize text-bold mt-80">Preview</button>
						  <button id="btn_create" type="submit" name="submit" class="pull-right waves-effect waves-light btn btn-lg text-capitalize text-bold mt-80">Create Image</button>
						</div>
					  </form>
					</div>
				  
				  <div class="col-md-2 col-sm-12 col-xs-12"><br/>
					<?php 
						
						if(isset($_SESSION['output_img'])) {
							echo '<img id="preview-img" src="'.$_SESSION['output_img'].'" style="width:300px;height:auto;"/>';
						} else {
							echo '<img id="preview-img" src="assets/img/edit/bg-blue.jpg" style="width:300px;height:auto;margin-right:auto;margin-left:auto"/>';
						}
					?>
				  </div>
				 
              </div>
            </div>
          </div>

        </section>
        <!-- contact-form-section End -->


<?php include('footer.php') ?>
        <script>
          $('#toggle').on('click', function() {
              $(this).toggleClass('active');
              $('#overlay').toggleClass('open');
          });
        </script>
		<script>
          function change(tochange, value1, ext){
			  document.getElementById(tochange).src = 'assets/img/edit/'+tochange+'-'+value1+'.'+ext;
			  obj = document.getElementById('bottom_color');
			  obj_pic = document.getElementById('bottom');
			  if (value1 == 'brown'){
				  obj.value='blue';
				  obj_pic.src = 'assets/img/edit/bottom-'+obj.value+'.png';
			  } else {
				  obj.value='brown';
				  obj_pic.src = 'assets/img/edit/bottom-'+obj.value+'.png';
			  }
			  //alert(tochange+value1);
		  }
		  function isEmpty(str){
				return !str.replace(/^\s+/g, '').length; // boolean (`true` if field is empty)
			}
        </script>

        <script>
          document.getElementById("btn_preview").onclick = function () {
			  var bg = document.getElementById("bg").value;
			  var bottom_color = document.getElementById("bottom_color").value;
			  var fname = document.getElementById("fname").value;
			  var dogname = document.getElementById("dogname").value;
			  var fname_pos = document.getElementById("fname-pos-val").value;
			  //alert(years50_pos);
			
				if(isEmpty(fname)){
				  alert("please input your dog's name");
				} 
				else if(isEmpty(dogname)){
				  alert("please input your name");
				}

				else {
			  
			  
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
							document.getElementById("preview-img").src = resp;
							//alert(resp);
							//
						}
					}
					xmlhttp.open("POST","create_image.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("bg="+bg+"&bottom_color="+bottom_color+"&fname="+fname+"&fname_pos="+fname_pos+"&dogname="+dogname+"&mode_type=preview_img");
				}
          };
		  
		  
		  document.getElementById("btn_create").onclick = function () {
              //document.getElementById("uploadFileOne").value = this.value;
			  var bg = document.getElementById("bg").value;
			  var bottom_color = document.getElementById("bottom_color").value;
			  var fname = document.getElementById("fname").value;
			  var dogname = document.getElementById("dogname").value;
			  var fname_pos = document.getElementById("fname-pos-val").value;
			  //alert(years50_pos);
			  
			if(isEmpty(fname)){
			  alert("please input your dog's name");
			} 
			else if(isEmpty(dogname)){
			  alert("please input your name");
			}
			  
			else {
			  
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
							window.location = "download.php";
							//alert(resp);
							//
						}
					}
					xmlhttp.open("POST","create_image.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("bg="+bg+"&bottom_color="+bottom_color+"&fname="+fname+"&fname_pos="+fname_pos+"&dogname="+dogname+"&mode_type=create_img");
			}
          };
        </script>