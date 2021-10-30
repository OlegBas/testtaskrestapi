<?php
include "Validator.php";
$url_api = "http://testtaskrestapi.ru:81/users";
$safe_post = xss($_POST);
$safe_get = xss($_GET);
$validator = new Validator($safe_post["User"]);

function sendCurl($URL,$data, $method = "GET")
{
    $data_json = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response  = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function returnOnPreviousPage(){
    header('Location: /frontend/');
    exit;
}

function xss($data) {
    if (is_array($data)) {
        $escaped = array();
        foreach ($data as $key => $value) {
            $escaped[$key] = xss($value);
        }
        return $escaped;
    }
    return trim(htmlspecialchars($data));
}



