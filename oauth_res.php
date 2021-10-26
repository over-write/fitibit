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
<textarea id="access_token" style="width: 100%" rows="5"></textarea>
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

    document.getElementById('access_token').innerText = access_token;
</script>
</body>
</html>