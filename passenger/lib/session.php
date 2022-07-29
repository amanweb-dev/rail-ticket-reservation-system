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
		if (self::get_session("passengerLogin")==false) {
			self::destroy();
			// header("Location:../passenger/passenger_login.php");
			
		}
	}

	public static function check_login(){

		self::init();
		if (self::get_session("passengerLogin")==true) {
			header("Location:../passenger/index.php");
			
		}
	}
	public static function destroy(){

		session_destroy();
		header("Location:../passenger/passenger_login.php");
	}

}

 ?>