<?php

class MainController
{
	function assets ($file) {
		return APP."assets/{$file}";
	}

	function spit ()
	{
		/* outputs either a 404 or a body */
		if (RequestPHP::get_path() === '/') {
			ob_start();
				include_once APP."views/home.html.php";
			return ob_get_clean();
		}
		if (file_exists(APP."views/partials/{RequestPHP::get_path()}.html.php")) {
			ob_start();
				include_once APP."views/{RequestPHP::get_path()}.html.php";
			return ob_get_clean();
		}
		else {
			include_once APP."views/404.html.php";
		}
	}

	function partial ($name)
	{
		/* Outputs a view of type injectable small section */
		if (file_exists(APP."views/partials/{$name}.html.php")) {
			ob_start();
				include_once APP."views/partials/{$name}.html.php";
			return ob_get_clean();
		}
		else {
			error_reporting("Partial you are looking for is missing partials/{$name}");
		}
	}

	function render () {
		ob_start();
			include_once APP.'views/application.html.php';
		return ob_get_clean();
	}
}
