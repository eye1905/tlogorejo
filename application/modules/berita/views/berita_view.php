  <main id="main">

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn" style="background: url('<?php echo base_url('assets/img/bg2.jpg') ?>') fixed center center; background-size: cover; ">
      <div class="container text-center" style="margin-top: 10vh;">
        <h3>Berita Tlogorejo</h3>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
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
                          <img src="<?php echo base_url('assets/img/berita/'.$row->artikel_image) ?>" class="thumbnail" alt="..." style="width: 100%; margin-bottom: 1vh;">
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
              <div class="row">
                <div class="col-md-12">

                  <div class="card">
                    <div class="container">
                      <div style="width: 100%; height: auto; padding: 6px 4px 6px 4px; border-bottom: 2px solid #bfbfbf;">
                        <h5 style="margin-bottom: 0; text-align: center;">ARTIKEL TERBARU</h5>
                      </div>
                      <div class="media" style="margin-bottom: 5px;">
                        <div class="media-left">
                          <img src="https://www.w3schools.com/bootstrap/img_avatar1.png" class="media-object" style="width:60px">
                        </div>
                        <div class="media-body">
                          <a href=""><p>Kecelakaan Beruntun di Bojonegoro, Seorang Pemotor ...</p></a>
                        </div>
                      </div>
                      <div class="media" style="margin-bottom: 5px;">
                        <div class="media-left">
                          <img src="https://www.w3schools.com/bootstrap/img_avatar1.png" class="media-object" style="width:60px">
                        </div>
                        <div class="media-body">
                          <a href=""><p>Voluptatum deleniti atque corrupti quos dolores et quas molestias ...</p></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="row" style="margin-top: 20px;">
                <div class="col-md-12">

                  <div class="card">
                    <div class="container">
                      <div style="width: 100%; height: auto; padding: 6px 4px 6px 4px; border-bottom: 2px solid #bfbfbf;">
                        <h5 style="margin-bottom: 0; text-align: center;">ARTIKEL TERBARU</h5>
                      </div>
                      <div class="media" style="margin-bottom: 5px;">
                        <div class="media-left">
                          <img src="https://www.w3schools.com/bootstrap/img_avatar1.png" class="media-object" style="width:60px">
                        </div>
                        <div class="media-body">
                          <a href=""><p>Kecelakaan Beruntun di Bojonegoro, Seorang Pemotor ...</p></a>
                        </div>
                      </div>
                      <div class="media" style="margin-bottom: 5px;">
                        <div class="media-left">
                          <img src="https://www.w3schools.com/bootstrap/img_avatar1.png" class="media-object" style="width:60px">
                        </div>
                        <div class="media-body">
                          <a href=""><p>Voluptatum deleniti atque corrupti quos dolores et quas molestias ...</p></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div> 
          </div>
        </div>

      </div>
    </section>

  </main>