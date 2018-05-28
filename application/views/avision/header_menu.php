<header class="header">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="header_content d-flex flex-row align-items-center justify-content-start">
					<div class="logo">
						<img src="<?php echo base_url('assets/images/logo.png') ?>" style="height: 32px; width: auto; position: absolute;">
						<a href="<?php echo site_url('home') ?>" style="padding-left: 36px;">Tlogorejo</a>
					</div>
					<nav class="main_nav">
						<ul>
							<li><a href="<?php echo site_url('home') ?>">Home</a></li>
							<li><a href="#berita">Berita</a></li>
							<li><a href="#">Lembaga</a></li>
							<li><a href="#">Monografi</a></li>
							<li><a href="contact.html">Struktur</a></li>
						</ul>
					</nav>
					<div class="search_container ml-auto">
						<div class="weather">
							<div class="temperature">+10°</div>
							<img class="weather_icon" src="<?php echo base_url('assets/avision/') ?>images/cloud.png" alt="">
						</div>
						<form action="#">
							<input type="search" class="header_search_input" required="required" placeholder="Type to Search...">
							<img class="header_search_icon" src="<?php echo base_url('assets/avision/') ?>images/search.png" alt="">
						</form>
						
					</div>
					<div class="hamburger ml-auto menu_mm">
						<i class="fa fa-bars trans_200 menu_mm" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Menu -->
<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
	<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
	<div class="logo menu_mm"><a href="#">Tlogorejo</a></div>
	<div class="search">
		<form action="#">
			<input type="search" class="header_search_input menu_mm" required="required" placeholder="Type to Search...">
			<img class="header_search_icon menu_mm" src="<?php echo base_url('assets/avision/') ?>images/search_2.png" alt="">
		</form>
	</div>
	<nav class="menu_nav">
		<ul class="menu_mm">
			<li class="menu_mm"><a href="index.html">Home</a></li>
			<li class="menu_mm"><a href="#">Berita</a></li>
			<li class="menu_mm"><a href="#">Lembaga</a></li>
			<li class="menu_mm"><a href="#">Monografi</a></li>
			<li class="menu_mm"><a href="#">Transparasi Dana</a></li>
			<li class="menu_mm"><a href="contact.html">Struktur</a></li>
			<li class="menu_mm"><a href="contact.html">Dasar Hukum</a></li>
		</ul>
	</nav>
</div>