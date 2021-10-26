<?php
$json = file_get_contents($argv[1]);
$array = json_decode($json, true);

foreach ($array as $key => $value) {
    echo $key . PHP_EOL;
}