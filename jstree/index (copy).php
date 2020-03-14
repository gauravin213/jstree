<!DOCTYPE html>
<html>
<head>
	<title>js tree</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">


	<link rel="stylesheet" href="dist/themes/default/style.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script src="dist/jstree.min.js"></script>

</head>
<body>



<div id="jstree_demo"></div>


<script type="text/javascript">
/*$(document).ready(function(){ 
    //fill data to tree  with AJAX call
    $('#tree-container').jstree({
    'plugins': ["wholerow", "checkbox", "dnd"],
        'core' : {
            'data' : {
                "url" : "response.php",
                "plugins" : [ "wholerow", "checkbox" ],
                "dataType" : "json" // needed only if you do not supply JSON headers
            }
        }
    }) 
});*/



//

var catejstree = $('#jstree_demo');

catejstree.jstree({
  /*"conditionalselect" : function (node, event) {
      return false;
  },*/
  "core" : {
    "animation" : 0,
    "check_callback" : true,
    "themes" : { "stripes" : true },
    'data' : {
                "url" : "response.php",
                "plugins" : [ "wholerow", "checkbox" ],
                "dataType" : "json" // needed only if you do not supply JSON headers
            }
  },
  "types" : {
    "#" : {
      "max_children" : 1,
      "max_depth" : 4,
      "valid_children" : ["root"]
    },
    "root" : {
      "icon" : "/static/3.3.9/assets/images/tree_icon.png",
      "valid_children" : ["default"]
    },
    "default" : {
      "valid_children" : ["default","file"]
    },
    "file" : {
      "icon" : "glyphicon glyphicon-file",
      "valid_children" : []
    }
  },
  "plugins" : [
  //"checkbox",
  //"contextmenu",
  "dnd",
  "massload",
  "search",
  "sort",
  "state",
  "types",
  "unique",
  //"wholerow",
  //"changed",
  //"conditionalselect"
  ]
});

catejstree.bind("move_node.jstree", function(e, data) {

   console.log("Drop node " + data.node.id + " to " + data.parent);

   var parent_node = data.parent;

   var child_node = data.node.id;

   /*jQuery.ajax({
        url: 'response_update.php',
        type: "POST",
        data: {parent_node: parent_node, child_node: child_node},
        cache: false,
        dataType: 'json',
        beforeSend: function(){
        },
        complete: function(){
        },
        success: function (response) {  console.log(response);
        }
    });*/

});

/*catejstree.bind("dnd_move.jstree", function(e, data) {
   console.log("Move dnd " + data.node.id + " to " + data.parent);
});

catejstree.bind("dnd_stop.jstree", function(e, data) {
   console.log("Stop dnd " + data.node.id + " to " + data.parent);
});*/

/*catejstree.on("changed.jstree", function (e, data) {
  console.log(data.changed.selected); // newly selected
  console.log(data.changed.deselected); // newly deselected
});*/

</script>


</body>
</html>