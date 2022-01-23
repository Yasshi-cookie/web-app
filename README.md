# Start
1. docker起動 `$ docker compose up -d --build`
1. vendorディレクトリ郡をインストール
    1. `$ docker compose exec app bash`
    2. `$ composer install`
    3. laravelcollective/htmlが入っていなければ、run `$ composer require "laravelcollective/html"`
1. 環境変数ファイルを作成（コピー） `$ cp .env.example .env`
1.

## エラーが出たら
下記を実行してみる
- `$ php artisan key:generate`
- `$ php artisan storage:link`
- `$ chmod -R 777 storage bootstrap/cache`

## 作成したコンテナ、イメージ、ボリューム、ネットワークもろもろ削除する
`$ docker-compose down --rmi all --volumes --remove-orphans`

# ディレクトリ構成
- backend
    - Laravel-app
- infra
    - mysql
        - Dockerfile
        - my.cnf
    - nginx
        - default.conf
    - php
        - Dockerfile
        - php.ini
- docker-compose.yml
- README.md

# 参考
https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4
