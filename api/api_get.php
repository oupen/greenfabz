<?php
include ('connect.php');

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
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
    $req = "SELECT * from green_article WHERE article_id=" . $_GET['id'];
    $result = mysqli_query($bdd, $req);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $data = current($data);
}
else {
    $req = "SELECT * from green_article";
    $result = mysqli_query($bdd, $req);

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>