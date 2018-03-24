  <main id="main">

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn" style="background: url('<?php echo base_url('assets') ?>/img/bg.jpg') fixed center center">
      <div class="container text-center" style="margin-top: 10vh;">
        <h3>Berita Tlogorejo</h3>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
      </div>
    </section><!-- #call-to-action -->

    <section id="wrapper-content" class="bg-light">
      <div class="container">

        <div class="row">
          <div class="col-md-8" style="margin: 1vh 0 1vh 0;">
            <?php for($i=0; $i < 5; $i++) { ?>
            <div class="list-berita" style="margin: 0 0 3vh 0;">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="container">
                      <h5>
                        <a href="#">
                          Hello World Hello World Hello World
                        </a>
                      </h5>
                      <div class="row">
                        <div class="col-md-4">
                          <img src="<?php echo base_url('assets/img/berita/sample.jpg') ?>" class="thumbnail" alt="..." style="width: 100%; margin-bottom: 1vh;">
                        </div>
                        <div class="col-md-8">
                          <p>Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World...</p>
                          <a href="<?php echo base_url('berita/read/'.$i++) ?>" class="btn btn-sm btn-primary btn-rounded">Baca Selengkapnya <i class="fa fa-chevron-right"></i></a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="pull-right">
                            <small class="text-muted">21 Maret 2018 | Admin</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="col-md-4" style="margin: 1vh 0 1vh 0;">
            <div class="list-sidebar">
              <div class="row">
                <div class="col-md-12">

                  <div class="card">
                    <div class="container">
                      <form>
                        <div class="form-group">
                          <input type="" name="" class="form-control" style="border-radius: 0;">
                        </div>
                      </form>
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