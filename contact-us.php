<?php
$site_title = "Contact us | Lagos @50";

 include('header.php') ?>


        <!--page title start-->
        <!--section class="page-title ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Contact Us</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!--page title end-->

        
        <!-- contact-form-section -->
        <section class="section-padding">
          
          <div class="container">

              <div class="text-center mb-30">
                  <h2 class="section-title text-uppercase">Drop us a line</h2>
                  <p class="section-sub">Send us email here and we'll reply you as soon as possible</p>
              </div>

            <div class="row">
                <div class="col-sm-8" style="color:#050505">
                    <form name="contact-form" id="contactForm" action="sendemail.php" method="POST">

                      <div class="row">
                        <div class="col-md-4">
                          <div class="input-field">
                            <input type="text" name="name" class="validate" id="name">
                            <label for="name">Name</label>
                          </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-4">
                          <div class="input-field">
                            <label class="sr-only" for="email">Email</label>
                            <input id="email" type="email" name="email" class="validate" >
                            <label for="email" data-error="wrong" data-success="right">Email</label>
                          </div>
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-4">
                          <div class="input-field">
                            <input id="phone" type="tel" name="phone" class="validate" >
                            <label for="phone">Phone Number</label>
                          </div>
                        </div><!-- /.col-md-6 -->
                      </div><!-- /.row -->
					  
					  <div class="row">
						<div class="col-md-12">
						  <div class="input-field">
							<textarea name="message" id="message" class="materialize-textarea" ></textarea>
							<label for="message">Message</label>
						  </div>
						</div><!-- /.col-md-6 -->
                      </div>
					
                      <button type="submit" name="submit" class="waves-effect waves-light btn submit-button brown mt-30">Send Message</button>
                    </form>
                </div><!-- /.col-md-8 -->

                <div class="col-md-4 contact-info">

                    <address>
                      <i class="material-icons brand-color">&#xE55F;</i>
                      <div class="address">
                        Lekki Phase 1,<br>
						Lagos, Nigeria.

                       
                      </div><hr>

                      <i class="material-icons brand-color">&#xE61C;</i>
                      <div class="phone">
                        <p>Phone: +234 903 730 6031 <br/>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+234 908 456 8239</p>
                      </div>
						<hr>
                      <i class="material-icons brand-color">&#xE0E1;</i>
                      <div class="mail">
                        <p><a href="mailto:korede.hot@gmail.com">customerservice@buyandselldogs.ng</a><br>
                        <a href="http://www.buyandselldogs.ng">www.buyandselldogs.ng</a></p>
                      </div>
                    </address>

                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
          </div>
        </section>
        <!-- contact-form-section End -->


        <!-- map-section -->
        <div id="myMap" class="height-300"></div>
        <!-- /.map-section -->

<?php include('footer.php') ?>

        <script src="https://maps.googleapis.com/maps/api/js"></script>

        <!-- Google Map Customization  -->
        <script type="text/javascript">
            jQuery(document).ready(function() {

                //set your google maps parameters
                var $latitude = 40.716304, //Visit http://www.latlong.net/convert-address-to-lat-long.html for generate your Lat. Long.
                    $longitude = -73.995763,
                    $map_zoom = 16 /* ZOOM SETTING */

                //google map custom marker icon 
                var $marker_url = 'assets/img/pin.png';

                //we define here the style of the map
                var style = [{
                    "stylers": [{
                        "hue": "#03a9f4"
                    }, {
                        "saturation": 10
                    }, {
                        "gamma": 2.15
                    }, {
                        "lightness": 12
                    }]
                }];

                //set google map options
                var map_options = {
                    center: new google.maps.LatLng($latitude, $longitude),
                    zoom: $map_zoom,
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    streetViewControl: true,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    styles: style
                }
                //inizialize the map
                var map = new google.maps.Map(document.getElementById('myMap'), map_options);
                //add a custom marker to the map                
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng($latitude, $longitude),
                    map: map,
                    visible: true,
                    icon: $marker_url
                });

                var contentString = '<div id="mapcontent">' + '<p>materialize, 1355 Market Street, San Francisco.</p></div>';
                var infowindow = new google.maps.InfoWindow({
                    maxWidth: 320,
                    content: contentString
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                });
            });
        </script>

    </body>
  
</html>