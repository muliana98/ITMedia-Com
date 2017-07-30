<!DOCTYPE html>
<html lang="en">
<head>
<!-- META TAG -->
<?php require("meta.php"); ?>
<title>ITMedia-Com</title>
<?php require("link-css.php"); ?>
<?php require("javascript.php"); ?>
</head>
<body style="background: url(assets/picture/particle_triangle1_1.png) no-repeat center center fixed; -webkit-background-size: 100% 100%; -moz-background-size: 100% 100%; -o-background-size: 100% 100%; background-size: 100% 100%; padding-top: 40px;" 
data-spy="scroll" data-target=".navbar" data-offset="0" id="section-first">
<!-- Section-Index -->
<div class="row-fluid" id="section-index">

<!-- Section-Beranda -->
<div class="row-fluid" id="section-beranda">
	<!-- Section-Navigasi -->
		<?php require("navigasi.php"); ?>
	<!-- Section-Navigasi -->

<?php
if(isset($_GET['menu'])) {
	$menu = $_GET['menu'];
	
	if($menu=="menu") {
		require("menu.php");
		
		
	}
	//LAYANAN DETAIL
	else if($menu=="layanan-detail") {
		require("section/layanan/layanan-detail.php");
		
	}
	//BLOG DETAIL
	else if($menu=="blog-detail") {
		require("section/blog/blog-detail.php");
	
	}
	else if($menu=="blog-detail-category") {
		require("section/blog/blog-detail-category.php");
	
	}
	//PORTFOLIO DETAIL
	else if($menu=="portfolio-detail") {
		require("section/portfolio/portfolio-detail.php");
	
	}
	else if($menu=="portfolio-detail-category") {
		require("section/portfolio/portfolio-detail-category.php");
	
	}
	else if($menu=="pencarian") {
		require("pencarian.php");
	}
	else if($menu=="show-detail") {
		require("show-detail.php");
	}

	else {
		require("home.php");
	}
	
	
}
else {
	require("home.php");
}


?>


<!-- Section-Footer -->
<?php require("footer.php"); ?>
</div>
</div>
<!-- Footer -->


<script>
	  !function ($) {
	  $(function() {
	  $('#itmedia_carousel').carousel()
		})
	  } (window.jQuery)
</script>
<script>
$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#myNavbar a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>
</body>
</html>
	