<?php
include 'functions.php';
$title = "Users";
$url_page = "/frontend";
$title_action = "Update";
$user = sendCurl($url_api."/".$safe_get["id"],[]);

$user = json_decode($user,true);

if(isset($_POST["form_data"])){

    if($validator->validate()) {
        $data = $safe_post["User"];
        $id = "/".$safe_get["id"];
        $user = sendCurl($url_api . $id, $data, "PUT");
        returnOnPreviousPage();
    }
}


?>
<?php include 'layouts/header.php'; ?>
<div class="container">
    <?php include 'widgets/breadcrumb.php'; ?>
    <?php include 'form.php'; ?>
</div>

<?php include 'layouts/footer.php'; ?>
