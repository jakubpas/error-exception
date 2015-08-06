<?php
require_once '/var/www/error-exception/vendor/autoload.php';

\JakubPas\Exception\Handler::set();

try {
    $a = array();
    $b = $a[1];
    unset($b);
} catch (\JakubPas\Exception\NoticeException $e) {
    echo 'done';
}
