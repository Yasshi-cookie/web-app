# Start
1. `$ docker compose up -d --build`
2. `$ docker compose exec app bash`
3. `$ composer install`
4. `$ cp .env.example .env`

## エラーが出たら
- `$ php artisan key:generate`
- `$ php artisan storage:link`
- `$ chmod -R 777 storage bootstrap/cache`

## 作成したコンテナ、イメージ、ボリューム、ネットワークもろもろ削除する
`$ docker-compose down --rmi all --volumes --remove-orphans`

# ディレクトリ構成
├── README.md
├── infra
│   ├── mysql
│   │   ├── Dockerfile
│   │   └── my.cnf
│   ├── nginx
│   │   └── default.conf
│   └── php
│       ├── Dockerfile
│       └── php.ini
├── docker-compose.yml
└── backend
    └── Laravelアプリケーション

# 参考
https://qiita.com/ucan-lab/items/56c9dc3cf2e6762672f4
