<?php

class Login {
    
    private $db_connection = NULL;

    public $errors = array();
    public $messages = array();
    
    public function __construct($koneksi) {
        
        $this->db_connection = $koneksi;
        
        session_start();
        
        if (isset($_GET['logout'])){
            $this->doLogout();
        }
        
        if (isset($_POST['prclogin'])){
            $this->doLogin();
        }
        if (isset($_POST['trslogin'])){
            $this->doTrsLogin();
        }
    }
    
    private function doLogin(){
        if (!$this->db_connection->connect_errno){
            
            $username = $this->db_connection->real_escape_string($_POST['user__name']);
            $password = $this->db_connection->real_escape_string($_POST['pass__word']);
            
            $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
            $result = $this->db_connection->query($sql);
            
            if ($result->num_rows == 1){
                $result_row = $result->fetch_object();
                
                $_SESSION['username'] = $result_row->username;
                $_SESSION['hak_akses'] = $result_row->hak_akses;
                $_SESSION['user_login'] = 1;
            } else {
                $this->errors[] = "Username atau Password Salah!";
            }
            
        }
    }
    public function doTrsLogin()
    {
        if (!$this->db_connection->connect_errno){
            
            $username = $this->db_connection->real_escape_string($_POST['user__name']);
            
            $sql = "SELECT * FROM penyewa WHERE nama='".$username."'";
            $result = $this->db_connection->query($sql);
            
            if ($result->num_rows == 1){
                $result_row = $result->fetch_object();
                
                $_SESSION['username'] = $result_row->nama;
                $_SESSION['user_id'] = $result_row->id;
                $_SESSION['trs_login'] = 1;
            } else {
                $this->errors[] = "Nama Penyewa Salah!";
            }
            
        }
    }
    public function doLogout()
    {
        $_SESSION = array();
        session_destroy();
        $this->messages[] = "You have been logged out.";
        header('location: index.php');
    }
    
    public function isUserLogin() {
        if (isset($_SESSION['user_login'])){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    public function isBayarTrsLogin() {
        if (isset($_SESSION['trs_login'])){
            return TRUE;
        } else {
            return FALSE;
        }
        
    }
    public function showMenu(){
        $hak_akses = $_SESSION['hak_akses'];
        $sql = $this->db_connection->query("SELECT * FROM menu WHERE LOCATE(hak_akses, $hak_akses) ORDER BY id");
        
        while ($row = $sql->fetch_array()){
            $data[] = $row;
        }
        return $data;
    }
}

