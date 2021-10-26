<?php
// 依田さん
$client_id = '23BKPJ';
$client_secret = '08d81168782d9e07eef0aeb501d5e926';

// 小坂さん
//$client_id = '23BM78';
//$client_secret = 'dd0de38ee60b48aade9c0f3e6b51b82d';


$response_type = 'token';
$redirect_url = urlencode('http://localhost:8080/oauth_res.php');
$scope = urlencode('activity heartrate sleep weight nutrition');

$params = compact(
    'client_id',
    'response_type',
    'redirect_url',
    'scope'
);

$url = 'https://www.fitbit.com/oauth2/authorize?';
foreach ($params as $key => $value) {
    $url .= "{$key}={$value}&";
}
?>

<a href="<?= $url ; ?>"><?= $url ; ?></a>

