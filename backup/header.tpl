<!doctype html>
<html lang="en">
<head>
    <base href="<?php echo $base; ?>">
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--    <link rel="icon" href="img/favicon.ico">-->
    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link href="vendor/fontawesome/css/font-awesome.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow ">
        <h5 class="my-0 mr-md-auto font-weight-normal"><strong><i class="fa fa-book"></i> Blog</strong></h5>
        <?php if ($logged) { ?>
            <form id="form-login" class="form-inline my-2 my-lg-0" action="account/login" method="post" enctype="multipart/form-data" novalidate>
                <input class="form-control mr-sm-2" type="email" placeholder="Email" aria-label="Email" required
                       name="email">
                <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password"
                       required name="password">
                <button class="btn btn-outline-primary my-2 my-sm-0">Sign In</button>
            </form>
        <?php } else { ?>
            <nav class="my-2 my-md-0 mr-md-3 ml-md-3 text-secondary">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa  fa-user-circle-o"></i> <?php echo $username; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown">
                            <a class="dropdown-item" href="account/logout"><i class="fa fa-sign-out"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
        <?php } ?>
    </div>
</header>

<div class="nav-scroller bg-white box-shadow ">
    <div class="container" style="padding-left: 0">
        <nav class="nav nav-underline">
            <a class="nav-link active" href="home"><i class="fa fa-home push-5-r"></i> Home</a>
            <a class="nav-link" href="message"><i class="fa fa-envelope-o push-5-r"></i> Messages</a>
            <a class="nav-link" href="message/add"><i class="fa fa-send-o push-5-r"></i> New Message</a>
        </nav>
    </div>
</div>
