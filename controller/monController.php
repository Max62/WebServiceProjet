<?php
	// Commentaires
	include_once('helper.php');

	const PATH_WEBSERVICES = '/ws';

	if(!isset($_GET['ws']))
		Helper::ThrowAccessDenied();

	// We gets the informations of the desired service.
	$serviceName = 'WS_'.ucfirst(strtolower($_GET['ws']));

	echo 'ServiceName = '.$serviceName.'<br>';
	//$serviceName = ucfirst(strtolower($_GET['ws']).'WS');
	$servicePath = PATH_WEBSERVICES.'/'.$serviceName.'.php';
	//$servicePath = PATH_WEBSERVICES.'/'.$serviceName.'.php';

	echo '<b>'.$servicePath.'</b><br>';;
	// If the service doesn't exist, we stop the request.
	if (!file_exists($servicePath))
		Helper::ThrowAccessDenied();


		$method = "do".strtoupper($_SERVER['REQUEST_METHOD']);

		echo 'Ma méthode ='.$method;
	// We create and execute the service.
	require_once($servicePath);
	$service = new $serviceName();
	$result = $service->$method;

	// At the end, we return the result.
	if ($result !== null)
		echo json_encode($result);
