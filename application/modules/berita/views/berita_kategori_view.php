  <main id="main">

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn" style="background: url('<?php echo base_url('assets') ?>/img/bg2.jpg') fixed center center; background-size: cover;">
      <div class="container text-center" style="margin-top: 10vh;">
        <h3>Berita Tlogorejo</h3>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
      </div>
    </section><!-- #call-to-action -->

    <section id="wrapper-content" class="bg-light">
      <div class="container">

        <div class="row">
          <div class="col-md-8" style="margin: 1vh 0 1vh 0;">
          <?php if(!empty($berita_kategori)){ ?>
            <?php 
            function limit_words($string, $word_limit){
              $words = explode(" ", $string);
              return implode(" ", array_splice($words, 0, $word_limit));
            }
            foreach($berita_kategori as $row) { ?>
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
                      <div class="desc" style="font-size: 16px; color: #000; margin-bottom: 10px;">
                        <small>Penulis </small>
                        <small style="font-weight: bold;"><?php echo $row->artikel_author ?></small>
                        <small class="grey"><i class="fa fa-clock-o"></i> <?php echo $row->artikel_tanggal ?></small>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <img src="<?php echo base_url('assets/img/berita/'.$row->artikel_image) ?>" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="artikel-isi" style="color: #000;">
                            <?php echo limit_words($row->artikel_isi, 22); echo "..."; ?>
                          </div>
                          <a href="<?php echo site_url('berita/read/'.$row->artikel_slug) ?>" class="btn btn-sm btn-primary btn-rounded">Baca Selengkapnya <i class="fa fa-chevron-right"></i></a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="pull-right">
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
              <?php $this->load->view('list_sidebar') ?>
            </div> 
          </div>
        </div>

      </div>
    </section>

  </main>