<?php

	include_once('helper.php');

	const PATH_WEBSERVICES = 'ws';

	if(!isset($_GET['ws']))
		Helper::ThrowAccessDenied();

	// We gets the informations of the desired service.
	$serviceName = ucfirst(strtolower($_GET['ws']).'WS');
	$servicePath = PATH_WEBSERVICES.'\\'.$serviceName.'.php';

	// If the service doesn't exist, we stop the request.
	if (!file_exists($servicePath))
		Helper::ThrowAccessDenied();

	// We create and execute the service.
	require_once($servicePath);
	$service = new $serviceName();
	$result = $service->DoGet();

	// At the end, we return the result.
	if ($result !== null)
		echo json_encode($result);
