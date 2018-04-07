<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <center><h3 class="box-title"><b>Struktur Organisasi</b></h3></center>
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
</section>
</div>

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