<?php
namespace nxnw;

class csrf {
	
	public static function gen($session=true){
		//generate csrf token
		if(@is_readable('/dev/urandom')) {
			$fp = fopen('/dev/urandom', 'r'); 
			$csrf = md5(fread($fp, 128));
			fclose($fp);
		}
		else{
			$csrf = md5(mt_rand() . mt_rand() . mt_rand() . mt_rand());
		}
		$_SESSION['csrf'] = $csrf;
		return $csrf;
	}

} /* \csrf */


?>