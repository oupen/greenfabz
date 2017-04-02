<?php
    include ('connect.php');
	//http://stackoverflow.com/questions/18382740/cors-not-working-php
	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
 $postdata = file_get_contents("php://input");
//    stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
if(isset($postdata)) {
    $request = json_decode($postdata);
		$mail_adress= $request->mail_adress;
		$mail_text= $request->mail_text;

    //changer la requête
    $rqt = "INSERT INTO green_mail (email, message) VALUES ('$mail_adress', '$mail_text')";
    $result = mysqli_query($bdd, $rqt);
}

?>