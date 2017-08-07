<?php 

class Inventaris
{
	private $db_connection = NULL;

	function __construct()
	{
		require_once 'config/Koneksi.php';
		$conn = new Koneksi();
		$this->db_connection = $conn->getConnection();
	}
	function showInventaris()
	{
		$sql = $this->db_connection->query("SELECT * FROM Inventaris");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function change_inventaris($data)
	{
		if ($data['inventaris_id'] == null) {
			$query = "INSERT INTO inventaris (kode_barang,nama_barang,jumlah_barang,harga_barang) 
			values ('".$data['kode_barang']."','".$data['nama_barang']."','".$data['jumlah_barang']."','".$data['harga_barang']."')";
		} else {
			$query = "UPDATE inventaris SET 

			kode_barang='".$data['kode_barang']."',
			nama_barang='".$data['nama_barang']."',
			jumlah_barang='".$data['jumlah_barang']."',
			harga_barang='".$data['harga_barang']."'

			WHERE id = '".$data['inventaris_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
	}
	public function delete_inventaris($data)
	{
		$sql = $this->db_connection->query("DELETE FROM inventaris where id = '".$data['inventaris_id']."'");
	}
} ?>