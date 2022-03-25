<?php
	session_start();
	
	if(!isset($_SESSION['output_img'])){
		header("Location: image.php");
	}
	
	$site_title = "Download - Selfie Challenge";
	$desc = "&#8358;100,000 Up For Grabs- My Dog And I Selfie Challenge";
	
	include('header.php');
	
	
?>

        <!-- contact-form-section -->
        <section class="section-padding gray-bg">
          
          <div class="container">
            <div class="row">
              <div class="col-md-10 col-sm-12 col-md-offset-1">
				  
					  <div id="imageContainer" class="col-md-5">
						<?php 
						
							if(isset($_SESSION['output_img'])) {
								echo '<img id="preview-img" src="'.$_SESSION['output_img'].'" style="width:300px;height:auto;"/>';
							} else {
								echo '<img id="preview-img" src="assets/img/edit/bg-blue.jpg" style="width:300px;height:auto;"/>';
							}
						?>
					  </div>
				  
					  <div class="col-md-7">
						  <div class="row no-gutter">
							  <div class="col-md-3 col-xs-3 col-sm-3">
								<a href="#" onclick="downloadImage(this)" download>
									<div class="featured-item border-box hover brand-hover">
									  <div class="icon mb-10">
										  <i class="material-icons brand-icon fa fa-download"></i>
									  </div>
									  
									</div>
								</a><!-- /.featured-item -->
							  </div>
							  <div class="col-md-3 col-xs-3 col-sm-3">
								<a  ontouchend="red()" href="whatsapp://send?text=http://selfie.buyandselldogs.ng/index.php?a=<?php echo $split[1]; ?>" id="whatsapp" data-action="share/whatsapp/share">
								  <div class="featured-item border-box hover brand-hover">
									  <div class="icon mb-10">
										  <i class="material-icons brand-icon fa fa-whatsapp" style="color:#0dc143"></i>
									  </div>
									  
								  </div><!-- /.featured-item -->
								</a>
							  </div>
							  <div id="" class="col-md-3 col-xs-3 col-sm-3">
								<a target="_blank" href="https://www.facebook.com/dialog/feed?app_id=109237422995965&display=popup&caption=Celebrate Lagos 50 years&link=http://selfie.buyandselldogs.ng/index.php?a=<?php echo $split[1]; ?>&title=message&picture=<?php echo $imageFile; ?>&description=<?php echo $desc; ?>&redirect_uri=http://selfie.buyandselldogs.ng/download.php">
									<div class="featured-item border-box hover brand-hover">
									  <div class="icon mb-10">
										  <i class="material-icons brand-icon fa fa-facebook"></i>
									  </div>
									  
									</div>
								</a>
							  </div><!-- /.featured-item -->
							  <div class="col-md-3 col-xs-3 col-sm-3">
								<a href="https://twitter.com/share" target="_blank" data-show-count="false">
								  <div class="featured-item border-box hover brand-hover">
									  <div class="icon mb-10">
										  <i class="material-icons brand-icon fa fa-twitter"></i>
									  </div>
									  
								  </div><!-- /.featured-item -->
								</a>
							  </div>

						  </div><!-- /.row -->
					  </div>
				  
              </div>
            </div>
          </div>

        </section>
		
		
		
		
<?php include('footer.php') ?>
		
        <script>
          $('#toggle').on('click', function() {
              $(this).toggleClass('active');
              $('#overlay').toggleClass('open');
          });
        </script>
		<script>
		  function downloadImage(linkElement) {
				var myDiv = document.getElementById('imageContainer');
				var myImage = myDiv.children[0];
				linkElement.href = myImage.src;
			}
        </script>