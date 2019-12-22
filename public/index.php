<?php

chdir(dirname(__DIR__));

include 'system/vendor/autoload.php';

$app = new \Application\App();

$app::init(require 'config.php')->run();
