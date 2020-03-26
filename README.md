# Recipe Sharing
料理レシピを共有するアプリケーション(作り直し)

# 技術仕様
- フロントエンド
	- html
	- sass(bootstrap)
	- javascript(jquery)
- バックエンド
	- php
- FW
	- Laravel

# 開発環境構築手順
①docker-compose.ymlのあるディレクトリで以下のコマンドを実行しDockerを立ち上げる。
```
docker-compose up -d --build
```

②appコンテナへ以下のコマンドで入る
```
docker-compose exec app ash
```

③appコンテナにて、ライブラリ郡をインストールするため、以下のコマンドを実行

```
composer install
```

④.envファイルがないので、テンプレートを作成

```
cp .env.example .env
```

⑤アプリケーションキーを作成（アプリケーションキーテキストは.emvのAPP_KEYへ追加される）

```
php artisan key:generate
```
以上。