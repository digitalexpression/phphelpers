<?php

require_once ('Helpers.php');

class Toggit extends Helpers {

	public static function id() {
		return Toggit::randomString(7, true, false);
	}
	
}

?>