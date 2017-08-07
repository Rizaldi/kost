<?php 

class User
{
	private $db_connection = NULL;

	function __construct()
	{
		require_once 'config/Koneksi.php';
		$conn = new Koneksi();
		$this->db_connection = $conn->getConnection();
	}
	function showUser()
	{
		$sql = $this->db_connection->query("SELECT * FROM users");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
	}
	public function add_user($data = array())
	{
		$query = "INSERT INTO users values ('".$data['username']."','".$data['password']."','".$data['hak_akses']."')";
		$sql = $this->db_connection->query($query);      
	}
	public function delete_user($data)
	{
		$sql = $this->db_connection->query("DELETE FROM users where username = '".$data['user_id']."'");
	}
} ?>