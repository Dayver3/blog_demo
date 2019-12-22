<?php echo $header; ?>
<!-- Main Container -->
<main>
    <!-- Main Container -->
    <div class="jumbotron">
        <?php if (!$logged) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="display-3"><i class="fa fa-book"></i> Blog</h1>
                        <p>Use it as a demo example to create and test user messages.</p>
                        <a class="btn btn-danger btn-lg btn-block col-md-8" href="message/add"><i class="fa fa-send"></i> New Message</a>
                    </div>
                    <div class="col-md-5 ">
                        <form id="form-register" class="form-control p-4 box-shadow" action="account/register" method="post" enctype="multipart/form-data" novalidate>
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                           required>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-lg btn-success btn-block"> Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } else { ?>
        <div class="container">
            <div class="card-deck text-center">
                <div class="card bg-light col-md-3 p-0 box-shadow ml-md-auto">
                        <div class="card-body">
                            <h1 class="text-primary"><?php echo $total_messages; ?></h1>
                        </div>
                        <div class="card-footer bg-light  text-muted">Messages</div>
                </div>
                <div class="card bg-light col-sm-6 col-md-3 p-0 box-shadow">
                        <div class="card-body">
                            <h1 class="text-success"><?php echo $total_users; ?></h1>
                        </div>
                        <div class="card-footer bg-light  text-muted">Users</div>
                </div>
                <div class="card bg-light col-sm-6 col-md-3 p-0 box-shadow mr-md-auto">
                        <div class="card-body">
                            <h1 class="text-muted"><?php echo $total_online; ?></h1>
                        </div>
                        <div class="card-footer text-muted">Online</div>
                </div>

            </div>
        </div>
        <?php } ?>
    </div>
        <!-- END Main Container -->
    <div class="container">
        <h1 class="mb-5">Last Messages</h1>
        <div class="card-columns">
            <?php foreach ($messages as $message) { ?>
                <div class="card">
                    <div class="card-body text-dark">
                        <h5 class="card-title">@<?php echo $message['username']; ?></h5>
                        <p class="card-text"><?php echo $message['message']; ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted font-italic"><?php echo $message['date_added']; ?></small>
                        <small class="text-muted font-italic pull-right"><?php echo $message['ago']; ?>(s) ago</small>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</main>
<!-- END Main Container -->
<?php echo $footer; ?>
