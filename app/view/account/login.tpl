<?php echo $header ?>
<h1>Login</h1>
<?php
if($error) {
    echo $error;
}
?>

<div class="content">

    <div class="row">
        <div class="loginPanelWrap">
            <div class="alert alert-warning" role="alert" style="display: none" id="warning">
                Email or password is wrong!
            </div>
            <div class="alert alert-success" role="alert" style="display: none" id="success">
                Success!
            </div>
            <div class="alert alert-danger alert-dismissible" style="display: none" role="alert" id="error"></div>
            <div class="loginPanel">
                <form name="loginForm" method="post" class="loginForm" action="/login/apply">
                    <div class="textWrap">
                        <h4>Login</h4>
                    </div>
                    <p>
                        <label class="user_login">
                            Email
                            <br>
                            <input type="email" class="input" placeholder="Email" id="Email" name="email">
                        </label>
                    </p>
                    <hr class="line">
                    <p>
                        <label class="user_pass">
                            Password
                            <br>
                            <input type="text" class="input" placeholder="Password" id="password" name="password">
                        </label>
                    </p>
                    <div>
                        <button type="submit" class="submit button">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php echo $footer ?>