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
									<img class="card-img-top" src="<?php echo base_url('assets/img/berita/'.$row->artikel_image) ?>" alt="https://unsplash.com/@cjtagupa">
									<div class="card-body">
										<div class="card-title">
											<a href="<?php echo site_url('read/'.$row->artikel_slug) ?>">
											<?php echo $row->artikel_judul ?>
                        					</a>
                        				</div>
										<p class="card-text">Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>

										<div style="margin-top: 8px;">
											<a href="<?php echo site_url('read/'.$row->artikel_slug) ?>" class="trans_200">Selengkapnya
												<span style="position: absolute; padding-top: 2px; padding-left: 4px;">
													<svg version="1.1" id="link_arrow_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
														 width="19px" height="13px" viewBox="0 0 19 13" enable-background="new 0 0 19 13" xml:space="preserve">
														<polygon fill="#000" points="12.475,0 11.061,0 17.081,6.021 0,6.021 0,7.021 17.038,7.021 11.06,13 12.474,13 18.974,6.5 "/>
													</svg>
												</span>
											</a>
										</div>

										<small class="post_meta"><a href="#"><?php echo $row->artikel_author ?></a><span>Sep 29, 2017 at 9:48 am</span></small>
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