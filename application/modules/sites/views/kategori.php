<div class="home" id="home">
	<!-- Home Slider -->
	<div class="home_slider_container">
		<div class="owl-carousel owl-theme home_slider">
			<!-- Slider Item -->
			<div class="owl-item">
				<div class="home_slider_background" style="background-image:url('https://wisatabojonegoro.com/wp-content/uploads/2017/05/KGS-252.jpg'); background-position: center center;"></div>
				<div class="home_slider_content_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_slider_content">
									<div class="home_slider_item_title">
										<a href="post.html">Welcome to Website Desa Tlogorejo</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

		<div class="custom_nav_container home_slider_nav_container">
			<div class="custom_prev custom_prev_home_slider">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
					<polyline fill="#FFFFFF" points="0,5.61 5.609,0 7,0 7,1.438 2.438,6 7,10.563 7,12 5.609,12 -0.002,6.39 "/>
				</svg>
			</div>
	        <ul id="custom_dots" class="custom_dots custom_dots_home_slider">
				<li class="custom_dot custom_dot_home_slider active"><span></span></li>
				<li class="custom_dot custom_dot_home_slider"><span></span></li>
				<li class="custom_dot custom_dot_home_slider"><span></span></li>
			</ul>
			<div class="custom_next custom_next_home_slider">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 width="7px" height="12px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve">
					<polyline fill="#FFFFFF" points="6.998,6.39 1.389,12 -0.002,12 -0.002,10.562 4.561,6 -0.002,1.438 -0.002,0 1.389,0 7,5.61 "/>
				</svg>
			</div>
		</div>

	</div>
</div>

<!-- Page Content -->
<div class="page_content" id="berita" style="margin-top: -240px; z-index: 90;">
	<div class="container">
		<div class="row row-lg-eq-height">
			<!-- Main Content -->
			<div class="col-lg-9">
				<div class="main_content">
					<!-- Blog Section - Don't Miss -->
					<div class="blog_section">
						<div class="section_panel d-flex flex-row align-items-center justify-content-start">
							<div class="section_title">Berita Terbaru</div>
							<div class="section_tags ml-auto">
								<ul>
									<li class="active"><a href="category.html">all</a></li>
								</ul>
							</div>
							<div class="section_panel_more">
								<ul>
									<li>more
										<ul>
											<?php foreach($kategori as $row) { ?>
											<li><a href="<?php echo base_url(''.$row->kategori_slug) ?>"><?php echo $row->kategori_nama ?></a></li>
											<?php } ?>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<div class="section_content">
							<div class="grid clearfix">

							<?php if (!empty($berita_kategori)) { ?>
								<?php foreach ($berita_kategori as $row) { ?>
								<!-- Largest Card With Image -->
								<div class="card card_largest_with_image grid-item">
									<div style="height: 220px; background-image: url(<?php echo base_url('assets/img/berita/'.$row->artikel_image) ?>); background-size: cover; background-position: center"></div>
									<div class="card-body">
										<div class="card-title">
											<a href="<?php echo site_url('read/'.$row->artikel_slug) ?>">
											<?php echo $row->artikel_judul ?>
                        					</a>
                        				</div>
										<p class="card-text">Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>
										<small class="post_meta"><a href="#"><?php echo $row->artikel_author ?></a><span><?php echo $row->artikel_tanggal ?></span></small>
									</div>
								</div>
								<?php } ?>
							<?php } else { ?>
								<div class="card card_largest_with_image grid-item">
									<div class="card-body">
										<div class="card-title">
											Tidak Ditemukan!
                        				</div>
									</div>
								</div>
							<?php } ?>

								<!-- Small Card Without Image -->
								<div class="card card_default card_small_no_image grid-item">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</a></div>
										<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
									</div>
								</div>
								<!-- Small Card Without Image -->
								<div class="card card_default card_small_no_image grid-item">
									<div class="card-body">
										<div class="card-title card-title-small"><a href="post.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</a></div>
										<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>
				<div class="load_more">
					<div id="load_more" class="load_more_button text-center trans_200">Load More</div>
				</div>
			</div>

			<?php $this->load->view('avision/sidebar') ?>

		</div>
	</div>
</div>