<?php

function get($jeden, $dwa){
	$data = new DateTime();
	$data1 = new DateTime();
	switch ($dwa) {
		case NULL:
			if($jeden == 'dzien') {
				if(date('H') > 15) $data->modify('+1 day');
				$kwerenda = ' = "'.$data->format('Y-m-d').'"';
			};
			if($jeden == 'tydzien') {
				if(date('D') == 'Fri' && date('H') > 15) $data->modify('+7 day');
				switch (date('D')) {
					case 'Mon': {
						if(date('H')>15) $data1->modify('+1 day');
						$data->modify('+4 day');
						break;
					};
					case 'Tue': {
						if(date('H')>15) $data1->modify('+1 day');
						$data->modify('+3 day');
						break;
					};
					case 'Wed': {
						if(date('H')>15) $data1->modify('+1 day');
						$data->modify('+2 day');
						break;
					};
					case 'Thu': {
						if(date('H')>15) $data1->modify('+1 day');
						$data->modify('+1 day');
						break;
					};
					case 'Fri': {
						if(date('H')>15) $data1->modify('+3 day');
						$data->modify('+7 day');
						break;
					};
					case 'Sat': {
						$data1->modify('+2 day');
						$data->modify('+6 day');
						break;
					};
					case 'Sun': {
						$data1->modify('+1 day');
						$data->modify('+5 day');
						break;
					};										
				};
			$kwerenda = ' BETWEEN "'.$data1->format('Y-m-d').'" AND "'.$data->format('Y-m-d').'"';
			// echo $kwerenda;
			};
			break;
		
		case 'nastepny':
			if($jeden == 'dzien') {
				$data->modify('+1 day');
				$kwerenda = ' = "'.$data->format('Y-m-d').'"';
				// echo $kwerenda;
			};
			if($jeden == 'tydzien'){
				switch (date('D')) {
					case 'Mon': $data->modify('+11 day'); $data1->modify('+7 day'); break;
					case 'Tue': $data->modify('+10 day'); $data1->modify('+6 day'); break;
					case 'Wed': $data->modify('+9 day'); $data1->modify('+5 day'); break;
					case 'Thu': $data->modify('+8 day'); $data1->modify('+4 day'); break;
					case 'Fri': $data->modify('+7 day'); $data1->modify('+3 day'); break;
					case 'Sat': $data->modify('+13 day'); $data1->modify('+9 day'); break;
					case 'Sun': $data->modify('+12 day'); $data1->modify('+8 day'); break;
				};
			$kwerenda = ' BETWEEN "'.$data1->format('Y-m-d').'" AND "'.$data->format('Y-m-d').'"';
			//echo $kwerenda;
			};
			break;
	};
	
	try {

		$conn = require_once('connect.php');
		$db = new PDO("mysql:host={$conn['host']};dbname={$conn['database']};charset=utf8", $conn['user'], $conn['password'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		$query = $db->query("SELECT * FROM wszystkie WHERE data{$kwerenda} ORDER BY data ASC, lekcja ASC");
		$loll = json_encode($query->fetchAll(), JSON_UNESCAPED_UNICODE);
        return $loll;
	}
	catch(PDOException $e){
		echo 'problemy z polaczeniem'.$e;
	};

echo "ł";
};
// SELECT * FROM wszystkie WHERE data{$kwerenda} ORDER BY data ASC, lekcja ASC
?>