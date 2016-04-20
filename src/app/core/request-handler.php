<?php
/***
 *
 */

class RequestPHP {
	public static $path;

	function RequestPHP () {
		$this->set_path();
	}

	protected function set_path() {
		self::$path = '/';
		if (isset($_SERVER['PATH_INFO'])) {
			self::$path = $_SERVER['PATH_INFO'];
		}
	}

	public static function get_path () {
		if (isset(self::$path)) {
			return self::$path;
		}
		else {
			return $this->set_path();
		}
	}

	public static function request_type() {
		// I think either API or Text
		$check = stripos(self::$path, "/api");
		if ($check === 0 && is_int($check)) {
			return 'API';
		}
		else {
			return 'CONTENT';
		}
	}
}
