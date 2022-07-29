<?php 

/**
 * session class
 */
class Session{
	
	public static function init(){
		session_start();
	}
	public static function set_session($key,$value){
		$_SESSION[$key] = $value;
	}

	public static function get_session($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return false;
		}
	}

	public static function check_session(){

		self::init();
		if (self::get_session("admin_login")==false) {
			self::destroy();
			// header("Location:../login/login.php");
			
		}
	}

	public static function check_login(){

		self::init();
		if (self::get_session("admin_login")==true) {
			header("Location:../admin/index.php");
			
		}
	}
	public static function destroy(){

		session_destroy();
		header("Location:../admin/admin_login.php");
	}

}

 ?>