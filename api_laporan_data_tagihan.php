<?php 
// $id = $_POST['project_id']; 
require_once 'config/Koneksi.php';
$conn = new Koneksi();
$db_connection = $conn->getConnection();
$query = "SELECT * FROM tagihan_bulanan where tagihan_bulanan BETWEEN '".$_POST['startDate']."' and '".$_POST['endDate']."'";
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