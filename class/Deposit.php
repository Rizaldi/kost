<?php 

class Deposit
{
	private $db_connection = NULL;

	function __construct()
	{
		require_once 'config/Koneksi.php';
		$conn = new Koneksi();
		$this->db_connection = $conn->getConnection();
	}
	function showDeposit()
	{
		$sql = $this->db_connection->query("SELECT penyewa.*, kamar.*, deposit.*, deposit.id as deposit_id FROM deposit LEFT JOIN kamar ON deposit.no_kamar=kamar.id LEFT JOIN penyewa ON deposit.nama_penyewa=penyewa.id");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	
	public function change_data_deposit($data)
	{
		if ($data['deposit_id'] == null) {
			$query = "INSERT INTO deposit (no_deposit,no_kamar,nama_penyewa,uraian,nominal) 
			values ('".$data['no_deposit']."','".$data['kamar_id']."','".$data['penyewa_id']."','".$data['uraian']."','".$data['nominal']."')";
		} else {
			$query = "UPDATE deposit SET 

			no_deposit='".$data['no_deposit']."',
			no_kamar='".$data['kamar_id']."',
			nama_penyewa='".$data['penyewa_id']."',
			uraian='".$data['uraian']."',
			nominal='".$data['nominal']."'

			WHERE id = '".$data['deposit_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
	}
} ?>