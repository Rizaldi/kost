<?php 

class Tagihan
{
	private $db_connection = NULL;

	function __construct()
	{
		require_once 'config/Koneksi.php';
		$conn = new Koneksi();
		$this->db_connection = $conn->getConnection();
	}
	public function showTagihanBulanan()
	{
		$sql = $this->db_connection->query("SELECT kamar.*, tagihan_bulanan.*, tagihan_bulanan.id as bulan_id FROM tagihan_bulanan LEFT JOIN kamar ON tagihan_bulanan.kamar_id=kamar.id");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function showTagihanHarianMingguan()
	{
		$sql = $this->db_connection->query("SELECT kamar.*, tagihan_harian_mingguan.*, tagihan_harian_mingguan.id as har_ming_id FROM tagihan_harian_mingguan LEFT JOIN kamar ON tagihan_harian_mingguan.kamar_id=kamar.id");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function change_tagihan_bulanan($data)
	{
		if ($data['bulanan_id'] == null) {
			$query = "INSERT INTO tagihan_bulanan (kamar_id,jenis_tagihan,jumlah_bayar,tagihan_bulanan) 
			values ('".$data['kamar_id']."','".$data['jenis_tagihan']."','".$data['jumlah_bayar']."','".$data['tagihan_bulanan']."')";
		} else {
			$query = "UPDATE tagihan_bulanan SET 

			kamar_id='".$data['kamar_id']."',
			jenis_tagihan='".$data['jenis_tagihan']."',
			jumlah_bayar='".$data['jumlah_bayar']."',
			tagihan_bulanan='".$data['tagihan_bulanan']."'


			WHERE id = '".$data['bulanan_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
	}
	public function change_tagihan_harian_mingguan($data)
	{
		if ($data['mingguan_id'] == null) {
			$query = "INSERT INTO tagihan_harian_mingguan (kamar_id,jenis_tagihan,jumlah_bayar) 
			values ('".$data['kamar_id']."','".$data['jenis_tagihan']."','".$data['jumlah_bayar']."')";
		} else {
			$query = "UPDATE tagihan_harian_mingguan SET 

			kamar_id='".$data['kamar_id']."',
			jenis_tagihan='".$data['jenis_tagihan']."',
			jumlah_bayar='".$data['jumlah_bayar']."'

			WHERE id = '".$data['mingguan_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		echo $query;
	}
	public function delete_tagihan_bulanan($data)
	{
		$sql = $this->db_connection->query("DELETE FROM tagihan_bulanan where id = '".$data['tagihan_bulanan_id']."'");
	}
}