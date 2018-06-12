<style type="text/css">
	p {
		font-size: 16px;
	    line-height: 1.875;
	    color: rgba(0,0,0,0.8);
	}
</style>
<!-- Home -->
<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url('uploads/berita/'.$artikel_image) ?>" data-speed="0.8"></div>
	<div class="home_content">
		<div class="post_category trans_200"><a href="category.html" class="trans_200"></a></div>
	</div>
</div>

<!-- Page Content -->
<div class="page_content" id="berita">
	<div class="container">
		<div class="row row-lg-eq-height">
			<!-- Post Content -->
			<div class="col-lg-9">
				<div class="post_content">
					<div class="post_title" style="color: #000;"><?php echo $artikel_judul ?></div>
					<!-- Top Panel -->
					<div class="post_panel post_panel_top d-flex flex-row align-items-center justify-content-start" style="margin-top: 0px;">
						<div class="author_image"><div><img src="<?php echo base_url('assets/avision/') ?>images/author.jpg" alt=""></div></div>
						<div class="post_meta"><a href="#"><?php echo $artikel_author ?></a><span><?php echo $artikel_tanggal ?></span></div>
						<div class="post_share ml-sm-auto">
							<span>share</span>
							<ul class="post_share_list">
								<li class="post_share_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="post_share_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="post_share_item"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>

					<!-- Post Body -->

					<div class="post_body">
						<figure style="text-align: center; margin: 0px;">
							<div class="row">
								<div class="col-lg-8">
									<img src="<?php echo base_url('uploads/berita/'.$artikel_image) ?>" alt="">	
								</div>
							</div>
							<figcaption><?php echo $artikel_judul ?></figcaption>
						</figure>

						<p class="post_p" style="margin-top: 20px;"><?php echo $artikel_isi ?></p>

						<div class="post_quote">
							<p class="post_p">Aliquam auctor lacus a dapibus pulvinar. Morbi in elit erat. Quisque et augue nec tortor blandit hendrerit eget sit amet sapien. Curabitur at tincidunt metus, quis porta ex. Duis lacinia metus vel eros cursus pretium eget.</p>
							<div class="post_quote_source">Robert Morgan</div>
						</div>

						<!-- Post Tags -->
						<div class="post_tags">
							<ul>
								<li class="post_tag"><a href="#">Liberty</a></li>
								<li class="post_tag"><a href="#">Manual</a></li>
								<li class="post_tag"><a href="#">Interpretation</a></li>
								<li class="post_tag"><a href="#">Recommendation</a></li>
							</ul>
						</div>
					</div>
					
					<!-- Bottom Panel -->
					<div class="post_panel bottom_panel d-flex flex-row align-items-center justify-content-start">
						<div class="author_image"><div><img src="<?php echo base_url('assets/avision/') ?>images/author.jpg" alt=""></div></div>
						<div class="post_meta"><a href="#"><?php echo $artikel_author ?></a><span><?php echo $artikel_tanggal ?></span></div>
						<div class="post_share ml-sm-auto">
							<span>share</span>
							<ul class="post_share_list">
								<li class="post_share_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="post_share_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="post_share_item"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>

					<!-- Similar Posts -->
					<div class="similar_posts">
						<div class="grid clearfix">

							<!-- Small Card With Image -->
							<div class="card card_small_with_image grid-item">
								<img class="card-img-top" src="<?php echo base_url('assets/avision/') ?>images/post_25.jpg" alt="https://unsplash.com/@jakobowens1">
								<div class="card-body">
									<div class="card-title card-title-small"><a href="post.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</a></div>
									<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
								</div>
							</div>

							<!-- Small Card With Image -->
							<div class="card card_small_with_image grid-item">
								<img class="card-img-top" src="<?php echo base_url('assets/avision/') ?>images/post_2.jpg" alt="https://unsplash.com/@jakobowens1">
								<div class="card-body">
									<div class="card-title card-title-small"><a href="post.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</a></div>
									<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
								</div>
							</div>

						</div>

						<?php if(false) { ?>
						<!-- Post Comment -->
						<div class="post_comment">
							<div class="post_comment_title">Post Comment</div>
							<div class="row">
								<div class="col-xl-8">
									<div class="post_comment_form_container">
										<form action="#">
											<input type="text" class="comment_input comment_input_name" placeholder="Your Name" required="required">
											<input type="email" class="comment_input comment_input_email" placeholder="Your Email" required="required">
											<textarea class="comment_text" placeholder="Your Comment" required="required"></textarea>
											<button type="submit" class="comment_button">Post Comment</button>
										</form>
									</div>
								</div>
							</div>
						</div>

						<!-- Comments -->
						<div class="comments">
							<div class="comments_title">Comments <span>(12)</span></div>
							<div class="row">
								<div class="col-xl-8">
									<div class="comments_container">
										<ul class="comment_list">
											<li class="comment">
												<div class="comment_body">
													<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
														<div class="comment_author_image"><div><img src="<?php echo base_url('assets/avision/') ?>images/comment_author_1.jpg" alt=""></div></div>
														<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
														<button type="button" class="reply_button ml-auto">Reply</button>
													</div>
													<div class="comment_content">
														<p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.</p>
													</div>
												</div>

												<!-- Reply -->
												<ul class="comment_list">
													<li class="comment">
														<div class="comment_body">
															<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
																<div class="comment_author_image"><div><img src="<?php echo base_url('assets/avision/') ?>images/comment_author_2.jpg" alt=""></div></div>
																<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
																<button type="button" class="reply_button ml-auto">Reply</button>
															</div>
															<div class="comment_content">
																<p>Nulla facilisi. Aenean porttitor quis tortor id tempus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus molestie varius tincidunt. Vestibulum congue sed libero ac sodales.</p>
															</div>
														</div>

														<!-- Reply -->
														<ul class="comment_list">
															
														</ul>
													</li>
												</ul>
											</li>
											<li class="comment">
												<div class="comment_body">
													<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
														<div class="comment_author_image"><div><img src="<?php echo base_url('assets/avision/') ?>images/comment_author_1.jpg" alt=""></div></div>
														<small class="post_meta"><a href="#">Katy Liu</a><span>Sep 29, 2017 at 9:48 am</span></small>
														<button type="button" class="reply_button ml-auto">Reply</button>
													</div>
													<div class="comment_content">
														<p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened.</p>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>	
						</div>
						<?php } else { ?>
						<br>
						<div class="alert alert-success" style="border: 0px;"><i class="fa fa-ban"></i> Komentar Dinonaktifkan!</div>
						<?php } ?>

					</div>
				</div>
				<div class="load_more">
					<!-- <div id="load_more" class="load_more_button text-center trans_200">Load More</div> -->
				</div>
			</div>

			<?php $this->load->view('avision/sidebar') ?>

		</div>
	</div>
</div>