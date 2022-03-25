        <!--footer 4 start -->
        <footer class="footer footer-four">
            <div class="primary-footer brand-bg text-center">
                <div class="container">

                  <a href="#top" class="page-scroll btn-floating btn-large brown back-top waves-effect waves-light" data-section="#top">
                    <i class="material-icons">&#xE316;</i>
                  </a>

                  <ul class="social-link tt-animate ltr mt-20">
					<li data-href="http://selfie.buyandselldogs.ng/index.php" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fselfie.buyandselldogs.ng%2Findex.php&amp;src=sdkpreparse"><i class="fa fa-facebook"></i></a></li>
					<li><a  ontouchend="red()" href="whatsapp://send?text=http://selfie.buyandselldogs.ng/index.php?a=<?php echo $split[1]; ?>" id="whatsapp" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a></li>
					<li><a href="https://twitter.com/share" target="_blank" data-show-count="false"><i class="fa fa-twitter"></i></a></li>
                  </ul>

                  <hr class="mt-15">

                  <div class="row">
                    <div class="col-md-12">
						<br />
                          <span class="copy-text">Copyright &copy; 2017 <a href="http://www.buyandselldogs.ng">Buy And Sell Dogs Nigeria</a> &nbsp; | &nbsp;  Designed By <a href="http://www.shonubi.ml" target="_blank">CoreTech</a></span>
						  <br>
						  <br>
                    </div><!-- /.col-md-12 -->
                  </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.primary-footer -->
        </footer>
        <!--footer 4 end-->

        
        <!-- Preloader -->
        <div id="preloader">
          <div class="preloader-position"> 
            <img src="../assets/img/logo.png" alt="logo" >
            <div class="progress">
              <div class="indeterminate"></div>
            </div>
          </div>
        </div>
        <!-- End Preloader -->



        <!-- jQuery -->
        <script src="../assets/js/jquery-2.1.3.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/materialize/js/materialize.min.js"></script>
        <script src="../assets/js/menuzord.js"></script>
        <script src="../assets/js/jquery.easing.min.js"></script>
        <script src="../assets/js/jquery.sticky.min.js"></script>
        <script src="../assets/js/smoothscroll.min.js"></script>
        <script src="../assets/js/jquery.stellar.min.js"></script>
        <script src="../assets/js/imagesloaded.js"></script>
        <script src="../assets/js/jquery.inview.min.js"></script>
        <script src="../assets/js/animated-headline.js"></script>
        <script src="../assets/owl.carousel/owl.carousel.min.js"></script>
        <script src="../assets/flexSlider/jquery.flexslider-min.js"></script>
        <script src="../assets/js/scripts.js"></script>
		
		        <!-- RS5.0 Core JS Files -->
        <script src="../assets/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="../assets/revolution/js/jquery.themepunch.revolution.min.js"></script>

        <!-- RS5.0 Init  -->
        <script type="text/javascript">
            jQuery(document).ready(function() {
               jQuery(".materialize-slider").revolution({
                    sliderType:"standard",
                    sliderLayout:"fullwidth",
                    delay:9000,
                    navigation: {
                        keyboardNavigation: "on",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "gyges",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: true,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            }
                        }
                    },
                    responsiveLevels:[1240,1024,778,480],
                    gridwidth:[1240,1024,778,480],
                    gridheight:[600,500,400,400],
                    disableProgressBar:"on",
                    parallax: {
                        type:"mouse",
                        origo:"slidercenter",
                        speed:2000,
                        levels:[2,3,4,5,6,7,12,16,10,50],
                    }


                });
            });
        </script>

    </body>
  
</html>