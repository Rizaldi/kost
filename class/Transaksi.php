<?php 

class Transaksi
{
	private $db_connection = NULL;

	function __construct()
	{
		require_once 'config/Koneksi.php';
		$conn = new Koneksi();
		$this->db_connection = $conn->getConnection();
	}
	function showTransaksi()
	{
		$sql = $this->db_connection->query("SELECT penyewa.*, kamar.* , transaksi_bayar_sewa.* , transaksi_bayar_sewa.id as id_sewa FROM transaksi_bayar_sewa LEFT JOIN kamar ON transaksi_bayar_sewa.kamar_id=kamar.id LEFT JOIN penyewa ON transaksi_bayar_sewa.penyewa_id=penyewa.id");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	function showTransaksiBayarTagihan()
	{
		$sql = $this->db_connection->query("SELECT penyewa.*, kamar.*, transaksi_bayar_tagihan.* , transaksi_bayar_tagihan.id as tagihan_id FROM transaksi_bayar_tagihan LEFT JOIN kamar ON transaksi_bayar_tagihan.kamar_id=kamar.id LEFT JOIN penyewa ON transaksi_bayar_tagihan.penyewa_id=penyewa.id");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function showTransaksiKeluar()
	{
		$sql = $this->db_connection->query("SELECT * FROM transaksi_pengeluaran");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function change_data_sewa($data)
	{
		if ($data['sewa_id'] == null) {
			$query = "INSERT INTO transaksi_bayar_sewa (no_bukti,kamar_id,penyewa_id,tgl_sewa,biaya_sewa,denda_terlambat,total_bayar,uang_bayar,uang_kembali,cara_bayar,tanggal_bayar) 
			values ('".$data['no_bukti']."','".$data['kamar_id']."','".$data['nama']."','".date("Y-m-d",strtotime($data['tgl_sewa']))."','".$data['biaya_sewa_perbulan']."','".$data['denda_terlambat']."','".$data['total_bayar']."','".$data['uang_bayar']."','".$data['uang_kembali']."','".$data['cara_bayar']."','".date("Y-m-d",strtotime($data['tanggal_bayar']))."')";
		} else {
			$query = "UPDATE transaksi_bayar_sewa SET 

			no_bukti='".$data['no_bukti']."',
			kamar_id='".$data['kamar_id']."',
			penyewa_id='".$data['nama']."',
			tgl_sewa='".date("Y-m-d",strtotime($data['tgl_sewa']))."',
			biaya_sewa='".$data['biaya_sewa_perbulan']."',
			denda_terlambat='".$data['denda_terlambat']."',
			total_bayar='".$data['total_bayar']."',
			uang_bayar='".$data['uang_bayar']."',
			uang_kembali='".$data['uang_kembali']."',
			cara_bayar='".$data['cara_bayar']."',
			tanggal_bayar='".date("Y-m-d",strtotime($data['tanggal_bayar']))."'

			WHERE id = '".$data['sewa_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
	}
	public function showtransaksiBayar()
	{
		error_reporting(0);

		$sql = $this->db_connection->query("SELECT  penyewa.*, kamar.* , transaksi_bayar_sewa.* , transaksi_bayar_sewa.id as id_sewa FROM transaksi_bayar_sewa LEFT JOIN kamar ON transaksi_bayar_sewa.kamar_id=kamar.id LEFT JOIN penyewa ON transaksi_bayar_sewa.penyewa_id=penyewa.id WHERE transaksi_bayar_sewa.penyewa_id = '".$_SESSION['user_id']."' and status_bayar = 'N'");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function change_data_byr_trs($post,$file)
	{
		$file_name = $_FILES['trf_sewa']['name'];
        $file_size =$_FILES['trf_sewa']['size'];
        $file_tmp =$_FILES['trf_sewa']['tmp_name'];
        $file_type=$_FILES['trf_sewa']['type'];
		
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($file_name);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (!empty($file)) {
			move_uploaded_file($file_tmp,"uploads/".basename($file_name));
	        $sql = $this->db_connection->query("UPDATE transaksi_bayar_sewa SET bukti_pembayaran='".$file_name."', status_bayar='Y' WHERE id='".$post['sewa_id']."'");
		}else{
			echo "kosong";
		}
		// print_r( $target_file );
	}
	public function change_data_tagihan($data)
	{
		if ($data['tagihan_id'] == null) {
			$query = "INSERT INTO transaksi_bayar_tagihan (no_bukti,tanggal_bayar,kamar_id,penyewa_id,jumlah_tagihan,uang_bayar,uang_kembali,cara_bayar,tagihan_bulan) 
			values ('".$data['no_bukti']."','".date("Y-m-d",strtotime($data['tanggal_bayar']))."','".$data['kamar_id']."','".$data['penyewa_id']."','".$data['jumlah_tagihan']."','".$data['uang_bayar']."','".$data['uang_kembali']."','".$data['cara_bayar']."','".$data['tagihan_bulan']."')";
		} else {
			$query = "UPDATE transaksi_bayar_tagihan SET 

			no_bukti='".$data['no_bukti']."',
			tanggal_bayar='".date("Y-m-d",strtotime($data['tanggal_bayar']))."',
			kamar_id='".$data['kamar_id']."',
			penyewa_id='".$data['penyewa_id']."',
			jumlah_tagihan='".$data['jumlah_tagihan']."',
			uang_bayar='".$data['uang_bayar']."',
			uang_kembali='".$data['uang_kembali']."',
			cara_bayar='".$data['cara_bayar']."',
			tagihan_bulan='".$data['tagihan_bulan']."'

			WHERE id = '".$data['tagihan_id']."'
			";
		}
		$sql = $this->db_connection->query($query);	
		// echo $query;
	}
	public function change_transaksi_pengeluaran($data)
	{
		if ($data['pengeluaran_id'] == null) {
			$query = "INSERT INTO transaksi_pengeluaran (kode_pengeluaran,tanggal,uraian,nominal) 
			values ('".$data['kode_pengeluaran']."','".date("Y-m-d",strtotime($data['tanggal']))."','".$data['uraian']."','".$data['nominal']."')";
		} else {
			$query = "UPDATE transaksi_pengeluaran SET 

			kode_pengeluaran='".$data['kode_pengeluaran']."',
			tanggal='".date("Y-m-d",strtotime($data['tanggal']))."',
			uraian='".$data['uraian']."',
			nominal='".$data['nominal']."'
			WHERE id = '".$data['pengeluaran_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
	}
	public function delete_data_sewa($data)
	{
		$sql = $this->db_connection->query("DELETE FROM transaksi_bayar_sewa where id = '".$data['sewa_id']."'");
	}
	public function delete_data_tagihan($data)
	{
		$sql = $this->db_connection->query("DELETE FROM transaksi_bayar_tagihan where id = '".$data['tagihan_id']."'");
	}
	public function delete_transaksi_pengeluaran($data)
	{
		$sql = $this->db_connection->query("DELETE FROM transaksi_pengeluaran where id = '".$data['transaksi_pengeluaran_id']."'");
	}
} ?>