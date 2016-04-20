<?php

require_once APP.'core/request-handler.php';
require_once APP.'core/main-controller.php';

$request_php = new RequestPHP();
if ($request_php::request_type() === 'API') {
	require_once APP.'core/api_controller.php';
	include_once APP.'api/view_change_controller.php';
} else
if ($request_php::request_type() === 'CONTENT') {
	include_once APP.'controllers/application_controller.php';
	$app_controller = new ApplicationController();
	echo $app_controller->render();
}
