<?php
// よださんアカウントID
$user_id = '9MSHY2';
$user_id = '-';
//$user_id = '-';
$date = date('Y-m-d');
$date_2 = date('Y-m-01');
$date = '2021-10-21';

// 依田さん
$access_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyM0JLUEoiLCJzdWIiOiI5TVNIWTIiLCJpc3MiOiJGaXRiaXQiLCJ0eXAiOiJhY2Nlc3NfdG9rZW4iLCJzY29wZXMiOiJyd2VpIHJociByYWN0IHJzbGUiLCJleHAiOjE2MzQ4MDM5MjEsImlhdCI6MTYzNDcxNzUyMX0.KvSefsfL-4Lg1sMbc3c60EW_IqaF_HeEBEflMgENeC4';

// 小坂さん
$access_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyM0JNNzgiLCJzdWIiOiI5TVBETFAiLCJpc3MiOiJGaXRiaXQiLCJ0eXAiOiJhY2Nlc3NfdG9rZW4iLCJzY29wZXMiOiJyd2VpIHJhY3QgcmhyIHJudXQgcnNsZSIsImV4cCI6MTYzNDgwNTk2NCwiaWF0IjoxNjM0NzE5NTY0fQ.mNxEKocGahbirOPjbMv1MbUMjtI7_tm4ru1tHxWBbVU';

$url = "https://api.fitbit.com/1/user/-/sleep/date/${date}.json";

//$url = "https://api.fitbit.com/1.2/user/-/sleep/list.json?beforeDate={$date}&offset=&limit=100&sort=asc";

$headers = [
    "Authorization: Bearer {$access_token}"
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$res =  curl_exec($ch);
curl_close($ch);

$array = json_decode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
$json = json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)

?>

<pre>
<?= $res; ?>
</pre>
