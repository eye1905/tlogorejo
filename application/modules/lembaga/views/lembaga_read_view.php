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
                    <?php if(!empty($lembaga)){ ?>
                      <?php foreach($lembaga as $row){ ?>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="title-artikel">
                            <h3>
                              <a href="#"><?php echo $row->lembaga_nama ?></a>
                            </h3>
                          </div>
                          <div class="body-artikel">
                            <div class="thumb col-md-8" style="margin: 0 auto;">
                              <img src="<?php echo base_url('assets/img/lembaga/'.$row->lembaga_gambar) ?>" class="thumbnail" alt="..." style="width: 50%; margin-bottom: 1vh;">
                            </div>
                            <div class="content-artikel">
                              <br>
                              <?php echo $row->lembaga_deskripsi ?>
                            </div>
                          </div>                         
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