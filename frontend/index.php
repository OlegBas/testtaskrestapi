<?php include 'functions.php'; ?>
<?php $title = "Users";
$url_page = "/frontend";

$users = sendCurl($url_api,[]);
$users = json_decode($users,true);
?>
<?php include 'layouts/header.php'; ?>
<div class="container">
    <?php include 'widgets/breadcrumb.php'; ?>
    <?php include 'widgets/add_button.php'; ?>
    <table class="table table-striped"  id = "users">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control user-search"  name = "id" >
                </td>
                <td><input type="text" class="form-control user-search"  name = "username" ></td>
                <td><input type="text" class="form-control user-search"  name = "email" ></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 0;$i < count($users);$i++){?>
                <tr>
                    <td><?=$users[$i]["id"]?></td>
                    <td><?=$users[$i]["username"]?></td>
                    <td><?=$users[$i]["email"]?></td>
                    <td>
                        <?php include 'widgets/action_buttons.php'; ?>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php include 'layouts/footer.php'; ?>
