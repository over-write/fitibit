# Fitbit APIからデータを取得

## config.jsonを作成

直下に`config.json`を作成してください。  
APIのアクセストークンをここに記載します。

```
{
  "access_token": "ここに認証後取得できるアクセストークンを貼り付け"
}
```


## 認証

PHPで認証するので、ローカルサーバーを立てます。

```
php -S localhost:8080 -t ./
```

以下にアクセスすると、認証用URLが表示されます。  
対象者ごとに出力しているので、データを取得したい対象者の認証URLをクリックしてください。

対象者を変更する場合は `https://www.fitbit.com/` からログアウトしておく必要があります。

```
http://localhost:8080/
```

Fitbitのページに遷移するので「許可」をクリックすると、以下のページに戻ってきます。

```
http://localhost:8080/oauth_res.php
```

テキストエリアに表示されているアクセストークンが表示されるので、それを`config.json`にコピペしてください。


## アクティビティログの取得

指定日付以降のログデータを取得して、jsonとして出力します。
最大100件。

`output`ディレクトリに出力されます。

```
php activity_log [start_date]

start_date: 開始年月日 Y-m-d もしくは Ymd形式。

例）10月1日以降のログを取得する
php activity_log 2021-10-01
```


## スリープログの取得

指定日付以降のログデータを取得して、jsonとして出力します。
最大100件。

`output`ディレクトリに出力されます。

```
php sleep_log [start_date]

start_date: 開始年月日 Y-m-d もしくは Ymd形式。

例）10月1日以降のログを取得する
php sleep_log 2021-10-01
```
