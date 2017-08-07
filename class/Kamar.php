<?php 

class Kamar
{
	private $db_connection = NULL;

	function __construct()
	{
		require_once 'config/Koneksi.php';
		$conn = new Koneksi();
		$this->db_connection = $conn->getConnection();
	}
	function showKamar()
	{
		$sql = $this->db_connection->query("SELECT * FROM kamar");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function showFasilitaskamar($id)
	{
		$sql = $this->db_connection->query("SELECT * FROM fasilitas_kamar WHERE kamar_id='".$id."'");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function change_data_kamar($data)
	{
		if ($data['kamar_id'] == null) {
			$query = "INSERT INTO kamar (no_kamar,trf_sewa_bulanan,trf_sewa_mingguan,trf_sewa_harian,denda_sewa_bulanan) 
			values ('".$data['no_kamar']."','".$data['trf_sewa_bulanan']."','".$data['trf_sewa_mingguan']."','".$data['trf_sewa_harian']."','".$data['denda_sewa_bulanan']."')";
		} else {
			$query = "UPDATE kamar SET 

			no_kamar='".$data['no_kamar']."',
			trf_sewa_bulanan='".$data['trf_sewa_bulanan']."',
			trf_sewa_mingguan='".$data['trf_sewa_mingguan']."',
			trf_sewa_harian='".$data['trf_sewa_harian']."',
			denda_sewa_bulanan='".$data['denda_sewa_bulanan']."'

			WHERE id = '".$data['kamar_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
	}
	public function change_fasilitas_kamar($data)
	{
		if ($data['fasilitas_id'] == null) {
			$query = "INSERT INTO fasilitas_kamar (kamar_id,nama_barang,jumlah) 
			values ('".$data['no_kamar']."','".$data['nama_barang']."','".$data['jumlah']."')";
		} else {
			$query = "UPDATE fasilitas_kamar SET 

			kamar_id='".$data['no_kamar']."',
			nama_barang='".$data['nama_barang']."',
			jumlah='".$data['jumlah']."'

			WHERE id = '".$data['fasilitas_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
		// print_r($data);
	}
	public function change_data_kost($data)
	{
		$file_name = $_FILES['file']['name'];
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];
		
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($file_name);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if ($data['kost_id'] == null) {
			move_uploaded_file($file_tmp,"uploads/".basename($file_name));
			$query = "INSERT INTO kost (nama,alamat,hp,kota,motto,label,file) 
			values ('".$data['nama']."','".$data['alamat']."','".$data['hp']."','".$data['kota']."','".$data['motto']."','".$data['label']."','".$file_name."')";
		} else {
			move_uploaded_file($file_tmp,"uploads/".basename($file_name));
			$query = "UPDATE kost SET 

			nama='".$data['nama']."',
			alamat='".$data['alamat']."',
			hp='".$data['hp']."',
			kota='".$data['kota']."',
			motto='".$data['motto']."',
			label='".$data['label']."',
			file='".$file_name."'

			WHERE id = '".$data['kost_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
	}
	public function delete_data_kamar($data)
	{
		$sql = $this->db_connection->query("DELETE FROM kamar where id = '".$data['kamar_id']."'");
	}
} ?>