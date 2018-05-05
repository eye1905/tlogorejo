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
                      <div class="desc" style="font-size: 16px; color: #000; margin-bottom: 10px;">
                        <small>Penulis </small>
                        <small style="font-weight: bold;"><?php echo $row->artikel_author ?></small>
                        <small class="grey"><i class="fa fa-clock-o"></i> <?php echo $row->artikel_tanggal ?></small>
                      </div>
                      <div class="row">
                        <div class="col-md-4" style="padding-right: 0px;">
                          <!-- <img src="<?php echo base_url('assets/img/berita/'.$row->artikel_image) ?>" class="thumbnail" alt="..." style="width: 100%; margin-bottom: 1vh;"> -->
                          <img src="<?php echo base_url('assets/blank_example.jpg') ?>" class="thumbnail" alt="..." style="width: 100%; margin-bottom: 1vh;">
                        </div>
                        <div class="col-md-8">
                          <div class="artikel-isi" style="color: #000;">
                            <?php echo limit_words($row->artikel_isi, 22);; ?> ...
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <a href="<?php echo site_url('berita/read/'.$row->artikel_slug) ?>" class="btn btn-sm btn-primary btn-rounded">Baca Selengkapnya <i class="fa fa-chevron-right"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="tag pull-right">
                            <small class="tag" style="color: #f2f2f2; background-color: #808080; padding: 2px 5px 2px 5px; border-radius: 2px; box-shadow: 1px 1px 1px 0px #d3d3d3;">Informasi</small>
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