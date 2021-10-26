<?php
const API_INFO = [
    'yoda' => [
        'client_id' => '23BKPJ',
        'client_secret' => '08d81168782d9e07eef0aeb501d5e926'
    ],
    'osaka' => [
        'client_id' => '23BM78',
        'client_secret' => 'dd0de38ee60b48aade9c0f3e6b51b82d'
    ]
];

function getAuthUrl($who)
{
    $response_type = 'token';
    $redirect_url = urlencode('http://localhost:8080/oauth_res.php');
    $scope = urlencode('activity heartrate sleep weight nutrition');

    $client_id = API_INFO[$who]['client_id'];
    $client_secret = API_INFO[$who]['client_secret'];

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

    return $url;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php foreach (API_INFO as $who => $info) { ?>
    <table style="margin-bottom: 20px;" border="1">
        <tbody>
        <tr>
            <th>対象者</th>
            <td><?= $who; ?></td>
        </tr>
        <tr>
            <th>認証URL</th>
            <td><a href="<?= getAuthUrl($who); ?>"><?= getAuthUrl($who); ?></a></td>
        </tr>
        </tbody>
    </table>
<?php } ?>
</body>
</html>
