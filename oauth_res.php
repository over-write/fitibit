<?php
//echo 'auth completes' . PHP_EOL;

// よださんアカウントID
$user_id = '9MSHY2';
$user_id = '-';
//$user_id = '-';
$date = date('Y-m-d');
$date_2 = date('Y-m-01');
$date = '2021-10-20';

// 依田さん
$access_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyM0JLUEoiLCJzdWIiOiI5TVNIWTIiLCJpc3MiOiJGaXRiaXQiLCJ0eXAiOiJhY2Nlc3NfdG9rZW4iLCJzY29wZXMiOiJyd2VpIHJhY3QgcmhyIHJudXQgcnNsZSIsImV4cCI6MTYzNTMwMDUwMCwiaWF0IjoxNjM1MjE0MTAwfQ.-6OnQlBXlgjbA4RK_RKTJ41HuPOamytN29HZzOYwvj4';

// 小坂さん
//$access_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyM0JNNzgiLCJzdWIiOiI5TVBETFAiLCJpc3MiOiJGaXRiaXQiLCJ0eXAiOiJhY2Nlc3NfdG9rZW4iLCJzY29wZXMiOiJyd2VpIHJociByYWN0IHJudXQgcnNsZSIsImV4cCI6MTYzNTI5OTQ1MiwiaWF0IjoxNjM1MjEzMDUyfQ.OWW4-aufVDvyLp-RkU8P2u95aPO-mhru5VAmlsZAPPE';

$activity_url = "https://api.fitbit.com/1/user/{$user_id}/activities/date/{$date}.json";
$activity_log_url = "https://api.fitbit.com/1/user/-/activities/list.json?afterDate={$date_2}&limit=100&offset=0&sort=desc";
$sleep_url = "https://api.fitbit.com/1.2/user/{$user_id}/sleep/date/{$date}.json";
$sleep_log_url = "https://api.fitbit.com/1.2/user/-/sleep/list.json?afterDate={$date_2}&limit=100&offset=0&sort=desc";
$sleep_v1_url = "https://api.fitbit.com/1/user/{$user_id}/sleep/date/{$date}.json";

//echo $activity_url . PHP_EOL;

$headers = [
    "Authorization: Bearer {$access_token}"
];

$ch = curl_init($activity_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$activity =  curl_exec($ch);
curl_close($ch);

$ch = curl_init($activity_log_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$activity_log =  curl_exec($ch);
curl_close($ch);

$ch = curl_init($sleep_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$sleep =  curl_exec($ch);
curl_close($ch);

$ch = curl_init($sleep_log_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$sleep_log =  curl_exec($ch);
curl_close($ch);

$ch = curl_init($sleep_v1_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$sleep_v1 =  curl_exec($ch);
curl_close($ch);


?>
<div><Activity <?= $date; ?><br/><br/></div>
<div><?= $activity; ?><br/><br/></div>
<div>Activity Log <?= $date_2; ?>~<br/><br/></div>
<div><?= $activity_log; ?><br/><br/></div>
<div>Sleep <?= $date; ?><br/><br/></div>
<div><?= $sleep; ?><br/><br/></div>
<div>Sleep Log <?= $date_2; ?>~<br/><br/></div>
<div><?= $sleep_log; ?><br/><br/></div>
<div>Sleep V1 <?= $date; ?><br/><br/></div>
<div><?= $sleep_v1; ?><br/><br/></div>
<pre>
    <?php //print_r(json_decode($res, true)); ?>
</pre>

<div id="access_token"></div>
<script>
    let hash = location.hash;
    let params = hash.split('&');
    let access_token = '';
    let user_id = '';

    params.map((param) => {
       if (param.indexOf('access_token') !== -1) {
           access_token = param.replace('#access_token=', '');
       }
       if (param.indexOf('user_id') !== -1) {
           user_id = param.replace('user_id=', '');
       }
    });

    console.log(access_token, user_id)

    //document.getElementById('access_token').innerText = access_token;



</script>