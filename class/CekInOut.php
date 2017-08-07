<?php 

class CekInOut
{
	private $db_connection = NULL;

	function __construct()
	{
		require_once 'config/Koneksi.php';
		$conn = new Koneksi();
		$this->db_connection = $conn->getConnection();
	}
	function showCekInOut()
	{
		$sql = $this->db_connection->query("SELECT penyewa.* , cek_in_out.* , cek_in_out.id as cek_in_out_id FROM cek_in_out LEFT JOIN penyewa ON penyewa.id = cek_in_out.penyewa_id");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function change_cek_in_out($data)
	{
		if ($data['cek_in_out_id'] == null) {
			$query = "INSERT INTO cek_in_out (kamar_id,penyewa_id,alamat,jenis_sewa,tgl_jatuh_tempo,jml_minggu,jam,jml_hari_sewa,tanggal) 
			values ('".$data['kamar_id']."','".$data['penyewa_id']."','".$data['alamat']."','".$data['jenis_sewa']."','".date("Y-m-d",strtotime($data['tgl_jatuh_tempo']))."','".$data['jml_minggu']."','".$data['jam']."','".$data['jml_hari_sewa']."','".date("Y-m-d",strtotime($data['tanggal']))."')";
		} else {
			$query = "UPDATE cek_in_out SET 

			kamar_id='".$data['kamar_id']."',
			penyewa_id='".$data['penyewa_id']."',
			alamat='".$data['alamat']."',
			jenis_sewa='".$data['jenis_sewa']."',
			tgl_jatuh_tempo='".date("Y-m-d",strtotime($data['tgl_jatuh_tempo']))."',
			jml_minggu='".$data['jml_minggu']."',
			jam='".$data['jam']."',
			jml_hari_sewa='".$data['jml_hari_sewa']."',
			tanggal='".date("Y-m-d",strtotime($data['tanggal']))."'

			WHERE id = '".$data['cek_in_out_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
	}
	public function delete_cek_in_out($data)
	{
		$daa = "DELETE FROM cek_in_out where id = '".$data['cek_in_out_id']."'";
		echo $daa;
		$sql = $this->db_connection->query("DELETE FROM cek_in_out where id = '".$data['cek_in_out_id']."'");
	}
} ?>