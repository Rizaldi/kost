<?php 

class Penyewa
{
	private $db_connection = NULL;

	function __construct()
	{
		require_once 'config/Koneksi.php';
		$conn = new Koneksi();
		$this->db_connection = $conn->getConnection();
	}
	function showPenyewa()
	{
		$sql = $this->db_connection->query("SELECT * FROM penyewa");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function change_data_penyewa($data)
	{
		$file_name = $_FILES['file']['name'];
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];

        $ktp_name = $_FILES['ktp']['name'];
        $ktp_size =$_FILES['ktp']['size'];
        $ktp_tmp =$_FILES['ktp']['tmp_name'];
        $ktp_type=$_FILES['ktp']['type'];
		
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($file_name);
		$target_file = $target_dir . basename($ktp_name);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if ($data['penyewa_id'] == null) {
			move_uploaded_file($file_tmp,"uploads/".basename($file_name));
			move_uploaded_file($ktp_tmp,"uploads/".basename($ktp_name));
			$query = "INSERT INTO penyewa (no_register,nama,tgl_lahir,tempat_lahir,alamat,jk,ID_pengenal,jenis_pengenal,hp,agama,status,pekerjaan,tanggal_masuk,file,ktp) 
			values ('".$data['no_register']."','".$data['nama']."','".date("Y-m-d",strtotime($data['tgl_lahir']))."','".$data['tempat_lahir']."','".$data['alamat']."','".$data['jk']."','".$data['ID_pengenal']."','".$data['jenis_pengenal']."','".$data['hp']."','".$data['agama']."','".$data['status']."','".$data['pekerjaan']."','".date("Y-m-d",strtotime($data['tanggal_masuk']))."','".$file_name."','".$ktp_name."')";
		} else {
			move_uploaded_file($file_tmp,"uploads/".basename($file_name));
			move_uploaded_file($ktp_tmp,"uploads/".basename($ktp_name));
			
			$query = "UPDATE penyewa SET 

			no_register='".$data['no_register']."',
			nama='".$data['nama']."',
			tgl_lahir='".date("Y-m-d",strtotime($data['tgl_lahir']))."',
			tempat_lahir='".$data['tempat_lahir']."',
			jk='".$data['jk']."',
			alamat='".$data['alamat']."',
			ID_pengenal='".$data['ID_pengenal']."',
			jenis_pengenal='".$data['jenis_pengenal']."',
			hp='".$data['hp']."',
			agama='".$data['agama']."',
			status='".$data['status']."',
			pekerjaan='".$data['pekerjaan']."',
			tanggal_masuk='".date("Y-m-d",strtotime($data['tanggal_masuk']))."',
			file='".$file_name."',
			ktp='".$ktp_name."'

			WHERE id = '".$data['penyewa_id']."'
			";
		}
		$sql = $this->db_connection->query($query);
		// echo $query;
	}
	public function delete_data_penyewa($data)
	{
		$sql = $this->db_connection->query("DELETE FROM penyewa where id = '".$data['penyewa_id']."'");
	}
} ?>