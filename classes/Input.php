<?php

class Input {

	public static function get($param, $default = NULL) {
		if (isset($_GET[$param]))
			return $_GET[$param];
		else
			return $default;
	}

}

?>
