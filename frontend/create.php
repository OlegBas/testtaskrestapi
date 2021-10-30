<?php
include 'functions.php';
$title = "Users";
$url_page = "/frontend";
$title_action = "Create";
if(isset($_POST["form_data"])){
    if($validator->validate()) {
        $data = $safe_post["User"];
        $user = sendCurl($url_api, $data, "POST");
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
