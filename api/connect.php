<?
	$user = "root";
	$psw = "";
    $host= "";
    $base= "";
	$bdd = mysqli_connect($host,$user,$psw); mysqli_select_db($bdd,$base) or die($erreur="Erreur lors de la connection à la bdd");
	echo $erreur;
	mysqli_set_charset($bdd,"utf8");
?>
