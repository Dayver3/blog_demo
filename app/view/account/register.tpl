<?php echo $header ?>
<div class="content">

    <div class="registerRow">
        <div class="registerMenuWrap">
            <?php if($err) { ?>
            <div class="alert alert-danger alert-dismissible" style="display: none" role="alert" id="error"><?php echo $err ?></div>
            <?php } ?>
            <form action="/register/apply" method="post" class="registerMenu">
                <h4>Register</h4>
                <hr class="line">
                <p>Input your email
                <label class="user_login">
                    <input type="email" name="email" class="registerInput">
                </label>
                </p>
                <p>Input your username
                <label class="user_login">
                    <input type="text" name="username" class="registerInput">
                </label>
                </p>
                <p>Input your pass
                <label class="user_login">
                    <input type="text" name="password" class="registerInput">
                </label>
                </p>
                <p>Verify your pass
                <label class="user_login">
                    <input type="text" name="passwordVerify" class="registerInput">
                </label>
                </p>
                <hr class="line">
                <input type="submit" class="submit">

            </form>
        </div>
    </div>

</div>
<?php echo $footer ?>