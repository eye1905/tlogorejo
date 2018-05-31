<!DOCTYPE html>
<html lang="en">
<head>
<title>Website Desa Tlogorejo</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Demo project">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="<?php echo base_url('assets')?>/img/logone.png"/>

<?php if($this->uri->segment(1) == 'read') { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>styles/bootstrap4/bootstrap.min.css">
	<link href="<?php echo base_url('assets/avision/') ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>styles/post.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>styles/post_responsive.css">
<?php } else { ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>styles/bootstrap4/bootstrap.min.css">
	<link href="<?php echo base_url('assets/avision/') ?>plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/avision/') ?>styles/responsive.css">
<?php } ?>

</head>
<body>

<style type="text/css">
	.post_body {
	    padding-left: 30px;
	    padding-top: 30px;
	    padding-right: 30px;
	    padding-bottom: 45px;
	    background: #FFFFFF;
	    border-radius: 6px;
	}

	.footer_content {
	    text-align: left;
	    padding-left: 30px;
	}

	.home_slider_background {
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 64%;
	    background-repeat: no-repeat;
	    background-size: cover;
	    background-position: center top;
	}

	.card-img-top {
		width: 100%;
	    height: 12rem; /* vw */
	    object-fit: cover;
	}

	.breadcrumb {
		background-color: #f7f7f7; margin-bottom: 0px; position: absolute; padding: .75rem 0rem; top: 1rem;
	}
	a {
		color: #000;
	}
</style>

<div class="super_container">

	<!-- Header and Menu Mobile-->
	<?php $this->load->view('avision/header_menu') ?>
	
	<!-- Home and Page Content -->
	<?= $contents ?>

	<!-- Footer -->
	<?php $this->load->view('avision/footer') ?>
</div>
<?php if($this->uri->segment(1) == 'read') { ?>
	<script src="<?php echo base_url('assets/avision/') ?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>styles/bootstrap4/popper.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>styles/bootstrap4/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>plugins/easing/easing.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>plugins/masonry/masonry.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>plugins/parallax-js-master/parallax.min.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>js/post.js"></script>
<?php } else { ?>
	<script src="<?php echo base_url('assets/avision/') ?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>styles/bootstrap4/popper.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>styles/bootstrap4/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>plugins/easing/easing.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>plugins/masonry/masonry.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>plugins/masonry/images_loaded.js"></script>
	<script src="<?php echo base_url('assets/avision/') ?>js/custom.js"></script>
<?php } ?>

<script>
function scrollTo(to, duration) {
    if (document.body.scrollTop == to) return;
    var diff = to - document.body.scrollTop;
    var scrollStep = Math.PI / (duration / 10);
    var count = 0, currPos;
    start = element.scrollTop;
    scrollInterval = setInterval(function(){
        if (document.body.scrollTop != to) {
            count = count + 1;
            currPos = start + diff * (0.5 - 0.5 * Math.cos(count * scrollStep));
            document.body.scrollTop = currPos;
        }
        else { clearInterval(scrollInterval); }
    },10);
}

function test(elID)
{
    var dest = document.getElementById(elID);
    scrollTo(dest.offsetTop, 500);
}
</script>

</body>
</html>