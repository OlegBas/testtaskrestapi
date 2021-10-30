<?php if(!empty($validator->errors)){?>
    <div class="alert alert-da">
        <?php for($i = 0;$i < count($validator->errors);$i++){?>
            <?=$validator->errors[$i]?><br>
        <?php }?>
    </div>
<?php }?>



<form role="form" method = "post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Username" name = "User[username]"  value = "<?=$user["username"]?>" >
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" id="email" placeholder="E-mail" name = "User[email]" value = "<?=$user["email"]?>">
    </div>

    <button type="submit" class="btn btn-default" name = "form_data"><?=$title_action?></button>
</form>