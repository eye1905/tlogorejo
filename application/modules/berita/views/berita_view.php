  <main id="main">

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn" style="background: url('<?php echo base_url('assets/img/bg2.jpg') ?>') fixed center center; background-size: cover; ">
      <div class="container text-center" style="margin-top: 10vh;">
        <h3>Berita Tlogorejo</h3>
        <p>Terkadang informasi lebih bahaya dari senjata <em>#BeritaAntiHoak</em></p>
      </div>
    </section><!-- #call-to-action -->

    <section id="wrapper-content" class="bg-light">
      <div class="container">

        <div class="row">
          <div class="col-md-8" style="margin: 1vh 0 1vh 0;">

          <?php if(!empty($berita)){ ?>
            <?php 
            function limit_words($string, $word_limit){
              $words = explode(" ", $string);
              return implode(" ", array_splice($words, 0, $word_limit));
            }
            foreach($berita as $row) { ?>
            <div class="list-berita" style="margin: 0 0 3vh 0;">
              <div class="row">
                <div class="col-md-12">

                  <div class="card">
                    <div class="container">
                      <h5>
                        <a href="<?php echo site_url('berita/read/'.$row->artikel_slug) ?>">
                          <?php echo $row->artikel_judul ?>
                        </a>
                      </h5>
                      <div class="row">
                        <div class="col-md-4">
                          <!-- <img src="<?php echo base_url('assets/img/berita/'.$row->artikel_image) ?>" class="thumbnail" alt="..." style="width: 100%; margin-bottom: 1vh;"> -->
                          <img src="<?php echo base_url('assets/blank_example.jpg') ?>" class="thumbnail" alt="..." style="width: 100%; margin-bottom: 1vh;">
                        </div>
                        <div class="col-md-8">
                          <div class="artikel-isi">
                            <?php echo limit_words($row->artikel_isi, 22); echo "..."; ?>
                          </div>
                          <a href="<?php echo site_url('berita/read/'.$row->artikel_slug) ?>" class="btn btn-sm btn-primary btn-rounded">Baca Selengkapnya <i class="fa fa-chevron-right"></i></a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="pull-right">
                            <!-- <?php echo base_url($this->uri->uri_string()) ?> URL share -->
                            <div class="fb-like" data-href="https://www.facebook.com" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            <br>
                            <small class="text-muted font-italic"><?php echo $row->artikel_tanggal ?> | <?php echo $row->artikel_author ?></small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          <?php } else { ?>
          <p>Artikel Kosong</p>
          <?php } ?>
          </div>
          <div class="col-md-4" style="margin: 1vh 0 1vh 0;">
            <div class="list-sidebar">

              <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-title" style="color: #FFF; border-bottom: 2px solid #007bff; text-transform: uppercase;">
                      <span style="padding: 3px 10px 3px 10px; background-color: #007bff;">Pemerintah</span>
                    </div>
                    <div class="card-body" style="padding: 0px;">
                      <div class="container">
                        <?php for($i=0; $i<3; $i++){ ?>
                        <div class="media" style="margin-bottom: 5px;">
                          <div class="media-left">
                            <img src="<?php echo base_url('assets/blank_example.jpg') ?>" class="media-object" style="width:100px">
                          </div>
                          <div class="media-body">
                            <a href=""><p>Kecelakaan Beruntun di Bojonegoro, Seorang</p></a>
                            <div class="desc" style="font-size: 14px;">
                              <small style="font-weight: bold;">Desa Tlogorejo</small>
                              <small>- 3 Mei 2018</small>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-title" style="color: #FFF; border-bottom: 2px solid #007bff; text-transform: uppercase;">
                      <span style="padding: 3px 10px 3px 10px; background-color: #007bff;">Kegiatan Desa</span>
                    </div>
                    <div class="card-body" style="padding: 0px;">
                      <div class="container">
                        <?php for($i=0; $i<3; $i++){ ?>
                        <div class="media" style="margin-bottom: 5px;">
                          <div class="media-left">
                            <img src="<?php echo base_url('assets/blank_example.jpg') ?>" class="media-object" style="width:100px">
                          </div>
                          <div class="media-body">
                            <a href=""><p>Kecelakaan Beruntun di Bojonegoro, Seorang</p></a>
                            <div class="desc" style="font-size: 14px;">
                              <small style="font-weight: bold;">Desa Tlogorejo</small>
                              <small>- 3 Mei 2018</small>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-title" style="color: #FFF; border-bottom: 2px solid #007bff; text-transform: uppercase;">
                      <span style="padding: 3px 10px 3px 10px; background-color: #007bff;">Pembinaan Masayarakat</span>
                    </div>
                    <div class="card-body" style="padding: 0px;">
                      <div class="container">
                        <?php for($i=0; $i<3; $i++){ ?>
                        <div class="media" style="margin-bottom: 5px;">
                          <div class="media-left">
                            <img src="<?php echo base_url('assets/blank_example.jpg') ?>" class="media-object" style="width:100px">
                          </div>
                          <div class="media-body">
                            <a href=""><p>Kecelakaan Beruntun di Bojonegoro, Seorang</p></a>
                            <div class="desc" style="font-size: 14px;">
                              <small style="font-weight: bold;">Desa Tlogorejo</small>
                              <small>- 3 Mei 2018</small>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Embede Youtube -->
              <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">
                  <div class="card" style="padding-top: 0px; padding-bottom: 0px;">
                    <iframe style="width: 100%; height: 180px;" src="https://www.youtube.com/embed/3rbNxGIag1o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                    </iframe>
                  </div>
                </div>
              </div>

            </div> 
          </div>
        </div>

      </div>
    </section>

  </main>