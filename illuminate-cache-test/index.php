<?php
require 'vendor/autoload.php';

$filestore = new \Illuminate\Cache\FileStore(
    new \Illuminate\Filesystem\Filesystem(),
    dirname(__FILE__).'/cache'
);

$cache = new \Illuminate\Cache\Repository($filestore);
$cache->put('test', 'aaa', 5);
dd($cache->get('test'));