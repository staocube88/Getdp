<?php
session_start();
$site_title = "Lagos @50";
if(isset($_SESSION['temp_image'])){
		unlink($_SESSION['temp_image']);
}

session_destroy();
 include('header.php'); 



?>
 
<section id="works" class="section-padding">
	<div class="container">
	
		<div class="text-center mb-20">
		  <h1 class="text-uppercase">About Us</h1>
	  </div>
		
		<div class="col-sm-12" style="color:#050505">
			<img src="" />
			<p class="text-justify">At HOT-Tech goal is simple; provide our clients with the best possible web design services at a reasonable price. And, since 2015
			. We’ve built our business on integrity and trust, all of which has earned us a lot of happy referrals, 
			repeat business and an A+ BBB rating.</p>
			<p class="text-justify">Located at Allen, Ikeja, Lagos. HOT-Tech is a turnkey design shop offering the full complement of services including:</p>
			<ol>
				<li>Custom website design</li>
				<li>Web graphics</li>
				<li>Logo development</li>
				<li>Flash development</li>
				<li>Website usability, User interface (UX)</li>
				<li>Brand development</li>
				<li>Web Softwares/Applications</li>
			</ol>
			<p class="text-justify">At HOT-Tech, all of our work is done in-house. We employ a team of 25+ professional website designers and developers that
			have the skill and experience to tackle any challenge, large or small, advanced or basic. We also offer our own, easy-to use, 
			content management system (CMS) and hosting services! <a href="contact-us.php"> Contact us</a> today for a free website design consultation.</p>
		</div>
    </div>
</section>
	
<?php include('footer.php'); ?>

