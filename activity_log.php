<?php
/**
 * php activity_log [start_date]
 * [start_date]で指定した日付からのアクティビティログを取得（）
 */

include 'get_log.php';

$args = $argv;
$start_date = date('Y-m-d', strtotime($argv[1]));
$date = date('YmdHis');

$fitbit_log = new GetFitbitLog();
$log = $fitbit_log->getActivityLog($start_date);

$file = "output/activity_{$start_date}_{$date}.json";
file_put_contents($file, $log);