<?php


$parent_node = $_POST['parent_node'];
$child_node = $_POST['child_node'];




$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "jstree";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$sql = "UPDATE treeview_items SET parent_id = '".$parent_node."' WHERE id=".$child_node;

$res = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));


$myArr = array(
    'response' => 'xyz',
    'parent_node' => $parent_node,
    'child_node' => $child_node
);
$myJSON = json_encode($myArr); 
echo $myJSON;
die();




/*"CREATE TABLE IF NOT EXISTS treeview_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  text VARCHAR(255) NOT NULL,
  parent_id VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);"*/


/*"CREATE TABLE IF NOT EXISTS `treeview_items` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(200) NOT NULL,
  `text` varchar(200) NOT NULL,
  `parent_id` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;"*/