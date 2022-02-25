# laravel-9version

## 構成

レイヤードアーキテクチャで構築

```
UI層 (画面)
↓
Application層 (UIからリクエストを捌く。ユースケースなどを呼ぶ。)
↓
Domain層 (ビジネスロジックを記載)
↓
INfrastructure層 (DB及びメモリ操作。DB以外のロジック禁止。)

よく使う場所

laravel
├── app
│   ├── Http
│   │    ├── Controllers Application層(リクエストの入口)
│   │    └── Requests リクエストを受けてバリデーションを行う
│   │
│   ├── Infrastructure Infrastructure層(DB及びメモリ操作)
│   ├── Models テーブルと対になり、テーブル設定のみ行う。
│   ├── Policies 処理を行うかどうかの認可を行う
│   ├── Services Domain層(処理に関係あるロジックを記載)
│   ├── UseCases ユースケース(ログインを行うとかユーザーを作成するとか)
│   └── View UIのコンポーネントのロジック管理
│
├── database
│   ├── factories 偽データを生成
│   ├── migrations テーブル操作(追加, 修正, 削除)
│   └── seeders DBにデータを追加
│
├── resources
│   ├── css (viewsと基本対になっている)
│   │    ├── components (DB及びメモリ操作)
│   │    ├── guest Domain層(処理に関係あるロジックを記載)
│   │    ├── task ユースケース(ログインを行うとかユーザーを作成するとか)
│   │    └── home.blade.php
│   └── views
│        ├── components 部品
│        ├── guest ログインしていないユーザー
│        ├── [機能ごとのView] ユースケース(ログインを行うとかユーザーを作成するとか)
│        └── home.blade.php
│
└── routes
    └── web.php ルーティング

```

## 環境設定

1. make build
2. make app (app コンテナに入る)
3. composer install
4. npm i
5. php artisan key:generate

## heroku ログイン情報 作りたくない人向け

url: https://laravel-9version.herokuapp.com/login  
email: example@gmail.com  
password: aaaaaaaa
