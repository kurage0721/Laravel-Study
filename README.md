Laravel学習用


## ローカル環境構築
PHP 7.3.11  
Composer 1.10.5  

プロジェクトを設置するディレクトリにcdして、下記を入力  
```
$composer create-project --prefer-dist laravel/laravel [プロジェクト名] “X.X.*”←バージョン指定、オプション
```

プロジェクトのディレクトリに移動し、/config/app.phpを編集
```
//Timezoneをローカルの時刻に変更
//'timezone' => 'UTC’,
'timezone' => ‘Asia/Tokyo’,

~~~

//localeをen→jaに変更
//'locale' => 'en',
'locale' => ‘ja',

~~~

//faker_localeをen_US→ja_JPに変更
'faker_locale' => ‘ja_JP',
```

.envを編集
```
APP_NAME=アプリケーション名

~~~

//DB_CONNECTION=mysql
↓
DB_CONNECTION=sqlite
に変更しその他を削除
＊MySQL使う場合は使うDBに応じた設定に変更する
```

ターミナルで下記を実行
```
$ touch database/database.sqlite
```
sqLiteデータベースファイルが作成される

ビルトインサーバー起動
```
$ php artisan serv
```
ローカルホスト起動
http://127.0.0.1:8000/
を叩くと初期画面表示、ctrl+cで停止、再度起動するときはプロジェクトディレクトリで上記のコマンド叩くと見れる。
＊ポートはデフォで8000だが、serv のあとに —port=8080など付けて叩くと指定したポートで起動する

## Laravel IDE Helperのインストール
インストール
```
composer require --dev barryvdh/laravel-ide-helper
```

ヘルパーファイルの作成
```
php artisan ide-helper:generate
```
