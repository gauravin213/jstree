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

echo json_encode($data);

/*$pppp = array(
  array('id' => 1, 'parent' => '#', 'text' => 'Simple root node'),
  array('id' => 2, 'parent' => '#', 'text' => 'Root node 2'),
  array('id' => 3, 'parent' => '2', 'text' => 'Child 1'),
  array('id' => 4, 'parent' => '2', 'text' => 'Child 2')
);

echo "<pre>"; print_r($pppp); echo "</pre>";

//echo json_encode($pppp);*/