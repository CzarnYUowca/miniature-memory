<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action='api/put.php' method='post'>
		<select name='typ'>
			<option selected>kartkówka</option>
			<option>sprawdzian</option>
			<option>inne</option>
		</select>
		<select name='nastawienie'>
			<option selected>negatywne</option>
			<option>pozytywne</option>
		</select>
		<input type="text" value="ęóąśłżźćń" name="przedmiot" />
		<input type="date" name="data"/>
		<input type="number" name="lekcja" value="1"/>
		<input type="submit" />
	</form>
<?php
	
	session_start();
	if(isset($_SESSION['wstawiono']) && $_SESSION['wstawiono'] == true){
	echo "<br> <p color='red'>Prawidłowo wstawiono dane!</p>";
	$_SESSION['wstawiono'] = false;

};

?>

</body>
</html>