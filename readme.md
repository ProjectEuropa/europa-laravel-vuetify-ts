# 見た目確認用

[こちらから](https://stg-europa.herokuapp.com/)

## 環境構築手順

PHPビルトインサーバーで一旦
- PHP 7.3
- Node.js 12

```console.log
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ npm install
$ npm run dev
```

