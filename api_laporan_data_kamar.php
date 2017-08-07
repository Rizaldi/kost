<?php 
// $id = $_POST['project_id']; 
require_once 'config/Koneksi.php';
$conn = new Koneksi();
$db_connection = $conn->getConnection();
$query = "SELECT * FROM kamar where status='".$_POST['status']."'";
// echo $query;
$sql = $db_connection->query($query);
        
while ($row = $sql->fetch_array()){
    $data[] = $row;
}
if (count($sql) > 0) {

  $output = array(

    "success" => "1",

    "data" => $data,

    );

}

else{

  $output = array(

    "success"=>"0"

    );

}
echo json_encode($output);

?>