  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <?php
            foreach ($slider as $key => $value) {
            ?>
            <div class="carousel-background">
              <img src="<?php echo base_url()?>assets/img/slider/thumbnails/<?php echo $value->foto; ?>" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2><?php echo $value->judul; ?></h2>
                <p><?php echo $value->deskripsi; ?></p>
                <a href="#featured-berita" class="btn-get-started scrollto">Get Started</a>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Berita Section
    ============================-->
    <section id="featured-berita">
      <div class="container-fluid" style="margin-bottom: 6vh;">
        <div class="row">
          <div id="breaking-news-container">
            <div id="breaking-news-colour" class="slideup animated">
              
            </div>  
            <span class="breaking-news-title delay-animated slidein">
              <strong>BREAKING</strong>
            </span> 
              <a class="breaking-news-headline delay-animated2 fadein marquee">
                <?php for($i=0; $i<2; $i++){ ?>
                | Kecelakaan Beruntun di Bojonegoro, Seorang Pemotor Meninggal Dunia di TKP 
                <?php } ?>
              </a>
          </div> 
        </div>
      </div>  
      <div class="container">
        <div class="row">
        <?php 
          function limit_words($string, $word_limit){
              $words = explode(" ", $string);
              return implode(" ", array_splice($words, 0, $word_limit));
          }
        foreach($berita as $row): ?>
        <div class="col-lg-4 box example1" style="background: url('<?php echo base_url('assets')?>/img/berita/1.jpg')">
          <div class="bg-opacity">
            <h4 class="title"><a href=""><?php echo limit_words($row->artikel_judul, 5) ?> ...</a></h4>
            <p class="description"><?php echo limit_words($row->artikel_isi, 10)?> ...</p>
          </div>
        </div>
        <?php endforeach; ?>
        </div>
        <div class="row" style="margin-top: 3vh;">
          <div class="col-md-12">
            <div class="container text-center" style="margin-bottom: 20px;">
              <a href="<?php echo base_url('berita') ?>" class="btn btn-md btn-primary btn-rounded" style="padding-right: 2em; padding-left: 2em;">Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #featured-berita -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Layanan</h3>
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-paper-outline"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn" style="background: url('<?php echo base_url('assets/img/bg2.jpg') ?>') fixed center center; background-size: cover; ">
      <div class="container text-center">
        <h3>Call To Action</h3>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a class="cta-btn" href="#">Call To Action</a>
      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Lembaga</h3>
        </header>

        <div class="owl-carousel clients-carousel">
        <?php foreach($lembaga as $row): ?>
          <a href="<?php echo site_url('lembaga/r/'.$row->lembaga_slug) ?>" class="text-center">
            <img src="<?php echo base_url('assets/img/lembaga/'.$row->lembaga_gambar)?>" alt="" style="height: 86px; width: auto;"><?php echo $row->lembaga_nama ?>
          </a>
        <?php endforeach; ?>
        </div>

      </div>
    </section><!-- #clients -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Struktur Organisasi Desa Tlogorejo</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="box-body">
        <div class="row">
          <div class="col-sm-12">
            <div id="myDiagramDiv" style="width:100%; height:600px; background-color: #fff;">
              
            </div>
          </div>
        </div>
        </div>
        </div>

      </div>
    </section><!-- #team -->

  </main>


<script src="<?php echo base_url(); ?>assets/go-debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gojs/1.8.15/go-debug.js"></script>
<script type="text/javascript">
var $ = go.GraphObject.make;

var myDiagram =
  $(go.Diagram, "myDiagramDiv",
    {
      initialContentAlignment: go.Spot.Center, // center Diagram contents
      "undoManager.isEnabled": true, // enable Ctrl-Z to undo and Ctrl-Y to redo
      layout: $(go.TreeLayout, // specify a Diagram.layout that arranges trees
                { angle: 90, layerSpacing: 35 })
    });

// the template we defined earlier
myDiagram.nodeTemplate =
  $(go.Node, "Horizontal",
    { background: "#00bfff" },
    $(go.Picture,
      { margin: 10, width: 60, height: 80, background: "white" },
      new go.Binding("source")),
    $(go.TextBlock, "Default Text",
      { margin: 12, stroke: "white", font: "bold 16px sans-serif" },
      new go.Binding("text", "name"))
  );

// define a Link template that routes orthogonally, with no arrowhead
myDiagram.linkTemplate =
  $(go.Link,
    { routing: go.Link.Orthogonal, corner: 5 },
    $(go.Shape, { strokeWidth: 3, stroke: "black" })); // the link shape

var model = $(go.TreeModel);
model.nodeDataArray =
[
  <?php foreach ($struktur as $key => $value) {?>
  { key: "<?php echo $value->id; ?>", 
    parent: "<?php echo $value->id_role; ?>", 
    name: "<?php echo $value->Jabatan; ?> \n\n <?php echo $value->nama; ?>",    
    source: "<?php echo base_url().'assets/img/uploads/thumbnails/'.$value->foto; ?>" },
    <?php } ?>
];
myDiagram.model = model;
</script>