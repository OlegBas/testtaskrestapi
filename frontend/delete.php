<?php
include 'functions.php';
$url_api = $url_api."/".$safe_get['id'];
$user = sendCurl($url_api,[],"DELETE");

returnOnPreviousPage();