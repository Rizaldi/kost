<?php 
require_once 'config/Koneksi.php';
$conn = new Koneksi();
$db_connection = $conn->getConnection();
$query = "SELECT * FROM transaksi_bayar_sewa where tanggal_bayar BETWEEN '".$_POST['startDate']."' and '".$_POST['endDate']."'";
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