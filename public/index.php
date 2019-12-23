<?php

use Application\App;

chdir(dirname(__DIR__));

include 'system/vendor/autoload.php';

$app = new App();

$app::init(require_once 'config.php')->run();
