<?php
session_start();
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			return 1;
		}else{
			return 2;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}

	function delete_announcement(){
		extract($_POST);
		$path = $this->db->query("SELECT file_path from announcement where id=".$id)->fetch_array()['file_path'];
		$delete = $this->db->query("DELETE FROM announcement where id =".$id);
		if($delete){
					unlink('assets/uploads/'.$path);
					return 1;
				}
	}

	function save_announcement(){
		extract($_POST);
		if(empty($id)){
		if($_FILES['upload']['tmp_name'] != ''){
					$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['upload']['name'];
					$move = move_uploaded_file($_FILES['upload']['tmp_name'],'assets/uploads/'. $fname);
		
					if($move){
						$file = $_FILES['upload']['name'];
						$file = explode('.',$file);
				$chk = $this->db->query("SELECT * FROM announcement where SUBSTRING_INDEX(name,' ||',1) = '".$file[0]."' and  file_type='".$file[1]."' ");
						if($chk->num_rows > 0){
							$file[0] = $file[0] .' ||'.($chk->num_rows);
						}
				$data = " name = '".$file[0]."' ";
							
		$data .= ", subject = '".$subject."' ";
        $data .= ", id_no = '".$id_no."' ";
		$data .= ", date = '".$date."' ";
		$data .= ", status = '".$status."' ";
		$data .= ", place = '".$place."' ";
		$data .= ", time = '".$time."' ";
		$data .= ", file_type = '".$file[1]."' ";
						$data .= ", upload = '".$fname."' ";
						
						$save = $this->db->query("INSERT INTO announcement set ".$data);
						if($save)
						return json_encode(array('status'=>1));
		
					}
		
				}
			}else{
if($_FILES['upload']['tmp_name'] != ''){
					$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['upload']['name'];
					$move = move_uploaded_file($_FILES['upload']['tmp_name'],'assets/uploads/'. $fname);
		
					if($move){
						$file = $_FILES['upload']['name'];
						$file = explode('.',$file);
				$chk = $this->db->query("SELECT * FROM announcement where SUBSTRING_INDEX(name,' ||',1) = '".$file[0]."' and  file_type='".$file[1]."' ");
						if($chk->num_rows > 0){
							$file[0] = $file[0] .' ||'.($chk->num_rows);
						}
		

		$data = " subject = '".$subject."' ";
        $data .= ", id_no = '".$id_no."' ";
		$data .= ", date = '".$date."' ";
		$data .= ", status = '".$status."' ";
		$data .= ", place = '".$place."' ";
		$data .= ", time = '".$time."' ";
				$data .= ", name = '".$file[0]."' ";
		$data .= ", file_type = '".$file[1]."' ";

		$data .= ", upload = '".$fname."' ";
						$save = $this->db->query("UPDATE announcement set ".$data. " where id=".$id);
						if($save)
						return json_encode(array('status'=>1));
			}

	}
}
}
function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", position = '$position' ";
		$data .= ", id_no = '$id_no' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
}