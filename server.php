// server.php
<?php

$port = getenv('PORT') ?: 8080;

$public = __DIR__.'/public';
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

$_SERVER['SERVER_NAME'] = '0.0.0.0';
$_SERVER['SERVER_PORT'] = $port;

if ($uri !== '/' && file_exists($public.$uri)) {
    return false;
}

require_once $public.'/index.php';
