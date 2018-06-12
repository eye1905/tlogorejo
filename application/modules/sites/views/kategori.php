<style type="text/css">
	.header {
	    position: fixed;
	    top: 0;
	    left: 0;
	    width: 100%;
	    z-index: 100;
	    background: rgba(0,0,0,0.75);
	    -webkit-transition: all 200ms ease;
	    -moz-transition: all 200ms ease;
	    -ms-transition: all 200ms ease;
	    -o-transition: all 200ms ease;
	    transition: all 200ms ease;
	}
</style>


<!-- Page Content -->
<div class="page_content" id="berita" style="margin-top: 108px; z-index: 90;">
	<div class="container">
		<div class="row row-lg-eq-height">
			<!-- Main Content -->
			<div class="col-lg-9">
				<div class="main_content">
					<!-- Blog Section - Don't Miss -->
					<div class="blog_section">
						<div class="section_panel d-flex flex-row align-items-center justify-content-start">
							<div class="section_title">Filter</div>
							<div class="section_tags ml-auto" style="margin-right: 20px;">
								<ul>
									<li class="active"><a href="category.html">all</a></li>
								</ul>
							</div>
							<div class="section_panel_more">
								<ul>
									<li><span style="position: absolute; bottom: 13px; right: 20px;">kategori</span>
										<ul>
											<?php foreach($kategori as $row) { ?>
											<li><a href="<?php echo base_url(''.$row->slug) ?>"><?php echo $row->kategori ?></a></li>
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
								<div class="card card_large_with_background grid-item">
									<div class="card_background" style="background-image:url(<?php echo base_url('uploads/berita/'.$row->thumb) ?>)"></div>
									<div class="card-body">
										<div class="card-title"><a href="<?php echo site_url('read/'.$row->slug) ?>"><?php echo $row->judul ?></a></div>

										<p class="card-text" style="color: #F2F2F2;">Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...
										</p>

										<small class="post_meta"><a href="#"><?php echo $row->author ?></a><span>Sep 29, 2017 at 9:48 am</span></small>
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