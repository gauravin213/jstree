<!DOCTYPE html>
<html>
<head>
	<title>js tree</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">


	<!-- <link rel="stylesheet" href="dist/themes/default/style.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="dist/jstree.min.js"></script> -->


    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/dist/themes/proton/style.css" />
    <link rel="stylesheet" href="assets/docs.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


    <link rel="icon" href="./assets/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" href="./assets/apple-touch-icon-precomposed.png" />
    <script src="assets/jquery-1.10.2.min.js"></script>
    <script src="assets/dist/jstree.min.js"></script>

    <style>
        .proton-demo{
            max-width: 100%;
            padding: 10px;
            border-radius: 3px;
        }
    </style>



</head>
<body>



<div id="jstree_demo"></div>


<script type="text/javascript">

var catejstree = $('#jstree_demo');


catejstree.jstree({
  'core' : {
    "animation" : 0,
    "check_callback" : true,
    //"themes" : { "stripes" : true },
    "themes": {
                'name': 'proton',
                'responsive': true
            },
    'data' : {
      'url' : function (node) { 
         return 'ajax_roots.php';
      },
      'dataType' : "json",
      'data' : function (node) {
        return { 'id' : node.id };
      }
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
  //"sort",
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

   jQuery.ajax({
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
    });

});


</script>





<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "jstree";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = "SELECT * FROM `treeview_items` ";
$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while( $row = mysqli_fetch_assoc($res) ) { 
    $data[] = array('id' => $row['id'], 'parent' => $row['parent_id'], 'text' => $row['text']);
}

echo "<pre>"; print_r($data); echo "</pre>";

//echo json_encode($data);


?>

</body>
</html>