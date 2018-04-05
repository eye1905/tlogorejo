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
            <div class="list-berita" style="margin: 0 0 3vh 0;">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="container">                    
                    <?php if(!empty($berita)){ ?>
                      <?php foreach($berita as $row){ ?>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="title-artikel">
                            <h3>
                              <a href="#"><?php echo $row->artikel_judul ?></a>
                            </h3>
                          </div>
                          <div class="body-artikel">
                            <div class="thumb col-md-8" style="margin: 0 auto;">
                              <img src="<?php echo base_url('assets/img/berita/sample.jpg') ?>" class="thumbnail" alt="..." style="width: 100%; margin-bottom: 1vh;">
                            </div>
                            <div class="content-artikel">
                              <br>
                              <?php echo $row->artikel_isi ?>
                            </div>
                          </div>
                          <div class="footer-artikel">
                            <div class="pull-left">
                              <!-- <?php echo base_url($this->uri->uri_string()) ?> URL share -->
                              <!-- Your like & share button code -->
                              <div class="fb-like" 
                                data-href="https://www.facebook.com" 
                                data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                              </div>
                            </div>
                            <div class="pull-right">
                              <br>
                              <small class="badge font-italic" style="background-color: #4267b2; color: #fff; font-weight: 600;"><?php echo $row->artikel_tanggal ?> | <?php echo $row->artikel_author ?></small>
                            </div>
                          </div>                          
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-12">

                          <?php if($row->artikel_komentar == FALSE){ ?>
                          <div class="alert alert-warning"><i class="fa fa-ban"></i><em> Komentar dinonaktifkan!</em></div>
                          <?php } else { ?>
                          <div class="fb-comments" data-href="https://www.facebook.com/abdulrozak.ramadhoni#configurator" data-numposts="5" data-width="100%"></div>

                          <!-- <div class="form-komentar">
                            <form>
                              <div class="form-group">
                                <input type="text" name="" class="form-control" placeholder="Masukan Nama" disabled>
                              </div>
                              <div class="form-group">
                                <textarea class="form-control" disabled></textarea>
                              </div>
                              <div class="form-group">
                                <button class="btn btn-md btn-primary btn-flat disabled">Kirim</button>
                              </div>
                            </form>
                          </div>
                          <hr> -->
                          <!-- <div class="list-komentar">
                            <div class="pull-left">
                              
                              <div class="media">
                                <div class="media-left">
                                  <a href="#">
                                    <img class="media-object" src="" alt="...">
                                  </a>
                                </div>
                                <div class="media-body">
                                  <h5 class="media-heading">Abdul Rozak</h5>
                                  <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>

                                  <div class="media">
                                    <div class="media-left">
                                      <a href="#">
                                        <img class="media-object" src="" alt="...">
                                      </a>
                                    </div>
                                    <div class="media-body">
                                      <h5 class="media-heading admin">Admin</h5>
                                      <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>  
                          </div> -->
                          <?php } ?>
                        </div>
                      </div>
                      <?php } ?>
                    <?php } else { ?>
                      <!-- Jika Kosong -->
                      <?php echo 'Kosong' ?>
                    <?php } ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="list-artikel-terkait">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="container">
                      <div class="pull-left">
                        <a href="#"><span class="fa-2x fa fa-chevron-left"></span></a>
                      </div>
                      <div class="pull-right">
                        <a href="#"><span class="fa-2x fa fa-chevron-right"></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-4" style="margin: 1vh 0 1vh 0;">
            <div class="list-sidebar">
              <div class="row">
                <div class="col-md-12">

                  <div class="card">
                    <div class="container">
                      Berita Terkait
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