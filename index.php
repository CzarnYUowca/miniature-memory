<html>
<head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body><?php
	
	require_once('api/get.php');
	
	$method = $_SERVER['REQUEST_METHOD'];

	// echo $method.'<br>';
	
	if(!isset($method)) {
		exit();
	};

	$request = explode("/",$_SERVER['PATH_INFO']);
	//print_r($request);
	//echo '<br>';

	if( !isset($request) || $request == "/" ) {
		http_response_code(404);
		exit();
	} elseif( $request[1] != 'dzien' && $request[1] != 'tydzien' ){
		http_response_code(404);
		exit();
	} elseif( @$request[2] != NULL && @$request[2] != 'nastepny' ){
		http_response_code(404);
		exit();
	};

	if(!isset($request[2])) $request[2] = "";
	//print_r($request);

$cossss = get($request[1],$request[2]);
echo $cossss;

//echo "<br>".date('H');

?>
</body>
</html>